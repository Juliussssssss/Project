<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print()
    {
        $contacts = Contact::all();
        dd(heh);
        return view('printContact')->with('contacts', $contacts);
    }
}
