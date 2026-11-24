<?php

namespace App\Filament\Resources\SitePages;

use App\Filament\Resources\SitePages\Pages\EditSitePage;
use App\Filament\Resources\SitePages\Pages\ListSitePages;
use App\Models\SitePage;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

/** Страницы сайта: тексты и картинки по секциям, как «Контент страницы» в WordPress. */
class SitePageResource extends Resource
{
    protected static ?string $model = SitePage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $modelLabel = 'страница';

    protected static ?string $pluralModelLabel = 'Страницы сайта';

    // по-русски с заглавной только первое слово: «Страницы сайта», а не «Страницы Сайта»
    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?int $navigationSort = 1;

    // форма собирается в EditSitePage из описаний полей страницы
    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort')
            // на телефоне строка складывается в карточку: колонки не уходят за край экрана
            ->stackedOnMobile()
            ->paginated(false)
            ->columns([
                TextColumn::make('title')->label('Страница'),
                TextColumn::make('path')->label('Адрес')
                    ->url(fn (SitePage $record) => url($record->path), true)
                    ->color('gray'),
                TextColumn::make('updated_at')->label('Изменена')->dateTime('d.m.Y H:i'),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSitePages::route('/'),
            'edit' => EditSitePage::route('/{record}/edit'),
        ];
    }
}
