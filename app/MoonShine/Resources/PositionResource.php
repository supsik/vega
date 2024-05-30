<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

use MoonShine\Decorations\Block;
use MoonShine\Fields\Text;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class PositionResource extends Resource
{
	public static string $model = Position::class;

	public static string $title = 'Должности';

	public function fields(): array
	{
		return [
		    Block::make([
                ID::make()->sortable(),

                Text::make('Наименование', 'name')
                    ->required(),
            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'name' => ['required', 'string', 'max:70'],
        ];
    }

    public function search(): array
    {
        return ['id', 'name'];
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
