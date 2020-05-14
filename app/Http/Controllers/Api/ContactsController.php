<?php

namespace App\Http\Controllers\Api;

//use App\Exports\ContactsExport;
use App\Exports\ContactsFrequentExport;
use App\Exports\ContactsGroupExport;
use App\Exports\ContactsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\CallLog;
use App\Models\Contact;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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

    public function getFrequentContacts()
    {
        $select = [
            'id', 'avatar', 'favorites', 'first_name', 'middle_name', 'last_name', 'email', 'number', 'avatar', 'group_id'
        ];

        $contacts = Contact::has('callLog', '>=', 3)
            ->select($select)
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

    public function favorites()
    {
        $contacts = Contact::getUserContacts()
            ->where('favorites', 1)
            ->orderBy('first_name')
            ->with('group:id,name')
            ->get();

        return response()->json($contacts, 200);
    }

    public function store(StoreRequest $request)
    {

        return (new Contact())->prepareForCreate($request);
    }

    public function show($id)
    {
        $select = [
            'id', 'avatar', 'favorites', 'first_name',
            'middle_name', 'last_name', 'email', 'number',
            'avatar', 'group_id','site','birthday','comment',
            'work', 'work_email','city','position'
        ];
        $contact = Contact::where('id',$id)
            ->where('user_id',auth()->user()->id)
            ->first($select);
        if(!$contact){

            return response( 'error',403);
        }

        return response()->json($contact);
    }

    public function update(UpdateRequest $request)
    {

        return (new Contact())->prepareForUpdate($request);
    }

    public function destroy(Request $request)
    {
        $user_id = auth()->user()->id;

        foreach ($request['contacts'] as $contact_id) {
            Contact::where('user_id', $user_id)
                ->where('id', $contact_id)
                ->delete();
        }

        return response('ok', 200);
    }

    public function exportAll()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

    public function exportFrequent()
    {
        return Excel::download(new ContactsFrequentExport, 'contacts.xlsx');
    }

    public function exportGroup(int $id)
    {
        return Excel::download(new ContactsGroupExport($id), 'contacts.xlsx');
    }

    public function getContactsCount()
    {
        try {
            $count = Contact::where('user_id', auth()->user()->id)->count();

            return response()->json($count, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    public function getCountFrequentContacts()
    {
        try {
            $count = Contact::has('callLog', '>=', 3)
                ->where('user_id', auth()->user()->id)
                ->count();

            return response()->json($count, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }
}
