<?php

namespace App\MoonShine\Resources;

use App\Models\MedodsDoctor;
use App\MoonShine\Actions\ImportAction;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Actions\ExportAction;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Flex;
use MoonShine\Fields\ID;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Text;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;

class MedodsDoctorResource extends Resource
{
    public static string $model = MedodsDoctor::class;

    public static string $title = 'Врачи(medods)';

    public static string $subTitle = 'Импортированные врачи из medods';

    public static array $activeActions = ['show', 'edit', 'delete'];

    public function fields(): array
    {
        return [
            ID::make()->sortable()
                ->showOnExport()
                ->useOnImport(),

            NoInput::make('ФИО', 'fullName')
                ->hideOnCreate()
                ->hideOnUpdate(),

            Flex::make([
                Text::make('Фамилия', 'surname')
                    ->showOnExport()
                    ->useOnImport()
                    ->hideOnDetail()
                    ->hideOnIndex()
                    ->required(),

                Text::make('Имя', 'name')
                    ->showOnExport()
                    ->useOnImport()
                    ->hideOnDetail()
                    ->hideOnIndex()
                    ->required(),

                Text::make('Отчество', 'second_name')
                    ->showOnExport()
                    ->useOnImport()
                    ->hideOnDetail()
                    ->hideOnIndex()
                    ->required(),
            ])->itemsAlign('center'),

        ];
    }

    public function rules(Model $item): array
    {
        return [
            'surname' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:50'],
            'second_name' => ['required', 'string', 'max:50']
        ];
    }

    public function search(): array
    {
        return ['id', 'surname', 'name', 'second_name'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),

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
