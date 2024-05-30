<?php

namespace App\MoonShine\Resources;

use App\Helpers\Translitelator;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\ID;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class EmployeeResource extends Resource
{
	public static string $model = Employee::class;

	public static string $title = 'Сотрудники';

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

                        MediaLibrary::make('Фотография', 'photo')
                            ->customName(fn(UploadedFile $file)=> Translitelator::transliterate($file->getClientOriginalName()))
                            ->allowedExtensions(['jpg', 'gif', 'png', 'webp'])
                            ->hint('Рекомендованный размер изображения 400х400'),

                        Flex::make([
                            Text::make('Фамилия', 'second_name')
                                ->required()
                                ->hideOnIndex()
                                ->hideOnDetail(),

                            Text::make('Имя', 'first_name')
                                ->required()
                                ->hideOnIndex()
                                ->hideOnDetail(),
                        ])->itemsAlign('center'),

                        NoInput::make('Имя', 'name')
                            ->hideOnCreate()
                            ->hideOnUpdate(),

                        Slug::make('ЧПУ', 'slug')
                            ->from('name')
                            ->separator('-')
                            ->unique()
                            ->locked()
                            ->hideOnIndex(),

                        BelongsTo::make('Должность', 'position', 'name')
                            ->searchable()
                            ->nullable()
                            ->hint('Выберите должность сотрудника или оставьте это поле пустым'),


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

                NoInput::make('Перейти на страницу')->link(fn($item) => route('team.show', $item), blank: true)
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
            'position' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string', 'max:250'],
            'seo_title' => ['nullable', 'string', 'max:250'],
            'seo_keywords' => ['nullable', 'string', 'max:250'],
        ];
    }

    public function search(): array
    {
        return ['id', 'first_name', 'second_name'];
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
