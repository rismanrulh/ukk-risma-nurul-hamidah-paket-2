<?php

namespace App\Http\Controllers;

use App\Models\masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginMasyarakat()
    {
        return view('auth.login');
    }

    public function loginMasyarakat(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::guard('masyarakat')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('masyarakat.dashboard');
        }
        return back()->with('error', 'Username atau Password salah.');
    }

    public function showLoginPetugas()
    {
        return view('auth.login');
    }

    public function loginPetugas(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('petugas')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('petugas.dashboard');
        }
        return back()->with('error', 'Username atau Password tidak sesuai.');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();
        Auth::guard('petugas')->logout();

        return redirect()->intended('login')->with('success', 'Logout berhasil.');
    }

    public function showRegisterMasyarakat()
    {
        return view('auth.register');
    }

    public function registerMasyarakat(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);
        $validateData['password'] = bcrypt($request->password);

        masyarakat::create($validateData);

        return redirect()->route('login')->with('success', 'Registrasi berhasil.');
    }
}
