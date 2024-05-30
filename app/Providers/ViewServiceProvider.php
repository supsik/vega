<?php

namespace App\Providers;

use App\View\Composers\NavigationComposer;
use App\View\Composers\VariablesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.main', 'search', 'components.price-list.item', 'livewire.pages.appointment-page'], VariablesComposer::class);
        View::composer('partials.menu', NavigationComposer::class);
    }
}
