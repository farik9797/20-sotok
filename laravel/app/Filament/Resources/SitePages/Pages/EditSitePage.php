<?php

namespace App\Filament\Resources\SitePages\Pages;

use App\Filament\Resources\SitePages\SitePageResource;
use App\Models\SiteField;
use App\Support\Site;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Components\Attributes\Unexposed;
use Illuminate\Database\Eloquent\Model;

/**
 * Редактор страницы: вкладка на секцию макета, поле на каждый заголовок, абзац и картинку.
 * Пустое поле или текст, совпадающий с макетом, хранится как «пусто» — на сайте текст макета.
 */
class EditSitePage extends EditRecord
{
    protected static string $resource = SitePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('open')->label('Открыть на сайте')->color('gray')
                ->url(fn () => url($this->getRecord()->path), true),
        ];
    }

    private function fields(): array
    {
        return Site::pageFields($this->getRecord()->key);
    }

    private function isLong(array $f): bool
    {
        // как у SCF в теме: длинный текст или с разметкой — многострочное поле
        return mb_strlen($f['default']) > 90 || str_contains($f['default'], '<');
    }

    #[Unexposed]
    public function form(Schema $schema): Schema
    {
        $tabs = [];
        foreach ($this->fields() as $f) {
            $label = sprintf('%02d · %s', $f['tab_no'] === 99 ? 0 : $f['tab_no'], $f['tab'] !== '' ? $f['tab'] : 'Секция');
            if ($f['type'] === 'image') {
                $tabs[$label][] = FileUpload::make($f['key'])->label($f['label'])
                    ->disk('public')->directory('site')->image()->maxSize(8192)
                    ->helperText('Пусто — картинка макета ('.$f['default'].').');
                $tabs[$label][] = TextInput::make($f['key'].'__alt')->label('Описание картинки (alt)')
                    ->placeholder($f['alt'] ?? '');
            } elseif ($this->isLong($f)) {
                $tabs[$label][] = Textarea::make($f['key'])->label($f['label'])->rows(3)->autosize();
            } else {
                $tabs[$label][] = TextInput::make($f['key'])->label($f['label']);
            }
        }
        $page = $this->getRecord()->key;
        $tabs['SEO'] = [
            TextInput::make($page.'__seo_title')->label('Заголовок для поисковиков (title)')
                ->placeholder(Site::seoDefaults()[trim($this->getRecord()->path, '/')]['title'] ?? '')
                ->helperText('Пусто — заголовок из макета.'),
            Textarea::make($page.'__seo_description')->label('Описание (meta description)')->rows(3)
                ->placeholder(Site::seoDefaults()[trim($this->getRecord()->path, '/')]['description'] ?? '')
                ->helperText('Пусто — описание из макета.'),
        ];

        $components = [];
        foreach ($tabs as $label => $items) {
            $components[] = Tab::make($label)->schema($items);
        }

        return $schema->components([
            Tabs::make('sections')->tabs($components)->vertical()->persistTabInQueryString()->columnSpanFull(),
        ]);
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $out = [];
        foreach ($this->fields() as $f) {
            $v = Site::value($f['key']);
            if ($f['type'] === 'image') {
                $out[$f['key']] = $v;
                $out[$f['key'].'__alt'] = Site::value($f['key'].'__alt');
            } else {
                $out[$f['key']] = $v ?? $f['default'];
            }
        }
        $page = $this->getRecord()->key;
        foreach (['__seo_title', '__seo_description'] as $s) {
            $out[$page.$s] = Site::value($page.$s);
        }

        return $out;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $defaults = [];
        foreach ($this->fields() as $f) {
            $defaults[$f['key']] = $f['type'] === 'image' ? null : $f['default'];
        }
        foreach ($data as $key => $value) {
            $value = is_string($value) ? trim($value) : $value;
            if ($value === '' || $value === null || (array_key_exists($key, $defaults) && $value === $defaults[$key])) {
                SiteField::whereKey($key)->delete();
            } else {
                SiteField::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }
        Site::forget();
        $record->touch();

        return $record;
    }
}
