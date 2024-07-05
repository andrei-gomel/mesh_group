<?php

namespace App\Imports;

use App\Models\Person;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\WithChunkReading;


class PersonsImport implements WithChunkReading, ShouldQueue, ToCollection //, ToModel
{
    public static array $rules = [
        'file' => ['required', 'file', 'mimes:xls,xlsx'],
    ];

    public function chunkSize(): int
    {
        return 1000;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Cache::increment("Total_Save");

             Person::create([
                 'name' => $row[1],
                 'date' => $row[2],
             ]);
        }
    }

}
