<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;

class ExcelController extends Controller
{
    public function setImportCustomter(Request $request)
    {
        // $url = $request->file('file');
        // Excel::import(new CustomersImport($url), $url, null, \Maatwebsite\Excel\Excel::XLSX);

        // dd('Thành công!');

        $url = $request->file('file');
        $import = new CustomersImport();

        try {
            Excel::import($import, $url, null, \Maatwebsite\Excel\Excel::XLSX);
            dd('Thành công!');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            dd($errorMessage);
            // Handle the error or redirect back with the error message
            // ...
        }
    }

    public function setExportCustomter(Request $request)
    {
        return Excel::download(new CustomersExport, 'users.xlsx');
    }
}
