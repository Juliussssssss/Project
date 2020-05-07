<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\Contact;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{

    public function getContacts()
    {
        $select = [
            'id', 'avatar', 'favorites', 'first_name', 'middle_name', 'last_name', 'email', 'number', 'avatar', 'group_id'
        ];
        $contacts = Contact::select($select)
            ->where('user_id', auth()->user()->id)
            ->orderBy('first_name')
            ->with('group:id,name')
            ->get();

        return response()->json($contacts);
    }

    public function setFavorites(Request $request)
    {
        $contact = Contact::find($request->id)->update(['favorites' => $request->value]);

        return response()->json("ok");
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
