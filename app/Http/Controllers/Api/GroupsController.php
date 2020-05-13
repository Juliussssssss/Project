<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateContactGroup;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class GroupsController extends Controller
{

    public function index()
    {
        $groups = Group::getUserGroups()->get(['id', 'name']);
        return response()->json($groups, 200);
    }

    public function show(int $id)
    {
        try {
            $contacts = Contact::where('user_id', auth()->user()->id)->where('group_id',
                    $id)->orderBy('first_name')->with('group:id,name')->get();

            return response()->json($contacts, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $groups = (new Group)->store($request);

            return response()->json($groups, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    public function update(UpdateRequest $request, Group $group)
    {
        //
    }

    public function destroy(Request $request)
    {
        try {
            $group = Group::getUserGroups()
                ->find($request->id);
            $group->delete();

            $groups = Group::getUserGroups()
                ->get(['id', 'name']);

            return response()->json($groups, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    public function deleteGroupAtContacts(int $id, UpdateContactGroup $request)
    {
        try {
            Contact::where('user_id', auth()->user()->id)
                ->where('group_id', $id)
                ->whereIn('id', $request->contacts)
                ->update(['group_id' => null]);

            //сделать норм
            $select = [
                'id', 'avatar', 'favorites', 'first_name', 'middle_name', 'last_name', 'email', 'number', 'avatar', 'group_id'
            ];

            $contacts = Contact::select($select)
                ->where('user_id', auth()->user()->id)
                ->orderBy('first_name')
                ->with('group:id,name')
                ->get();

            return response()->json($contacts, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }

    public function addGroupAtContacts(int $id, UpdateContactGroup $request)
    {
        try {
            Contact::where('user_id', auth()->user()->id)
                ->whereIn('id', $request->contacts)
                ->update(['group_id' => $id]);
            //сделать норм
            $select = [
                'id', 'avatar', 'favorites', 'first_name', 'middle_name', 'last_name', 'email', 'number', 'avatar', 'group_id'
            ];

            $contacts = Contact::select($select)
                ->where('user_id', auth()->user()->id)
                ->orderBy('first_name')
                ->with('group:id,name')
                ->get();

            return response()->json($contacts, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }
}
