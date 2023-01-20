<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function insertUser(Request $request)
    {
        $data = $request->all();

        $insert = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type_user' => $data['type_user'],
            'password' => Hash::make($data['password'])
        ]);

        return back()->withInput()->with('success', 'Funcionário criado com sucesso!');
    }
}