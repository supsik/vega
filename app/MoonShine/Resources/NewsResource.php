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
use MoonShine\Fields\Date;
use MoonShine\Fields\ID;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Slug;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Filters\DateFilter;
use MoonShine\Filters\SwitchBooleanFilter;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class NewsResource extends Resource
{
	public static string $model = 'App\Models\News';

	public static string $title = 'Новости';

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

                        MediaLibrary::make('Миниатюра', 'cover')
                            ->customName(fn(UploadedFile $file)=> Translitelator::transliterate($file->getClientOriginalName()))
                            ->allowedExtensions(['jpg', 'gif', 'png', 'webp'])
                            ->hint('Рекомендованный размер изображения 700x394'),

                        Flex::make([
                            Text::make('Заголовок', 'title')
                                ->required(),

                            Slug::make('ЧПУ', 'slug')
                                ->from('title')
                                ->separator('-')
                                ->unique()
                                ->locked()
                                ->hideOnIndex(),
                        ])->itemsAlign('center'),


                        Textarea::make('Краткое описание', 'excerpt')
                            ->nullable()
                            ->hideOnIndex()
                            ->hint('Отображается в карточки новости'),

                        TinyMce::make('Контент', 'content')
                            ->toolbar(config('moonshine.tinymce.toolbar'))
                            ->hideOnIndex(),

                        Date::make('Дата публикации', 'published_at')
                            ->format('d.m.Y')
                            ->sortable()
                            ->nullable(),

                        SwitchBoolean::make('Опубликовать', 'is_published')
                            ->hideOnIndex()
                            ->hideOnDetail(),

                        NoInput::make('Опубликована', 'is_published')
                            ->boolean()
                            ->sortable()
                            ->hideOnForm()
                            ->hideOnUpdate(),

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
                    ]),
                ]),

                NoInput::make('Перейти на страницу')->link(fn($item) => route('news.show', $item), blank: true)
                    ->hideOnIndex()
                    ->hideOnCreate(),
            ])

        ];
	}

	public function rules(Model $item): array
	{
        $isEdited = $this->getItem()?->exists;

	    return [
            'cover' => [$isEdited ? 'nullable' : 'required', 'image', 'max:5000'],
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'excerpt' => ['nullable', 'string', 'min:5', 'max:250'],
            'content' => ['required', 'string', 'min:5'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['boolean'],
            'seo_description' => ['nullable', 'string', 'max:250'],
            'seo_title' => ['nullable', 'string', 'max:250'],
            'seo_keywords' => ['nullable', 'string', 'max:250'],
        ];
    }

    public function search(): array
    {
        return ['id', 'title'];
    }

    public function filters(): array
    {
        return [
            DateFilter::make('Дата публикации', 'published_at'),
            SwitchBooleanFilter::make('Опубликована', 'is_published')
                ->default(true),
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
