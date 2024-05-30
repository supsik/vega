<?php

namespace App\Actions;

use App\Labquest\Exceptions\LabquestException;
use App\Labquest\LabquestApi;
use App\Models\AnalysisGroup;

class ImportAnalysisAction
{
    /**
     * @throws LabquestException
     */
    public function run()
    {
        $labquestApi = new LabquestApi();

        $response = $labquestApi->dictionaries();

        $analysisGroups = collect($response['analysisGroups'])->keyBy('id');
        $analysis = collect($response['analyses'])->groupBy('analysisGroupId');
        $prices = collect($response['prices'])->keyBy('serviceId');

        $data = $analysisGroups->map(function ($group) use ($analysis, $prices) {
            return [
                'name' => $group['name'],
                'analysis' => $analysis->get($group['id'], collect())->map(function ($item) use ($prices) {
                    return
                        collect($item)
                            ->merge(['price' => $prices->get($item['id'], [])['price'] ?? null])
                            ->only(['name', 'price'])
                            ->toArray();
                })
                    ->values()
                    ->toArray(),
            ];
        })
            ->values()
            ->toArray();

        AnalysisGroup::query()->delete();

        foreach ($data as $group) {
            $analysisGroup = AnalysisGroup::create($group);

            $analysisGroup->analysis()->createMany($group['analysis']);
        }
    }
}
