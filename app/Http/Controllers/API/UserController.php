<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with(['posts', 'comments'])->get();
        return response()->json($users);
    }

    public function detail($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
}