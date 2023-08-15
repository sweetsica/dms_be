<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Exports\ErrorRowsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function setImportCustomter(Request $request)
    {
        $url = $request->file('file');
        $import = new CustomersImport();

        try {
            Excel::import($import, $url, null, \Maatwebsite\Excel\Excel::XLSX);

            if ($import->hasErrors()) {
                $errors = $import->getErrors();

                $export = new ErrorRowsExport($errors);

                // Specify the file path where you want to store the exported file
                $filePath = 'exports/error_' . Str::uuid() . '.xlsx'; // Update with your desired file path

                // Store the file using the Excel facade and specify the disk ('public' in this example)
                Excel::store($export, $filePath, 'public');

                // Alternatively, if you want to store the file using the default disk specified in your configuration file:
                // Excel::store($export, $filePath);

                // Retrieve the full URL of the stored file
                $fileUrl = asset('storage/' . $filePath);
                dd($fileUrl);
                // $storageUrl = $this->uploadFileToRemoteHost($filess);
                // return $storageUrl;
            }
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

    private function _toObject($array)
    {
        $objectStr = json_encode($array);
        $object = json_decode($objectStr);
        return $object;
    }

    public function uploadFileToRemoteHost($file)
    {
        $fileStream = fopen($file, 'r');
        $url = "https://report.sweetsica.com/api/report/upload";
        //send form data
        $response = Http::attach(
            'files',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post($url);

        //throw exception if response is not successful
        $response->throw()->json();
        //get data from response
        $data = $response->json();
        $dataObj = $this->_toObject($data);
        return $dataObj->downloadLink;
    }
}
