<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;

use MoonShine\Fields\NoInput;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Decorations\Block;
use MoonShine\Actions\FiltersAction;

class ReviewResource extends Resource
{
	public static string $model = 'App\Models\Review';

	public static string $title = 'Отзывы';

	public function fields(): array
	{
		return [
		   Block::make([
               ID::make()->sortable(),

               Text::make('Автор', 'author')
                   ->required(),

               Textarea::make('Текст', 'text')
                   ->required(),

               SwitchBoolean::make('Опубликовать', 'is_published')
                   ->hideOnIndex()
                   ->hideOnDetail(),

               NoInput::make('Опубликован', 'is_published')
                   ->boolean()
                   ->hideOnForm()
                   ->hideOnUpdate(),
           ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'author' => ['required', 'string', 'min:3', 'max:50'],
            'text' => ['required', 'string', 'min:10', 'max:1000'],
        ];
    }

    public function search(): array
    {
        return ['id', 'author'];
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
