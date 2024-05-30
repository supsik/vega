<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    public function index(Request $request): View
    {
        $currentPage = $request->query('page', 1);

        $params = [
            'limit' => config('medods.per_page'),
            'offset' => ($currentPage - 1) * config('medods.per_page'),
            //'status' => 'need_approval', TODO установить значение
            'clinicId' => config('medods.clinic_id'),
            'clientId' => $request->user()->medodsId,
        ];

        $cacheKey = "user_apponments_{$params['clientId']}";

        if(!Cache::has($cacheKey))
        {
            ['data' => $data, 'totalItems' => $totalItems] = app('medods')->appointment()->list($params);

            $appointmentsData = new LengthAwarePaginator(
                array_reverse($data),
                $totalItems,
                config('medods.per_page'),
                $currentPage,
                ['path' => route('user.appointment.index')]
            );

            Cache::store('file')->put($cacheKey, $appointmentsData);
        }

        $appointments = Cache::store('file')->get($cacheKey);

        return view('user.appointment.index', compact('appointments'));
    }

    public function show(int $appointmentId): View
    {
        $cacheKey = "user_apponment_{$appointmentId}";

        if(!Cache::has($cacheKey))
        {
            $appointmentData = app('medods')->appointment()->find($appointmentId);

            $entryId = $appointmentData['entryTypeIds'][0];

            $entryData = app('medods')->entryType()->find($entryId);

            $doctorId = $appointmentData['userId'];

            $doctorData = app('medods')->user()->find($doctorId);

            Cache::store('file')->put($cacheKey, json_encode([
                'appointment' => $appointmentData,
                'doctor' => $doctorData,
                'entry' => $entryData,
            ]));
        }

        ['appointment' => $appointment, 'doctor' => $doctor, 'entry' => $entry] = json_decode(Cache::store('file')->get($cacheKey), true);

        return view('user.appointment.show', compact('appointment', 'doctor', 'entry'));
    }

    public function destroy(int $appointmentId, Request $request): RedirectResponse
    {
        $params = [
            'status' => 'canceled',
        ];

        app('medods')->appointment()->update($appointmentId, $params);

        $appointment = app('medods')->appointment()->find($appointmentId);
        $doctorId = $appointment['userId'];

        $doctor = Doctor::query()->where('medods_id', $doctorId)->first();

        $scheduleCacheKey = "schedule_{$doctor->id}_{$appointment['clinicId']}";
        $apponimentsCacheKey = "user_apponments_{$request->user()->medodsId}";
        $apponimentCacheKey = "user_apponment_{$appointmentId}";

        Cache::store('file')->forget($scheduleCacheKey);
        Cache::store('file')->forget($apponimentsCacheKey);
        Cache::store('file')->forget($apponimentCacheKey);

        flash()->success('Запись успешно отменена!');
        return redirect()->back();
    }
}
