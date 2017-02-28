<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);

        if (Auth::id() == $id)
            $owner = true;
        else
            $owner = false;

        return view('user.profile', ['user' => $user, 'owner' => $owner]);
    }
}
