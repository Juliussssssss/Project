<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Excel\ImportRequest;
use App\Imports\ContactsImport;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    /**
     * @param  ImportRequest  $request
     * @return Application|ResponseFactory|Response
     */
    public function importContacts(ImportRequest $request)
    {
        if ($request->hasFile('import')) {
            $file = $request->file('import');
            $path = $file->getRealPath();
            $size = $file->getSize();
            $extension = $file->getClientOriginalExtension();

            if(($extension=='xls')||($extension=='xlsx')){
                if($size>100000){

                    return  response('error size',500);
                }
                $import = new ContactsImport();
                $import->import( $request->file('import'));
            }
            else {

                return  response('error type',500);
            }
        }

        return response('ok',200);
    }

    public function getTemplate()
    {
        return response()->download(Storage::path('/public/excel_template/template.xls'), 'шаблон.xls');
    }
}
