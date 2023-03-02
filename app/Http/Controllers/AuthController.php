<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        //Persyaratan login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            //cek admin
            if(Auth::user()->role_id == 1)
            {
                return redirect('dashboard');
            }

            //cek petugas
            if(Auth::user()->role_id == 2)
            {
                return redirect('petugas');
            }

            //cek buat user
            if(Auth::user()->role_id == 3)
            {
                return redirect('halaman');
            }
        }

        //kalo gagal login
        Session::flash('status', 'failed');
        Session::flash('message', 'Invalid Login');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function regis(Request $request)
    {
        //validated data masuk atau tidak
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nik' => 'required|unique:users',
            'no_telp' => 'required|max:13',
            'password' => 'required|min:5',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Registrasi Berhasil');
        return redirect('login');
    
    }
}
