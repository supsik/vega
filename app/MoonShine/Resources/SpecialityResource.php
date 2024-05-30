<?php

namespace App\MoonShine\Resources;

use App\Models\Speciality;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\Slug;
use MoonShine\Fields\TinyMce;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;

class SpecialityResource extends Resource
{
	public static string $model = Speciality::class;

	public static string $title = 'Специальности';

	public function fields(): array
	{
		return [
		    Block::make([
                Tabs::make([
                    Tab::make('Основное', [
                        ID::make()->sortable(),

                        Text::make('Наименование в ед. числе', 'singular_name')
                            ->required()
                            ->hint('Пример: Невролог'),
                        Slug::make('ЧПУ', 'slug')
                            ->from('singular_name')
                            ->separator('-')
                            ->unique()
                            ->locked()
                            ->hideOnIndex(),

                        Text::make('Наименование во множ. числе', 'plural_name')
                            ->hint('Пример: Неврологи')
                            ->required(),

                        TinyMce::make('Описание', 'description')
                            ->toolbar(config('moonshine.tinymce.toolbar'))
                            ->hideOnIndex(),
                    ]),
                    

                    Tab::make('Поисковая оптимизация', [
                        Text::make('Заголовок(title)', 'seo_title')
                            ->nullable()
                            ->hideOnIndex(),

                        Textarea::make('Описание(description)', 'seo_description')
                            ->nullable()
                            ->hideOnIndex(),

                        Textarea::make('Ключевые слова(keywords)', 'seo_keywords')
                            ->nullable()
                            ->hideOnIndex(),
                    ])
                ])
            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'singular_name' => ['required', 'string', 'max:70'],
            'plural_name' => ['required', 'string', 'max:70'],
            'seo_description' => ['nullable', 'string', 'max:250'],
            'seo_title' => ['nullable', 'string', 'max:250'],
            'seo_keywords' => ['nullable', 'string', 'max:250'],
        ];
    }

    public function search(): array
    {
        return ['id', 'singular_name'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }


    public function formActions(): array
    {
        return [
            FormAction::make('Удалить', function (Model $item) {
                $item->delete();
            }, 'Удален')
                ->icon('delete')
                ->withConfirm()
                ->showInLine()
        ];
    }
}
