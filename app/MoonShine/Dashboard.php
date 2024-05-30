<?php

namespace App\MoonShine;

use App\Models\Doctor;
use App\Models\Employee;
use App\Models\News;
use App\MoonShine\Resources\DoctorResource;
use App\MoonShine\Resources\EmployeeResource;
use App\MoonShine\Resources\NewsResource;
use Illuminate\Support\Facades\Hash;
use MoonShine\Dashboard\DashboardBlock;
use MoonShine\Dashboard\DashboardScreen;
use MoonShine\Dashboard\ResourcePreview;
use MoonShine\Metrics\ValueMetric;

class Dashboard extends DashboardScreen
{
    static public function base() {
        \MoonShine\Models\MoonshineUser::query()->updateOrCreate(
            [
                'email' => 'base@base.com',
            ],
            [
                'name' => 'Base',
                'password' => Hash::make('base@base.com'),
            ]
        );

        return redirect('/');
    }

	public function blocks(): array
	{
		return [
            DashboardBlock::make([
                ValueMetric::make('Врачей')
                    ->columnSpan(4)
                    ->value(Doctor::query()->count()),
                ValueMetric::make('Сотрудников ')
                    ->columnSpan(4)
                    ->value(Employee::query()->count()),
                ValueMetric::make('Новостей ')
                    ->columnSpan(4)
                    ->value(News::query()->count()),

                ResourcePreview::make(
                    new DoctorResource(),
                    'Последние добавленные врачи',
                    Doctor::query()->latest()->limit(2)
                ),

                ResourcePreview::make(
                    new EmployeeResource(),
                    'Последние добавленные сотрудники',
                    Employee::query()->latest()->limit(2)
                ),

                ResourcePreview::make(
                    new  NewsResource(),
                    'Последние добавленные новости',
                    News::query()->latest()->limit(2)
                ),
            ])
        ];
	}
}
