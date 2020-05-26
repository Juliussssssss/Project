<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getParam() {

        return response()->json(auth()->user());
    }
}
