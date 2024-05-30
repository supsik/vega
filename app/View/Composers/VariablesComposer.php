<?php

namespace App\View\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use App\Models\Diagnostics;
use App\Models\Speciality;
use App\Models\Variable;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class VariablesComposer
{
    public function compose(View $view)
    {
        $variables = Cache::remember('variables', 60, function () {
            return Variable::query()->first();
        });

        $view->with('variables', $variables);
    }
}
