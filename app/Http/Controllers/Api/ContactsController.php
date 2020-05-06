<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\Contact;
use App\Models\File;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{

    public function index()
    {
        $contacts = Contact::with('group')
            ->where('user_id', auth()->user()->id)
            ->get();

        return response()->json($contacts);
    }

    public function store(StoreRequest $request)
    {

        return (new Contact())->prepareForCreate($request);
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
