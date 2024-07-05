<?php

namespace App\Jobs;

use App\Imports\PersonsImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;


class ImportExcelFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $file;

    /**
     * Create a new job instance.
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::import(new PersonsImport(), $this->file);
    }
}
