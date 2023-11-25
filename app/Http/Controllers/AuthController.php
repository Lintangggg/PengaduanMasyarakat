<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage(){
        return view("login");
    }

    public function ProsesLogin(Request $request)
    {
        $request->validate([
            'username' =>'required',
            'password' =>'required'
        ], [
            'username.required' =>'Username Harus Diisi',
            'password.required' =>'Password Harus Diisi'
        ]);

        $username = $request->username;
        $password = $request->password;

        $petugasModel = new Petugas();

        if ($petugasModel->checkCredentials($username, $password)) {
            $user = Auth::user();

            if ($user->level == 'admin') {
                return redirect('/dashboard-admin')->with('success', 'Login Berhasil');
            } elseif ($user->level == 'petugas') {
                return redirect('/dashboard-petugas')->with('success', 'Login Berhasil');
            }
        } else {
            Session::flash('error', 'Username or password is incorrect');
            return redirect("/login");
        }
    }
    public function registerPage() {
        return view("register");
    }

    public function ProsesRegister(Request $request){
        $data = $request->all();
        $hashedPassword = Hash::make($data["Password"]);

        Petugas::create([
            'nama_petugas' => $data["Nama_Petugas"],
            'username' => $data["Username"],
            'password' => $hashedPassword,
            'telp' => $data["Telp"],
            'level' => "admin",
        ]);

        return redirect('/login')->with("Success", "Account Registered");
    }
}
