<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

/**
 * Заявки из квиза — та же логика, что s20_lead_submit() в теме WordPress:
 * сохраняются в «Заявки», уходят на почту из «Настроек сайта», при заданном боте — в Telegram.
 */
class LeadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $p = $request->json()->all();
        if (! is_array($p) || $p === []) {
            return $this->fail('s20_bad', 'Неверный запрос', 400);
        }

        // ловушка для ботов (скрытое поле) и слишком быстрая отправка: отвечаем «ок», но не сохраняем
        if (! empty($p['website']) || (int) ($p['elapsed'] ?? 0) < 3) {
            return response()->json(['ok' => true]);
        }

        $digits = preg_replace('/\D/', '', (string) ($p['phone'] ?? ''));
        if (strlen($digits) !== 12 || ! str_starts_with($digits, '375')) {
            return $this->fail('s20_phone', 'Неверный номер', 422);
        }
        if (empty($p['consent'])) {
            return $this->fail('s20_consent', 'Нет согласия на обработку данных', 422);
        }

        // не больше 5 заявок с одного адреса за 10 минут
        $key = 's20_lead_'.md5((string) $request->ip());
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return $this->fail('s20_rate', 'Слишком много заявок, позвоните нам', 429);
        }
        RateLimiter::hit($key, 600);

        $text = fn (string $k, int $max) => mb_substr(trim(preg_replace('/\s+/u', ' ', strip_tags((string) ($p[$k] ?? '')))), 0, $max);
        $page = (string) ($p['page'] ?? '');
        $lead = Lead::create([
            'direction' => $text('direction', 200),
            'area' => $text('area', 40),
            'style' => $text('style', 200),
            'systems' => $text('systems', 400) !== '' ? $text('systems', 400) : 'только мощение',
            'messenger' => in_array($p['messenger'] ?? '', ['Telegram', 'Viber'], true) ? $p['messenger'] : '—',
            'phone' => '+375 ('.substr($digits, 3, 2).') '.substr($digits, 5, 3).'-'.substr($digits, 8, 2).'-'.substr($digits, 10, 2),
            'page' => preg_match('~^https?://~i', $page) && filter_var($page, FILTER_VALIDATE_URL) ? mb_substr($page, 0, 500) : '',
        ]);

        // уведомления
        $lines = [];
        foreach (Lead::LABELS as $k => $label) {
            if ($k !== 'delivery') {
                $lines[] = $label.': '.$lead->{$k};
            }
        }
        $body = "Новая заявка из калькулятора бюджета на сайте.\n\n".implode("\n", $lines)
            ."\n\nВсе заявки: ".url('/admin/leads');
        $to = s20_opt('leads_email', s20_c('email'));
        try {
            Mail::raw($body, function ($m) use ($to, $lead) {
                $m->to($to)->from(s20_opt('mail_from', 'postmaster@20sotok.by'), '20 соток — сайт')
                    ->subject('Заявка с сайта 20sotok.by — '.$lead->phone);
            });
            $delivery = 'письмо — отправлено на '.$to;
        } catch (\Throwable $e) {
            report($e);
            $delivery = 'письмо — ошибка отправки';
        }

        $token = trim(s20_opt('tg_bot_token'));
        $chat = trim(s20_opt('tg_chat_id'));
        if ($token !== '' && $chat !== '') {
            try {
                $ok = Http::timeout(8)->asForm()->post('https://api.telegram.org/bot'.rawurlencode($token).'/sendMessage', [
                    'chat_id' => $chat, 'text' => "Заявка с сайта 20sotok.by\n\n".implode("\n", $lines),
                ])->status() === 200;
            } catch (\Throwable $e) {
                $ok = false;
            }
            $delivery .= $ok ? ', Telegram — отправлено' : ', Telegram — ошибка';
        }
        $lead->update(['delivery' => $delivery]);

        return response()->json(['ok' => true]);
    }

    private function fail(string $code, string $message, int $status): JsonResponse
    {
        return response()->json(['code' => $code, 'message' => $message, 'data' => ['status' => $status]], $status);
    }
}
