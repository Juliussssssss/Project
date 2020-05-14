<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Excel\ImportRequest;
use App\Imports\ContactsImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function importContacts(ImportRequest $request)
    {
        if ($request->hasFile('import')) {
            $file = $request->file('import');
            $path = $file->getRealPath();
            $extension = $file->getClientOriginalExtension();

            if(($extension=='xls')||($extension=='xlsx')){
                $import = new ContactsImport();
                $import->import($path);
                dd($import);
            }
            else {

                return  response('error type',500);
            }
        }

        return response('ok',200);
    }
}
