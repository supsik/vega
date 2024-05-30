<?php

namespace App\MoonShine\Resources;

use App\MoonShine\Controllers\LogController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use MoonShine\Resources\Resource;

class LogResource extends Resource
{
	public static string $title = 'Laravel log';
    public static string $subTitle = 'storage/logs/laravel.log';

    public static array $activeActions = ['index'];

    public function resolveRoutes(): void
    {
        Route::prefix('resource')->group(function () {
            Route::resource($this->uriKey(), LogController::class)
                ->only('index')
                ->parameters([$this->uriKey() => $this->routeParam()])
                ->names($this->routeNameAlias());
        });
    }

    public function fields(): array
	{
		return [];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return [];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [];
    }
}
