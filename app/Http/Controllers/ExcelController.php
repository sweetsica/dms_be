<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;

class ExcelController extends Controller
{
    public function setImportCustomter(Request $request)
    {
        $url = $request->file('file');
        Excel::import(new CustomersImport,$url,null,\Maatwebsite\Excel\Excel::XLSX);

        dd('Thành công!');
    }
}
