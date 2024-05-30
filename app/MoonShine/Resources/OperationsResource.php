<?php

namespace App\MoonShine\Resources;

use App\Helpers\Translitelator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\ID;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Number;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use MoonShine\Fields\BelongsToMany;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;
use Illuminate\Support\Facades\DB;

class OperationsResource extends Resource
{
    public static string $model = 'App\Models\Operations';

    public static string $title = 'Операции';

    public function afterCreated(Model $item)
    {
        $item->optimizeCover();
        $filePath = $item->getFirstMediaPath('cover');
        Translitelator::updateImageName($item, $filePath);
    }

    protected function afterUpdated(Model $item)
    {
        $item->optimizeCover();
        $filePath = $item->getFirstMediaPath('cover');
        Translitelator::updateImageName($item, $filePath);
    }

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Основное', [
                        ID::make()->sortable(),

                        MediaLibrary::make('Изображение', 'cover')
                            ->customName(fn(UploadedFile $file)=> Translitelator::transliterate($file->getClientOriginalName()))
                            ->allowedExtensions(['jpg', 'gif', 'png', 'webp'])
                            ->hint('Рекомендованный размер изображения 800х450'),

                        Number::make('Позиция', 'order')
                            ->sortable()
                            ->default(1)
                            ->hint('Порядковый номер диагностики для сортировки от меньшего к большему'),

                        Number::make('Цена', 'price')
                            ->hideOnIndex(),

                        Flex::make([
                            Text::make('Наименование', 'name')
                                ->required(),

                            Slug::make('ЧПУ', 'slug')
                                ->from('name')
                                ->separator('-')
                                ->unique()
                                ->locked()
                                ->hideOnIndex(),
                        ])->itemsAlign('center'),

                        BelongsToMany::make('Врачи', 'doctors', 'second_name')
                            ->select()
                            ->hideOnIndex(),


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
                ]),

                NoInput::make('Перейти на страницу')->link(fn($item) => route('diagnostics.show', $item), blank: true)
                    ->hideOnIndex()
                    ->hideOnCreate(),
            ])
        ];
    }

    public function rules(Model $item): array
    {
        $isEdited = $this->getItem()?->exists;

        return [
            'cover' => [$isEdited ? 'nullable' : 'required', 'image', 'max:50000'],
            'order' => ['required', 'numeric', 'min:1'],
            'name' => ['required', 'string', 'max:70'],
            'description' => ['nullable', 'string'],
            'services.*.title' => ['required', 'string', 'max:150'],
            'services.*.price' => ['required', 'numeric', 'min:1', 'max:999999'],
            'seo_description' => ['nullable', 'string', 'max:250'],
            'seo_title' => ['nullable', 'string', 'max:250'],
            'seo_keywords' => ['nullable', 'string', 'max:250'],
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
