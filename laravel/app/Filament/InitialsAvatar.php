<?php

namespace App\Filament;

use Filament\AvatarProviders\Contracts\AvatarProvider;
use Filament\Facades\Filament;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Аватар-инициал без внешнего сервиса: стандартный провайдер Filament
 * отдаёт имя пользователя на ui-avatars.com. Здесь — SVG прямо в странице.
 */
class InitialsAvatar implements AvatarProvider
{
    public function get(Model|Authenticatable $record): string
    {
        $name = trim((string) Filament::getNameForDefaultAvatar($record));
        $letter = htmlspecialchars(mb_strtoupper(mb_substr($name, 0, 1)) ?: '•', ENT_XML1);

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">'
            .'<rect width="64" height="64" rx="32" fill="#ffffff" fill-opacity=".24"/>'
            .'<text x="32" y="32" dy=".35em" text-anchor="middle" font-family="Inter, Arial, sans-serif" font-size="26" font-weight="600" fill="#fff">'
            .$letter.'</text></svg>';

        return 'data:image/svg+xml;base64,'.base64_encode($svg);
    }
}
