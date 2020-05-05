<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{

    public function index()
    {
        //        $groups = DB::table('groups')
        //            ->where('user_id', auth()->user()->id)
        //            ->get(['id','name']);

        $groups = Group::select('id', 'name')->get();

        return response()->json($groups, 200);
    }

    public function store(StoreRequest $request)
    {
        //
    }

    public function update(UpdateRequest $request, Group $group)
    {
        //
    }

    public function destroy(Group $group)
    {
        //
    }
}
