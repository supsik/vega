<?php

namespace App\MoonShine\Resources;

use App\Helpers\Translitelator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\NoInput;
use MoonShine\Fields\Number;
use MoonShine\Fields\SwitchBoolean;
use MoonShine\Fields\Text;
use MoonShine\Filters\SwitchBooleanFilter;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class HomeSlideResource extends Resource
{
    public static string $model = 'App\Models\HomeSlide';

    public static string $title = 'Слайдер';

    public function afterCreated(Model $item)
    {
        $item->optimizeDesktopImage();
        $filePath = $item->getFirstMediaPath('desktop_image');
        Translitelator::updateImageName($item, $filePath);

        // $item->optimizeMobileImage();
    }

    protected function afterUpdated(Model $item)
    {
        $item->optimizeDesktopImage();
        $filePath = $item->getFirstMediaPath('desktop_image');
        Translitelator::updateImageName($item, $filePath);

        // $item->optimizeMobileImage();
    }


    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                MediaLibrary::make('Десктопное изображение', 'desktop_image')
                    ->allowedExtensions(['jpg', 'gif', 'png', 'webp'])
                    ->customName(fn(UploadedFile $file)=> Translitelator::transliterate($file->getClientOriginalName()))
                    ->hint('Рекомендованный размер изображения 1920x728'),
                    
                    MediaLibrary::make('Мобильное изображение', 'mobile_image')
                    ->customName(fn(UploadedFile $file)=> Translitelator::transliterate($file->getClientOriginalName()))
                    ->allowedExtensions(['jpg', 'gif', 'png', 'webp'])
                    ->hideOnIndex()
                    ->hint('Рекомендованный размер изображения 500x400'),

                Text::make('Ссылка', 'link')
                    ->copy()
                    ->hideOnIndex()
                    ->nullable(),

                Number::make('Позиция', 'order')
                    ->sortable()
                    ->default(1)
                    ->hint('Порядковый номер слайда для сортировки от меньшего к большему'),

                SwitchBoolean::make('Опубликовать', 'is_published')
                    ->hideOnDetail()
                    ->hideOnIndex(),

                NoInput::make('Опубликован', 'is_published')
                    ->boolean()
                    ->sortable()
                    ->hideOnForm()
                    ->hideOnUpdate(),
            ])
        ];
    }

    public function rules(Model $item): array
    {
        $isEdited = $this->getItem()?->exists;

        return [
            'desktop_image' => [$isEdited ? 'nullable' : 'required', 'image', 'max:5000'],
            'mobile_image' => [$isEdited ? 'nullable' : 'required', 'image', 'max:5000'],
            'link' => ['nullable', 'string'],
            'order' => ['required', 'numeric', 'min:1'],
            'is_published' => ['boolean'],
        ];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [
            SwitchBooleanFilter::make('Опубликован', 'is_published'),
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
