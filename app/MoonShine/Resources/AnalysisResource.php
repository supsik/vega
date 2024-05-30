<?php

namespace App\MoonShine\Resources;

use App\Models\Analysis;
use App\MoonShine\Actions\ImportAnalysisAction;
use App\MoonShine\Actions\ImportAnalysisExcelAction;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\ID;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Filters\BelongsToFilter;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;

class AnalysisResource extends Resource
{
    public static string $model = Analysis::class;

    public static string $title = 'Список анализов';

    public static array $activeActions = ['show', 'edit', 'delete'];

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                BelongsTo::make('Группа', 'analysisGroup', 'name')
                    ->required()
                    ->hint('Выберите внутри какой группы будет отображаться анализ'),

                Text::make('Наименование', 'name')
                    ->required(),

                Text::make('Срок исполнения', 'period')
                    ->hideOnIndex()
                    ->required(),

                Number::make('Стоимость', 'price')
                    ->expansion('₽')
                    ->required(),
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'analysis_group_id' => ['required'],
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:1', 'max:99999'],
        ];
    }

    public function search(): array
    {
        return ['id', 'name'];
    }

    public function filters(): array
    {
        return [
            BelongsToFilter::make('Группа', 'analysisGroup', 'name')
                ->required(),
        ];
    }

    public function actions(): array
    {
        return [
//            AnalysisLoadingAction::make('Обновить список анализов'),
            ImportAnalysisExcelAction::make('Импорт xlsx')
                ->disk('public')
                ->dir('/exports')
                ->deleteAfter()
                ->showInLine(),
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
