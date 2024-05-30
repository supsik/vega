<?php

namespace App\MoonShine\Resources;

use App\Helpers\Translitelator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use MoonShine\Actions\FiltersAction;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\FormActions\FormAction;
use MoonShine\Resources\Resource;
use VI\MoonShineSpatieMediaLibrary\Fields\MediaLibrary;

class DocumentResource extends Resource
{
	public static string $model = 'App\Models\Document';

	public static string $title = 'Документы';

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
                ID::make()->sortable(),

                MediaLibrary::make('Изображение', 'cover')
                    ->customName(fn(UploadedFile $file)=> Translitelator::transliterate($file->getClientOriginalName()))
                    ->allowedExtensions(['jpg', 'gif', 'png', 'webp']),

            ])
        ];
	}

	public function rules(Model $item): array
	{
        $isEdited = $this->getItem()?->exists;

	    return [
            'cover' => [$isEdited ? 'nullable' : 'required', 'image', 'max:5000'],
        ];
    }

    public function search(): array
    {
        return ['id'];
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
