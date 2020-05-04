<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function index()
    {
        $posts = DB::table('posts')->get();
        dd(__METHOD__);
        return json_encode();
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
