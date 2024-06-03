<?php

namespace App\View\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use App\Models\Diagnostics;
use App\Models\OperationBlock;
use App\Models\Speciality;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view)
    {
        $diagnosticsMenuItems = Diagnostics::query()
            ->select(['name', 'slug'])
            ->oldest('order')
            ->get()
            ->map(fn($diagnostics) => MenuItem::make($diagnostics->name, route('diagnostics.show', $diagnostics->slug)))
            ->toArray();

        $operationsMenuItems = OperationBlock::query()
            ->select(['name', 'slug'])
            ->oldest('order')
            ->get()
            ->map(fn($operations) => MenuItem::make($operations->name, route('operations.index', $operations->slug)))
            ->toArray();
            // добавляем категорию "Все направления" в начало массива
            array_unshift($operationsMenuItems,MenuItem::make('Все направления', route('operations.general')));

        $specializationsMenuItems = Speciality::query()
            ->oldest('plural_name')
            ->select(['plural_name', 'slug'])
            ->whereHas('doctors')
            ->get()
            ->map(fn($speciality) => MenuItem::make($speciality->plural_name,
                route('doctors.speciality', ["{$speciality->slug}"])))
            ->toArray();
        //добавляем категорию "Все специальности" в начало массива
        array_unshift($specializationsMenuItems,MenuItem::make('Все специальности', route('doctors.index')));
        

        $menu = Menu::make()
            ->add(
                MenuItem::make('О клинике', null, [
                    MenuItem::make('Клиника Vega', route('about')),
                    MenuItem::make('Управление клиникой', route('team.index')),
                    MenuItem::make('Новости', route('news.index')),
                    MenuItem::make('Лицензии и сертификаты', route('documents')),
                ])
            )
            ->add(MenuItem::make('VegaДоктора', null, $specializationsMenuItems))
            ->add(MenuItem::make('Диагностика', null, $diagnosticsMenuItems))
            ->add(MenuItem::make('Хирургическое отделение', null, $operationsMenuItems))
            ->add(MenuItem::make('Анализы', route('analysis')))
            ->add(MenuItem::make('Прайс', route('prices')))
            ->add(MenuItem::make('Контакты', route('contacts')));

        $view->with('menu', $menu);
    }
}
