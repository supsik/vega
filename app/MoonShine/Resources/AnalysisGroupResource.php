<?php

namespace App\MoonShine\Resources;

use App\Models\AnalysisGroup;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;

class AnalysisGroupResource extends Resource
{
    public static string $model = AnalysisGroup::class;

    public static string $title = 'Группы анализов';

    public static array $activeActions = ['show', 'edit', 'delete'];

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
            'name' => ['required', 'string', 'max:100'],
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
