<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('users',['users' => $users]);
    }

    public function store(Request $request){
        $newUsers = $request->except('_token');
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $newUsers = User::create($newUsers);

        return redirect()->route('users')->with('success', 'User '.$request->nama.' ditambahkan!');
    }

    public function update(Request $request){
        $oldUser = User::find($request->id);
        $updatedUser = $request->except('_token');
        $oldUser->update($updatedUser);

        return redirect()->route('users')->with('success', 'User '.$request->nama.' diperbarui!');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('users')->with('success', 'User '.$user->nama.' dihapus!');
    }
}
