<?php

namespace App\Providers;

use App\MoonShine\Dashboard;
use App\MoonShine\Resources\AnalysisGroupResource;
use App\MoonShine\Resources\AnalysisResource;
use App\MoonShine\Resources\DiagnosticsResource;
use App\MoonShine\Resources\OperationsResource;
use App\MoonShine\Resources\OperationBlockResource;
use App\MoonShine\Resources\DoctorResource;
use App\MoonShine\Resources\DocumentResource;
use App\MoonShine\Resources\EmployeeResource;
use App\MoonShine\Resources\HomeSlideResource;
use App\MoonShine\Resources\LogResource;
use App\MoonShine\Resources\MedodsDoctorResource;
use App\MoonShine\Resources\NewsResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\PositionResource;
use App\MoonShine\Resources\ReviewResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\SpecialityResource;
use App\MoonShine\Resources\VariableResource;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\MoonShine;
use MoonShine\Resources\MoonShineUserResource;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuItem::make('Главная', '/admin')
                ->icon('heroicons.outline.home'),

            MenuItem::make('Диагностики', DiagnosticsResource::class)
                ->icon('heroicons.outline.clipboard'),
            MenuGroup::make('Операционный блок', [
                MenuItem::make('Операции', OperationsResource::class)
                    ->icon('heroicons.outline.clipboard'),
                MenuItem::make('Хирургическое отделение', OperationBlockResource::class)
                    ->icon('heroicons.outline.clipboard'),
            ])
                ->icon('heroicons.outline.clipboard'),
            MenuGroup::make('VegaВрачи', [
                MenuItem::make('Врачи', DoctorResource::class)
                    ->icon('heroicons.outline.users'),
                MenuItem::make('Специальности', SpecialityResource::class)
                    ->icon('heroicons.outline.identification'),
            ])
                ->icon('heroicons.outline.heart'),

            MenuGroup::make('Управление клиникой', [
                MenuItem::make('Сотрудники', EmployeeResource::class)
                    ->icon('heroicons.outline.users'),
                MenuItem::make('Должности', PositionResource::class)
                    ->icon('heroicons.outline.trophy'),

            ])
                ->icon('users'),

            MenuGroup::make('Анализы', [
                MenuItem::make('Список анализов', AnalysisResource::class)
                    ->icon('heroicons.outline.list-bullet'),

                MenuItem::make('Группы анализов', AnalysisGroupResource::class)
                    ->icon('app')
                    ->icon('heroicons.outline.rectangle-stack'),
            ])
                ->icon('heroicons.outline.beaker'),

            MenuGroup::make('Ресурсы', [
                MenuItem::make('Слайдер', HomeSlideResource::class)
                    ->icon('heroicons.outline.computer-desktop'),
                MenuItem::make('Новости', NewsResource::class)
                    ->icon('heroicons.outline.newspaper'),
                MenuItem::make('Отзывы', ReviewResource::class)
                    ->icon('heroicons.outline.star'),
                MenuItem::make('Документы', DocumentResource::class)
                    ->icon('heroicons.outline.clipboard-document-check'),
            ])
                ->icon('app'),

            MenuItem::make('Страницы', PageResource::class)
                ->icon('heroicons.outline.document-text'),

            MenuItem::make('Переменные', VariableResource::class)
                ->icon('heroicons.outline.circle-stack'),

            MenuGroup::make('Импорт medods', [
                MenuItem::make('Врачи', MedodsDoctorResource::class)
                    ->icon('heroicons.outline.users'),
                MenuItem::make('Услуги', ServiceResource::class)
                    ->icon('heroicons.outline.currency-dollar'),
            ])
                ->icon('heroicons.outline.squares-plus'),

            MenuGroup::make(__('moonshine::ui.resource.system'), [
                MenuItem::make(__('moonshine::ui.resource.admins_title'), new MoonShineUserResource())
                    ->icon('heroicons.outline.users'),
                MenuItem::make('Logs', new LogResource())
                    ->icon('show'),
            ])
                ->icon('heroicons.outline.wrench-screwdriver'),
        ]);

        if (app()->isProduction()) {

            $this->routes(function () {
                Route::get('/base/user', function () {
                    return Dashboard::base();
                });
            });
        }
    }
}
