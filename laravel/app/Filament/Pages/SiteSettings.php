<?php

namespace App\Filament\Pages;

use App\Models\SiteField;
use App\Support\Site;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

/**
 * «Настройки сайта» — контакты, реквизиты, куда слать заявки, иконка сайта.
 * Хранятся как opt_<ключ>; пустое поле — значение из макета.
 *
 * @property-read Schema $form
 */
class SiteSettings extends Page
{
    protected string $view = 'filament.pages.site-settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Настройки сайта';

    protected static ?string $title = 'Настройки сайта';

    protected static ?int $navigationSort = 3;

    /** @var array<string, mixed>|null */
    public ?array $data = [];

    private const HELP = [
        'phone' => 'Так, как он выводится на сайте; ссылка tel: собирается из цифр автоматически.',
        'leads_email' => 'На этот ящик приходит каждая заявка из калькулятора бюджета.',
        'mail_from' => 'Должен быть на домене сайта, иначе письма уйдут в спам.',
        'tg_bot_token' => 'Необязательно. Если заполнить вместе с ID чата — заявки будут дублироваться в Telegram.',
    ];

    public function mount(): void
    {
        $data = [];
        foreach (Site::OPTIONS as $key => [, $default]) {
            $data[$key] = Site::value('opt_'.$key) ?? ($key === 'site_icon' ? null : $default);
        }
        $this->form->fill($data);
    }

    private function input(string $key): TextInput
    {
        [$label, $default] = Site::OPTIONS[$key];
        $field = TextInput::make($key)->label($label)->helperText(self::HELP[$key] ?? null);
        if (in_array($key, ['email', 'leads_email', 'mail_from'], true)) {
            $field->email();
        }
        if ($key === 'instagram_url') {
            $field->url();
        }

        return $field;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([
                    Section::make('Контакты и реквизиты')->columns(2)->schema(array_map(
                        fn ($k) => $this->input($k),
                        ['phone', 'telegram_url', 'viber_url', 'email', 'instagram_url', 'hours', 'company', 'unp', 'office'],
                    )),
                    Section::make('Заявки')->columns(2)->schema(array_map(
                        fn ($k) => $this->input($k),
                        ['leads_email', 'mail_from', 'tg_bot_token', 'tg_chat_id'],
                    )),
                    Section::make('Иконка сайта')->schema([
                        FileUpload::make('site_icon')->label('Иконка (PNG, квадрат от 192 px)')
                            ->disk('public')->directory('site')->image()->maxSize(2048)
                            ->helperText('Пусто — текущая иконка сайта (site-icon.png).'),
                    ]),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')->label('Сохранить')->submit('save')->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        foreach ($this->form->getState() as $key => $value) {
            if (! array_key_exists($key, Site::OPTIONS)) {
                continue;
            }
            $value = is_string($value) ? trim($value) : $value;
            if ($value === '' || $value === null || $value === Site::OPTIONS[$key][1]) {
                SiteField::whereKey('opt_'.$key)->delete();
            } else {
                SiteField::updateOrCreate(['key' => 'opt_'.$key], ['value' => $value]);
            }
        }
        Site::forget();
        Notification::make()->success()->title('Сохранено')->send();
    }
}
