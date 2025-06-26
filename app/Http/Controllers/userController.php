<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function index(){
        return view('profileUser', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('profile')->with('error', 'User tidak terdaftar');
        }

        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        if($user->save()) {
            return redirect()->route('profile')->with('success', 'Data berhasil di ganti');
        } else {
            return redirect()->route('profile')->with('error', 'Gagal mengganti data');
        }

    }
}
