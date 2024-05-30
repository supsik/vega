<?php

namespace App\MoonShine\Resources;

use App\Helpers\Translitelator;
use App\Models\Doctor;
use App\Models\MedodsDoctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\BelongsToMany;
use MoonShine\Fields\ID;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Number;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Filters\BelongsToManyFilter;
use MoonShine\Filters\IsEmptyFilter;
use MoonShine\Filters\SlideFilter;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class DoctorResource extends Resource
{
    public static string $model = Doctor::class;

    public static string $title = 'Врачи(на сайте)';

    public function afterCreated(Model $item)
    {
        $item->optimizePhoto();
        $filePath = $item->getFirstMediaPath('photo');
        Translitelator::updateImageName($item, $filePath);
    }

    protected function afterUpdated(Model $item)
    {
        $item->optimizePhoto();
        $filePath = $item->getFirstMediaPath('photo');
        Translitelator::updateImageName($item, $filePath);
    }

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Основное', [
                        ID::make()->sortable(),

                        BelongsTo::make('ID medods', 'medods', function (?MedodsDoctor $doctor) {
                            if (is_null($doctor)) {
                                return '-';
                            }
                            return "#{$doctor->id} - {$doctor->surname} {$doctor->name} {$doctor->second_name}";
                        })
                            ->searchable()
                            ->nullable()
                            ->hideOnIndex()
                            ->hint('Выберите врача из списка для связи с medods'),

                        NoInput::make('Связан с medods', 'medods_id')
                            ->boolean()
                            ->sortable()
                            ->hideOnForm()
                            ->hideOnUpdate(),

                        MediaLibrary::make('Фотография', 'photo')
                            ->customName(fn(UploadedFile $file)=>Translitelator::transliterate($file->getClientOriginalName()))
                            ->allowedExtensions(['jpg', 'gif', 'png', 'webp'])
                            ->hint('Рекомендованный размер изображения 400х400'),

                        BelongsToMany::make('Специальность', 'specialities', 'singular_name')
                            ->select()
                            ->hideOnIndex(),

                        BelongsToMany::make('Диагностики', 'diagnostics', 'name')
                            ->select()
                            ->hideOnIndex()
                            ->hint('Выберите на каких страница диагностик будет отображаться врач'),

                        BelongsToMany::make('Услуги', 'services', 'title')
                            ->select()
                            ->hideOnIndex()
                            ->hint('Выберите какие услуги предоставляет данный врач'),

                        Flex::make([
                            Text::make('Фамилия', 'second_name')
                                ->required()
                                ->hideOnIndex()
                                ->hideOnDetail(),

                            Text::make('Имя', 'first_name')
                                ->required()
                                ->hideOnIndex()
                                ->hideOnDetail(),

                            Text::make('Отчество', 'last_name')
                                ->required()
                                ->hideOnIndex()
                                ->hideOnDetail(),
                        ])->itemsAlign('center'),

                        NoInput::make('ФИО', 'full_name')
                            ->hideOnCreate()
                            ->hideOnUpdate(),

                        Slug::make('ЧПУ', 'slug')
                            ->from('name')
                            ->separator('-')
                            ->unique()
                            ->locked()
                            ->hideOnIndex(),

                        Number::make('Стоимость консультации', 'price')
                            ->nullable()
                            ->expansion('₽')
                            ->hideOnIndex()
                            ->hint('Укажите стоимость консультации данного врача или оставьте это поле пустым'),

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

                NoInput::make('Перейти на страницу')->link(fn($item) => route('doctors.show', $item), blank: true)
                    ->hideOnIndex()
                    ->hideOnCreate(),
            ])
        ];
    }

    public function rules(Model $item): array
    {
        $isEdited = $this->getItem()?->exists;

        return [
            'photo' => [$isEdited ? 'nullable' : 'required', 'image', 'max:5000'],
            'first_name' => ['required', 'string', 'min:3', 'max:20'],
            'second_name' => ['required', 'string', 'min:3', 'max:20'],
            'last_name' => ['required', 'string', 'min:3', 'max:20'],
            'price' => ['nullable', 'numeric', 'min:1', 'max:99999'],
            'description' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string', 'max:250'],
            'seo_title' => ['nullable', 'string', 'max:250'],
            'seo_keywords' => ['nullable', 'string', 'max:250'],
        ];
    }

    public function search(): array
    {
        return ['id', 'first_name', 'second_name', 'last_name'];
    }

    public function filters(): array
    {
        return [
            BelongsToManyFilter::make('Специальность', 'specialities', 'plural_name')
                ->select(),

            SlideFilter::make('Стоимость консультации', 'price')
                ->min(Doctor::min('price') ?: 0)
                ->max(Doctor::max('price') ?: 0),

            IsEmptyFilter::make('Без связи с medods', 'medods_id'),
        ];
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
