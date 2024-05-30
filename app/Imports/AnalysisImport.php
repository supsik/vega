<?php

namespace App\Imports;

use App\Models\AnalysisGroup;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AnalysisImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $group = null;

        foreach ($rows as $line) {
            $code = $line[0];

            if (strlen($code) === 4) {
                $group->analysis()->create([
                    'name' => $line[1],
                    'price' => $line[3],
                    'period' => $line[2],
                ]);
            } else {
                if (isUpperCase($code)) {
                    $group = AnalysisGroup::create(['name' => $code]);
                }
            }
        }
    }
}
