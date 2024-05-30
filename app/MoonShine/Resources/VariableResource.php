<?php

namespace App\MoonShine\Resources;

use App\Models\Variable;
use App\MoonShine\InputExtensions\InputCharCount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Fields\Code;
use MoonShine\Fields\Email;
use MoonShine\Fields\ID;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Text;
use MoonShine\Fields\Url;
use MoonShine\Resources\SingletonResource;

class VariableResource extends SingletonResource
{
	public static string $model = Variable::class;

	public static string $title = 'Переменные';

    public function fields(): array
	{
		return [
		    ID::make()->sortable(),

            Grid::make([
                Column::make([
                    Block::make('Основное', [
                        Phone::make('Номер телефона', 'phone')->mask('+7 (9999) 99-99-99')->required(),

                        Email::make('Контактный email', 'contact_email')->required()
                            ->extension(new InputCharCount(100)),

                        Email::make('Email', 'review_email')
                            ->extension(new InputCharCount(100))
                            ->hint('Почта на получение отзывов о сотрудниках')
                            ->required(),
                    ]),
                ]),

                Column::make([
                    Block::make('Клиника 1', [
                        Text::make('Адрес', 'first_address')
                            ->extension(new InputCharCount(100))
                            ->required(),
                        Text::make('Режим работы', 'first_mode')
                            ->extension(new InputCharCount(100))
                            ->required(),
                    ]),
                ]),

                Column::make([
                    Block::make('Клиника 2', [
                        Text::make('Адрес', 'second_address')
                            ->extension(new InputCharCount(100))
                            ->required(),
                        Text::make('Режим работы', 'second_mode')
                            ->extension(new InputCharCount(100))
                            ->required(),
                    ]),
                ]),

                Column::make([
                    Block::make('Яндекс карта', [
                        Code::make('Исходный код', 'ya_map')
                            ->language('js')
                            ->lineNumbers()
                            ->nullable()
                            ->hint('Удалите в скрипте ширину и высоту для корректного отображения на сайте'),
                        Url::make('Ссылка', 'ya_link')
                            ->copy()
                            ->nullable(),
                    ])
                ]),

                Column::make([
                    Block::make('Ссылки', [
                        Url::make('Ссылка vk', 'vk_link')
                            ->copy()
                            ->nullable(),
                        Url::make('Ссылка telegram', 'tg_link')
                            ->copy()
                            ->nullable(),
                        Url::make('Ссылка whatsapp', 'whatsapp_link')
                            ->copy()
                            ->nullable(),
                        Url::make('Ссылка ngc', 'ngc_link')
                            ->copy()
                            ->nullable(),
                    ])
                ]),

                Column::make([
                    Block::make('Текста', [
                        Text::make('Текст при отсутствии записи на услугу', 'service_disable_text')
                            ->extension(new InputCharCount(100))
                            ->required(),
                    ]),
                ]),
            ]),
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'phone' => ['required', 'string', 'min:18'],
            'contact_email' => ['required', 'string', 'email', 'max:100'],
            'review_email' => ['required', 'string', 'email', 'max:100'],
            'first_address' => ['required', 'string', 'max:100'],
            'first_mode' => ['required', 'string', 'max:100'],
            'second_address' => ['required', 'string', 'max:100'],
            'second_mode' => ['required', 'string', 'max:100'],
            'vk_link' => ['nullable', 'string'],
            'tg_link' => ['nullable', 'string'],
            'ya_link' => ['nullable', 'string'],
            'ngc_link' => ['nullable', 'string'],
            'service_disable_text' => ['required', 'string', 'max:100'],
        ];
    }


    public function getId(): int|string
    {
        return 1;
    }

    protected function afterUpdated()
    {
        Cache::forget('variables');
    }
}
