<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],[
            'nama.require' => 'Nama harus diisi',
            'email.require' => 'email tidak boleh kosong',
            'email.email' => 'format tidak email',
            'email.unique' => 'email tidak boleh sama',
            'password.require' => 'password tidak boleh kosong',
            'password.min' => 'minimal enam karakter'
        ]);

        try {
            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password'=>Hash::make($request->password),
                'role'=>'user'
            ]);

            return redirect()->route('login')->with('success', 'Berhasil Mendaftar! Silahkan login!');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Gagal Mendaftar!' . $e);
        }
    }

    public function login(Request $request){
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'email wajib diisi',
            'email.email' => 'masukan format email',
            'password.required' => 'password wajib diisi',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($infoLogin)){
            return redirect('dashboard')->with('success', 'selamat datang di spk salesman');
        }else{
            return redirect('login')->with('error', 'kombinasi email dan password salah')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
