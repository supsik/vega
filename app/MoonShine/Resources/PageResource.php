<?php

namespace App\MoonShine\Resources;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Url;
use MoonShine\Resources\Resource;

class PageResource extends Resource
{
    public static string $model = 'App\Models\Page';

    public static string $title = 'Целевые страницы';

    public static string $orderType = 'ASC';

    public static array $activeActions = ['edit'];

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Основное', [
                        ID::make()->sortable(),

                        Flex::make([
                            Text::make('Наименование страницы', 'title')->required()
                                ->readonly(),
                            Text::make('ЧПУ', 'slug')
                                ->readonly()
                                ->hideOnIndex()
                        ])->itemsAlign('center'),


                        TinyMce::make('Контент', 'content')
                            ->toolbar(config('moonshine.tinymce.toolbar'))
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isSimplePage()),

                        BelongsTo::make('Сотрудник', 'employee', fn(Employee $employee) => $employee->name)
                            ->nullable()
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isPageBySlug('home') || $this->isPageBySlug('about')),

                        TinyMce::make('Левая колонка с текстом', 'first_block_text')
                            ->toolbar(config('moonshine.tinymce.simple_toolbar'))
                            ->nullable()
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isPageBySlug('home')),

                        TinyMce::make('Правая колонка с текстом', 'second_block_text')
                            ->toolbar(config('moonshine.tinymce.simple_toolbar'))
                            ->nullable()
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isPageBySlug('home')),

                        TinyMce::make('Клиника Vega', 'first_block_text')
                            ->toolbar(config('moonshine.tinymce.toolbar'))
                            ->nullable()
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isPageBySlug('about')),
                        TinyMce::make('Наша клиника', 'second_block_text')
                            ->toolbar(config('moonshine.tinymce.toolbar'))
                            ->nullable()
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isPageBySlug('about')),
                        Url::make('Ссылка youtube', 'youtube_link')
                            ->nullable()
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isPageBySlug('about')),

                        TinyMce::make('Текст', 'first_block_text')
                            ->toolbar(config('moonshine.tinymce.simple_toolbar'))
                            ->nullable()
                            ->hideOnIndex()
                            ->canSee(fn() => $this->isPageBySlug('contacts')),

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
                ])
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:50'],
            'content' => ['nullable', 'string', 'min:5'],
            'seo_description' => ['nullable', 'string', 'max:250'],
            'seo_title' => ['nullable', 'string', 'max:250'],
            'seo_keywords' => ['nullable', 'string', 'max:250'],
            'first_block_text' => ['nullable', 'string', 'min:5', 'max:9999'],
            'second_block_text' => ['nullable', 'string', 'min:5', 'max:9999'],
            'youtube_link' => ['nullable', 'string', 'url', 'max:200'],
        ];
    }

    public function search(): array
    {
        return ['id', 'title'];
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

    public function isSimplePage()
    {
        return $this->isPageBySlug('policy') || $this->isPageBySlug('advanced-equipment')|| $this->isPageBySlug('operations-block');
    }

    public function isPageBySlug(string $slug)
    {
        $page = $this->getItem();

        return $page->slug === $slug;
    }
}
