<?php

namespace App\Providers\Filament;

use App\Filament\InitialsAvatar;
use App\Filament\Pages\Dashboard;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    // меняется вместе со стилем «стекла» — сбрасывает кеш браузера
    private const GLASS_VERSION = '4';

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('20 соток')
            ->brandLogo(asset('admin-glass/logo.svg'))
            ->brandLogoHeight('1.9rem')
            ->favicon(asset('uploads/site-icon.png'))
            ->defaultAvatarProvider(InitialsAvatar::class)
            ->colors([
                'primary' => Color::hex('#B8860B'),   // латунь макета
            ])
            // «жидкое стекло» поверх фото участка: всегда тёмная тема, без верхней полосы,
            // меню — узкая стеклянная колонка с иконками (разворачивается кнопкой)
            ->darkMode(true, true)
            ->topbar(false)
            ->sidebarCollapsibleOnDesktop()
            ->font('Inter', provider: GoogleFontProvider::class)
            ->renderHook(PanelsRenderHook::HEAD_END, fn (): string => $this->glassHead())
            ->renderHook(PanelsRenderHook::SIDEBAR_LOGO_BEFORE, fn (): string => '<a href="'.e(url('admin')).'" class="s20-mark" aria-label="20 соток — сводка"><img src="'.e(asset('admin-glass/logo-mark.svg')).'" alt="" width="40" height="40"></a>')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    /** Шрифт заголовков, стиль «стекла» и свёрнутое по умолчанию меню. */
    private function glassHead(): string
    {
        $css = e(asset('admin-glass/glass.css').'?v='.self::GLASS_VERSION);

        return <<<HTML
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@500&display=swap">
            <link rel="stylesheet" href="{$css}">
            <script>
                // первый вход: меню свёрнуто в колонку иконок, дальше Filament помнит выбор сам
                try {
                    if (localStorage.getItem('filament:sidebar:desktop_open') === null) localStorage.setItem('filament:sidebar:desktop_open', 'false');
                    if (localStorage.getItem('filament:sidebar:open') === null) localStorage.setItem('filament:sidebar:open', 'false');
                } catch (e) {}
                // телефон: вертикальные вкладки стоят строкой с прокруткой — держим активную на виду
                document.addEventListener('DOMContentLoaded', () => {
                    if (!window.matchMedia('(max-width: 767px)').matches) return;
                    const show = () => document.querySelectorAll('.fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item.fi-active')
                        .forEach((el) => el.scrollIntoView({ block: 'nearest', inline: 'center' }));
                    setTimeout(show, 300);
                    document.addEventListener('click', (e) => { if (e.target.closest('.fi-sc-tabs.fi-vertical .fi-tabs-item')) setTimeout(show, 60); });
                });
            </script>
            HTML;
    }
}
