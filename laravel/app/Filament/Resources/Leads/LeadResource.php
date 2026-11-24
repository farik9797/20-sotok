<?php

namespace App\Filament\Resources\Leads;

use App\Filament\Resources\Leads\Pages\ListLeads;
use App\Filament\Resources\Leads\Pages\ViewLead;
use App\Models\Lead;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

/** Заявки квиза: создаёт только форма на сайте, здесь — просмотр. */
class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxArrowDown;

    protected static ?string $recordTitleAttribute = 'phone';

    protected static ?string $modelLabel = 'заявка';

    protected static ?string $pluralModelLabel = 'Заявки';

    // по-русски с заглавной только первое слово: «Страницы сайта», а не «Страницы Сайта»
    protected static bool $hasTitleCaseModelLabel = false;

    protected static ?int $navigationSort = 2;

    public static function infolist(Schema $schema): Schema
    {
        $entries = [];
        foreach (Lead::LABELS as $key => $label) {
            $entry = TextEntry::make($key)->label($label)->placeholder('—');
            if ($key === 'page') {
                $entry->url(fn (Lead $record) => $record->page ?: null, true);
            }
            $entries[] = $entry;
        }
        $entries[] = TextEntry::make('created_at')->label('Дата')->dateTime('d.m.Y H:i');

        // в секции — чтобы поля лежали на стеклянной панели, а не прямо на фото фона
        return $schema->components([
            Section::make()->schema($entries)->columns(['default' => 1, 'md' => 2]),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('phone')->label('Телефон · мессенджер')
                    ->formatStateUsing(fn (Lead $record) => $record->phone.' · '.$record->messenger)->searchable(),
                TextColumn::make('direction')->label('Направление')->wrap(),
                TextColumn::make('area')->label('Площадь'),
                TextColumn::make('delivery')->label('Уведомление')->wrap(),
                TextColumn::make('created_at')->label('Дата')->dateTime('d.m.Y H:i')->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListLeads::route('/'),
            'view' => ViewLead::route('/{record}'),
        ];
    }
}
