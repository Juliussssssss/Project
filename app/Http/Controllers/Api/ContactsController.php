<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function index()
    {
        $contacts = DB::table('contacts')
            ->where('user_id', auth()->user()->id)
            ->get();

        return response()->json($contacts);
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function update(UpdateRequest $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
