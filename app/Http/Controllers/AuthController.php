<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }
    public function register(Request $request){
       $data = $request->validate([
        'username' => 'required|string',
        'email' => 'required|string',
        'password' => 'required|string'
       ]);
       $regUser = User::create($data);
       return redirect(route('auth.login'));
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Cari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek kecocokan password
        if ($user && $user->password === $request->password) {
            // Simpan sesi atau autentikasi pengguna
            Auth::login($user);

            return redirect()->intended(route('tasks.index'))->with('success', 'Login berhasil!');
        }

        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
