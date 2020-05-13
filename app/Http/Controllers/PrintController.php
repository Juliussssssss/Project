<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function getContacts()
    {
        $contactsFromGroups = Contact::groupBy('group_id')
            ->where('user_id', auth()->user()->id)
            ->selectRaw('group_id, count(*) as total')
            ->with('group:id,name')
            ->get();

        return response()->json($contactsFromGroups);
    }
}
