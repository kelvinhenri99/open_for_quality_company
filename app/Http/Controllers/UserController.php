<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function welcome() {

        $users = (new User)->users();

        return view('welcome', compact('users'));
    }
}
