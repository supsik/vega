<?php

namespace App\MoonShine\Actions;

use App\Actions\ImportAnalysisAction;
use App\Labquest\Exceptions\LabquestException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use MoonShine\Actions\Action;
use MoonShine\Notifications\MoonShineNotification;

class AnalysisLoadingAction extends Action
{

    protected bool $inDropdown = false;

    protected ?string $icon = 'heroicons.outline.beaker';

    public function handle(): RedirectResponse
    {
        try {
            app(ImportAnalysisAction::class)->run();

            MoonShineNotification::send(
                message: 'Список анализов был обновлен!',
            );

            return back()
                ->with('alert', 'Список анализов обновлен!');
        } catch (LabquestException $e) {
            Log::error($e->getMessage());

            return back()
                ->with('alert', 'Произошла ошибка при выгрузке данных из Labquest. Попробуйте повторить действие позже.');
        }
    }
}
