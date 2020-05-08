<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class GroupsController extends Controller
{

    public function index()
    {

        $groups = DB::table('groups')->where('user_id', auth()->user()->id)->get(['id', 'name']);
        //$groups = Group::select('id', 'name')->get();

        return response()->json($groups, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $data['name'] = json_decode($request->name);
            $data['user_id'] = auth()->user()->id;
            Group::create($data);

            return response()->json($data, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
        //        return response()->json('susses', 200);
    }

    public function update(UpdateRequest $request, Group $group)
    {
        //
    }

    public function destroy(Request $request)
    {
        try {
            $group = Group::where('user_id', auth()->user()->id)->find($request->id);
            $group->delete();
            return response()->json($group, 200);
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 417);
        }
    }
}
