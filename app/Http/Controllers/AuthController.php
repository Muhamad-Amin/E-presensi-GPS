<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function processLogin(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'nik' => $request->nik,
            'password' => $request->password,
        ];

        // Proses Login dengan Guard 'employee'
        // PENTING: Kita pakai guard('employee') karena ini untuk karyawan, bukan user biasa
        if (Auth::guard('employee')->attempt($credentials)) {

            // Jika Berhasil: Redirect ke Dashboard
            return redirect()->route('employee.dashboard.index');
        } else {

            // Jika Gagal: Kembali ke halaman login dengan pesan error
            return redirect()->back()->with(['warning' => 'NIK / Password Salah']);
        }
    }

    public function processLogout()
    {
        if (Auth::guard('employee')->check()) {
            Auth::guard('employee')->logout();
            return redirect()->route('employee.login')->with('success', 'Logout Success');
        }
    }
}
