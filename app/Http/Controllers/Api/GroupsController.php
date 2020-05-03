<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Groups\StoreRequest;
use App\Http\Requests\Groups\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{

    public function index()
    {
        //
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
