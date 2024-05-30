<?php

namespace App\MoonShine\Resources;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Actions\ExportAction;
use MoonShine\Actions\FiltersAction;
use MoonShine\Actions\ImportAction;
use MoonShine\Decorations\Block;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\ID;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Number;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Filters\BelongsToFilter;
use MoonShine\Filters\IsNotEmptyFilter;
use MoonShine\Filters\SlideFilter;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;

class ServiceResource extends Resource
{
    public static string $model = Service::class;

    public static string $title = 'Услуги';

    public static array $activeActions = ['show', 'edit', 'delete'];

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()
                    ->sortable()
                    ->useOnImport()
                    ->showOnExport(),

                BelongsTo::make('Диагностика', 'diagnostics', 'name')
                    ->nullable()
                    ->hint('Укажите к какой диагностики относится данная услуга или оставьте это поле пустым'),

                Text::make('Наименование', 'title')
                    ->useOnImport()
                    ->showOnExport()
                    ->required(),

                Text::make('Ссылка', 'link')
                    ->useOnImport()
                    ->showOnExport(),

                Number::make('Сортировка', 'sort')
                    ->sortable()
                    ->default(1),

                Number::make('Стоимость услуги', 'price')
                    ->expansion('₽')
                    ->useOnImport()
                    ->showOnExport()
                    ->required(),

                SwitchBoolean::make('Отключить запись', 'is_disabled')
                    ->hideOnIndex()
                    ->hideOnDetail(),

                NoInput::make('Запись отключена', 'is_disabled')
                    ->boolean()
                    ->sortable()
                    ->hideOnForm()
                    ->hideOnUpdate(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'price' => ['required', 'numeric', 'min:1', 'max:999999'],
            'is_disabled' => ['boolean'],
        ];
    }

    public function search(): array
    {
        return ['id', 'title'];
    }

    public function filters(): array
    {
        return [
            SlideFilter::make('Стоимость услуги', 'price')
                ->min(Service::min('price') ?: 0)
                ->max(Service::max('price') ?: 0),

            BelongsToFilter::make('Диагностика', 'diagnostics', 'name')
                ->nullable(),

            IsNotEmptyFilter::make('Есть связь с диагностикой', 'diagnostics_id'),
        ];
    }

    public function actions(): array
    {
        return [
            ImportAction::make('Импорт csv')
                ->disk('public')
                ->dir('/exports')
                ->delimiter(';')
                ->deleteAfter()
                ->showInLine(),

            ExportAction::make('Экспорт')
                ->disk('public')
                ->dir('/exports')
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
