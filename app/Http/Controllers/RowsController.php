<?php

namespace App\Http\Controllers;

use App\Imports\PersonsImport;
use App\Jobs\ImportExcelFileJob;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Collection;

class RowsController extends Controller
{
    public function index()
    {
        $rows = Person::all();

        if(count($rows) === 0)
            $totalSave = Cache::forget('Total_Save');

        $totalSave = Cache::get('Total_Save');

        return view('index', compact('rows', 'totalSave'));

    }

    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileName= rand() . $file->getClientOriginalName();
        $file->move('file_excels', $fileName);

        ImportExcelFileJob::dispatch(public_path('/file_excels/'. $fileName));

        return back();
    }

    public function formatData()
    {
        $rows = Person::all()->groupBy(function($date) {
           return \Carbon\Carbon::parse($date->date)->format('d-m-Y');
       });

        if(count($rows) === 0)
            $totalSave = Cache::forget('Total_Save');

        $totalSave = Cache::get('Total_Save');

        return view('rows', compact('rows', 'totalSave'));
    }
}
