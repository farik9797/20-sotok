@php
    use Filament\Support\Icons\Heroicon;

    // 1 заявка, 2 заявки, 5 заявок
    $plural = function (int $n, string $one, string $few, string $many): string {
        $m10 = $n % 10;
        $m100 = $n % 100;
        if ($m10 === 1 && $m100 !== 11) return $one;
        if ($m10 >= 2 && $m10 <= 4 && ($m100 < 12 || $m100 > 14)) return $few;
        return $many;
    };
    $initial = mb_strtoupper(mb_substr($user, 0, 1)) ?: '•';
    $quick = [
        ['url' => $pagesUrl, 'kicker' => 'Сайт', 'title' => 'Страницы сайта', 'sub' => $pagesCount.' '.$plural($pagesCount, 'страница', 'страницы', 'страниц'), 'icon' => Heroicon::OutlinedDocumentText],
        ['url' => $settingsUrl, 'kicker' => 'Сайт', 'title' => 'Настройки сайта', 'sub' => 'Контакты и почта для заявок', 'icon' => Heroicon::OutlinedCog6Tooth],
        ['url' => $leadsUrl, 'kicker' => 'Заявки', 'title' => 'Все заявки', 'sub' => $total.' '.$plural($total, 'заявка', 'заявки', 'заявок').' в базе', 'icon' => Heroicon::OutlinedInboxArrowDown],
    ];
    $cards = array_slice(array_merge(
        array_map(fn ($l) => ['url' => $l['url'], 'kicker' => $l['when'], 'title' => $l['phone'], 'sub' => $l['what'], 'side' => $l['messenger']], $recent),
        array_map(fn ($q) => $q + ['side' => null], $quick),
    ), 0, 3);
@endphp

<div class="s20-dash">
    <header class="s20-head">
        <div class="s20-hello">
            <span class="s20-hello-hi">Добро пожаловать</span>
            <span class="s20-hello-who">{{ $user }}</span>
        </div>
        <nav class="s20-tools" aria-label="Быстрые действия">
            <a class="s20-tool" href="{{ $siteUrl }}" target="_blank" rel="noopener" aria-label="Открыть сайт" title="Открыть сайт">
                <x-filament::icon :icon="Heroicon::OutlinedGlobeAlt" />
            </a>
            <a class="s20-tool" href="{{ $leadsUrl }}" aria-label="Заявки{{ $today ? ', сегодня '.$today : '' }}" title="Заявки">
                <x-filament::icon :icon="Heroicon::OutlinedBell" />
                @if ($today)<span class="s20-tool-badge">{{ $today }}</span>@endif
            </a>
            <a class="s20-tool" href="{{ $settingsUrl }}" aria-label="Настройки сайта" title="Настройки сайта">
                <x-filament::icon :icon="Heroicon::OutlinedCog6Tooth" />
            </a>
            <span class="s20-avatar" aria-hidden="true">{{ $initial }}</span>
        </nav>
    </header>

    <section class="s20-hero">
        <span class="s20-chip">Заявки с сайта</span>
        <h1 class="s20-h1">
            <span class="ln"><span>{{ $week }} {{ $plural($week, 'заявка', 'заявки', 'заявок') }}</span></span>
            <span class="ln"><span>за последние 7 дней</span></span>
        </h1>
        <p class="s20-blurb">
            @if ($last)
                Последняя пришла {{ $last['when'] }}{{ $last['messenger'] ? ', ответить в '.$last['messenger'] : '' }}.
                Всего в базе {{ $total }} {{ $plural($total, 'заявка', 'заявки', 'заявок') }},
                уведомления уходят на {{ $leadsEmail }}.
            @else
                Заявок пока нет. Как только посетитель пройдёт квиз на сайте,
                заявка появится здесь и придёт на {{ $leadsEmail }}.
            @endif
        </p>
    </section>

    <section class="s20-forecast" aria-label="Заявки по дням за неделю">
        <div class="s20-temps">
            @foreach ($days as $d)
                <span @class(['on' => $d['today']])>{{ $d['n'] }}</span>
            @endforeach
        </div>
        <svg class="s20-wave" viewBox="0 0 835 230" preserveAspectRatio="none" aria-hidden="true">
            <defs>
                <linearGradient id="s20wg" x1="0" y1="0" x2="1" y2="0">
                    <stop offset="0" stop-color="#fff" stop-opacity=".55" />
                    <stop offset=".55" stop-color="#fff" stop-opacity="1" />
                    <stop offset="1" stop-color="#fff" stop-opacity=".7" />
                </linearGradient>
                <linearGradient id="s20wf" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#fff" stop-opacity=".30" />
                    <stop offset=".55" stop-color="#fff" stop-opacity=".10" />
                    <stop offset="1" stop-color="#fff" stop-opacity="0" />
                </linearGradient>
                <clipPath id="s20wclip"><rect class="s20-wclipr" x="0" y="0" width="835" height="230" /></clipPath>
            </defs>
            <path class="s20-warea" d="{{ $chart['area'] }}" fill="url(#s20wf)" clip-path="url(#s20wclip)" />
            <path class="s20-wline" d="{{ $chart['line'] }}" pathLength="1" stroke="url(#s20wg)" stroke-width="6.2" stroke-opacity=".17" />
            <path class="s20-wline" d="{{ $chart['line'] }}" pathLength="1" stroke="url(#s20wg)" stroke-width="4.6" stroke-opacity=".26" />
            <path class="s20-wline" d="{{ $chart['line'] }}" pathLength="1" stroke="url(#s20wg)" stroke-width="3.4" />
        </svg>
        <div class="s20-days">
            @foreach ($days as $d)
                <span @class(['on' => $d['today']])>{{ $d['name'] }}<small>{{ $d['date'] }}</small></span>
            @endforeach
        </div>
    </section>

    <aside class="s20-rail" aria-label="Сегодня и последние заявки">
        <a class="s20-card big" href="{{ $leadsUrl }}">
            <span class="s20-place"><x-filament::icon :icon="Heroicon::OutlinedCalendarDays" /> Сегодня</span>
            <span class="s20-bigtemp">{{ $today }}<i>{{ $plural($today, 'заявка', 'заявки', 'заявок') }}</i></span>
            <span class="s20-metrics">
                <span><x-filament::icon :icon="Heroicon::OutlinedChartBar" /><b>{{ $week }}</b> за неделю</span>
                <span><x-filament::icon :icon="Heroicon::OutlinedCalendar" /><b>{{ $month }}</b> за 30 дней</span>
                <span><x-filament::icon :icon="Heroicon::OutlinedInboxStack" /><b>{{ $total }}</b> всего</span>
            </span>
        </a>
        @foreach ($cards as $c)
            <a class="s20-card row" href="{{ $c['url'] }}">
                <span class="s20-row-text">
                    <small>{{ $c['kicker'] }}</small>
                    <b>{{ $c['title'] }}</b>
                    <span>{{ $c['sub'] }}</span>
                </span>
                <span class="s20-row-side">
                    @if ($c['side'])
                        {{ $c['side'] }}
                    @else
                        <x-filament::icon :icon="$c['icon']" />
                    @endif
                </span>
            </a>
        @endforeach
    </aside>
</div>
