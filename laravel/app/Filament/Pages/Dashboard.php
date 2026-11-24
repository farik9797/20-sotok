<?php

namespace App\Filament\Pages;

use App\Filament\Resources\Leads\LeadResource;
use App\Filament\Resources\SitePages\SitePageResource;
use App\Models\Lead;
use App\Models\SitePage;
use App\Support\Site;
use BackedEnum;
use Carbon\CarbonImmutable;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

/**
 * Сводка: заявки за неделю волной (композиция по образцу «жидкого стекла»),
 * справа — сегодняшние цифры и последние заявки. Данные только из базы.
 */
class Dashboard extends BaseDashboard
{
    protected string $view = 'filament.pages.dashboard';

    protected Width|string|null $maxContentWidth = Width::Full;

    protected static ?string $title = 'Сводка';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    // время заявок показываем по Минску (в базе — UTC)
    private const TZ = 'Europe/Minsk';

    // коротко: семь полных названий не помещаются в ряд, когда меню развёрнуто
    private const DAYS = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];

    public function getTitle(): string|Htmlable
    {
        return 'Сводка';
    }

    protected function getViewData(): array
    {
        $today = CarbonImmutable::now(self::TZ)->startOfDay();
        $from = $today->subDays(6);

        // заявки за 7 дней по минским суткам
        $byDay = array_fill(0, 7, 0);
        Lead::query()->where('created_at', '>=', $from->utc())->get(['created_at'])
            ->each(function (Lead $lead) use (&$byDay, $from) {
                $i = (int) $from->diffInDays($lead->created_at->timezone(self::TZ)->startOfDay());
                if ($i >= 0 && $i < 7) {
                    $byDay[$i]++;
                }
            });

        $days = [];
        foreach ($byDay as $i => $n) {
            $d = $from->addDays($i);
            $days[] = ['n' => $n, 'name' => $i === 6 ? 'Сегодня' : self::DAYS[$d->dayOfWeek], 'date' => $d->format('d.m'), 'today' => $i === 6];
        }

        $week = array_sum($byDay);
        $last = Lead::query()->latest()->first();
        $recent = Lead::query()->latest()->limit(3)->get();

        return [
            'user' => auth()->user()?->name ?? '',
            'week' => $week,
            'today' => $byDay[6],
            'month' => Lead::query()->where('created_at', '>=', $today->subDays(29)->utc())->count(),
            'total' => Lead::query()->count(),
            'days' => $days,
            'chart' => $this->wave($byDay),
            'last' => $last ? [
                'when' => $this->when($last->created_at->timezone(self::TZ), $today),
                'messenger' => $last->messenger,
            ] : null,
            'leadsEmail' => Site::value('opt_leads_email') ?? Site::OPTIONS['leads_email'][1],
            'recent' => $recent->map(fn (Lead $l) => [
                'url' => LeadResource::getUrl('view', ['record' => $l]),
                'when' => $this->when($l->created_at->timezone(self::TZ), $today),
                'phone' => $l->phone,
                'what' => $l->direction ?: ($l->area ? 'Площадь: '.$l->area : 'Заявка с сайта'),
                'messenger' => $l->messenger ?: '—',
            ])->all(),
            'pagesUrl' => SitePageResource::getUrl(),
            'pagesCount' => SitePage::query()->count(),
            'leadsUrl' => LeadResource::getUrl(),
            'settingsUrl' => SiteSettings::getUrl(),
            'siteUrl' => url('/'),
        ];
    }

    /** «сегодня в 14:05», «вчера в 09:12», «21.11 в 18:40». */
    private function when(CarbonImmutable|\Carbon\Carbon $t, CarbonImmutable $today): string
    {
        $day = $t->copy()->startOfDay();
        $prefix = $day->equalTo($today) ? 'сегодня' : ($day->equalTo($today->subDay()) ? 'вчера' : $t->format('d.m'));

        return $prefix.' в '.$t->format('H:i');
    }

    /**
     * Плавная линия через 7 точек (Catmull-Rom → кубические Безье) в поле 835×230,
     * как волна в образце: ноль внизу, максимум с запасом сверху. Точки стоят по центрам
     * колонок — под цифрами и названиями дней; к краям линия уходит ровно.
     *
     * @param  array<int, int>  $values
     * @return array{line: string, area: string}
     */
    private function wave(array $values): array
    {
        $w = 835;
        $top = 34;
        $bottom = 176;
        $max = max(1, max($values));
        $n = count($values);
        $pts = [];
        foreach ($values as $i => $v) {
            $pts[] = ['x' => round(($i + 0.5) * $w / $n, 1), 'y' => round($bottom - ($bottom - $top) * $v / $max, 1)];
        }

        $d = 'M0,'.$pts[0]['y'].' L'.$pts[0]['x'].','.$pts[0]['y'];
        for ($i = 0; $i < $n - 1; $i++) {
            $p0 = $pts[max(0, $i - 1)];
            $p1 = $pts[$i];
            $p2 = $pts[$i + 1];
            $p3 = $pts[min($n - 1, $i + 2)];
            $c1x = round($p1['x'] + ($p2['x'] - $p0['x']) / 6, 1);
            $c1y = round($p1['y'] + ($p2['y'] - $p0['y']) / 6, 1);
            $c2x = round($p2['x'] - ($p3['x'] - $p1['x']) / 6, 1);
            $c2y = round($p2['y'] - ($p3['y'] - $p1['y']) / 6, 1);
            $d .= " C{$c1x},{$c1y} {$c2x},{$c2y} {$p2['x']},{$p2['y']}";
        }
        $d .= " L{$w},".$pts[$n - 1]['y'];

        return ['line' => $d, 'area' => $d." L{$w},230 L0,230 Z"];
    }
}
