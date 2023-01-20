<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function all(){
        
        $users = (new User)->users();

        $searchName = request('search_name');
        $searchEmail = request('search_email');
        $searchTypeUser = request('search_type_user');

        if ($searchName) {
            $users = User::where('name', 'like', '%'.$searchName.'%')->simplePaginate(20);
        }

        if ($searchEmail) {
            $users = User::where('email', 'like', '%'.$searchEmail.'%')->simplePaginate(20);
        }

        if ($searchTypeUser) {
            $users = User::where('type_user', 'like', '%'.$searchTypeUser.'%')->simplePaginate(20);
        }

        if ($searchName && $searchEmail) {
            $users = User::where('name', 'like', '%'.$searchName.'%')
                        ->where('email', 'like', '%'.$searchEmail.'%')
                        ->simplePaginate(20);
        }

        if ($searchTypeUser && $searchEmail) {
            $users = User::where('type_user', 'like', '%'.$searchTypeUser.'%')
                        ->where('email', 'like', '%'.$searchEmail.'%')
                        ->simplePaginate(20);
        }

        if ($searchName && $searchTypeUser) {
            $users = User::where('name', 'like', '%'.$searchName.'%')
                        ->where('type_user', 'like', '%'.$searchTypeUser.'%')
                        ->simplePaginate(20);
        }

        if ($searchName && $searchEmail && $searchTypeUser) {
            $users = User::where('name', 'like', '%'.$searchName.'%')
                        ->where('email', 'like', '%'.$searchEmail.'%')
                        ->where('type_user', 'like', '%'.$searchTypeUser.'%')
                        ->simplePaginate(20);
        }

        return view('employee.all', compact('users'));
    }
    public function create(){
        
        return view('employee.create');
    }
    public function update(Request $request, $id){

        $date = date("Y-m-d H:i:s");

        DB::table('users')
                ->where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'type_user' => $request->type_user,
                        'password' => Hash::make($request->password),
                        'updated_at' => $date
                    ]);

        return back()->withInput()->with('success', 'Funcionário editado com sucesso!');
    }
    public function delete($id) {

        DB::table('users')
            ->where('id', $id)
            ->delete();

        return back()->withInput()->with('success', 'Funcionário deletado com sucesso!');
    }

    public function edit ($id){

        $user = (new User)->user($id);

        return view('employee.edit', compact('user'));
    }
}
