<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPetugasPage(){
        return view("login-petugas");
    }

    public function ProsesLoginPetugas(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);

        $username = $request->username;
        $password = $request->password;

        $petugasModel = new Petugas();

        if ($petugasModel->checkCredentials($username, $password)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                Session::flash('error', 'This Account is not Petugas');
                return redirect("/");
            } elseif ($user->level == 'sosial') {
                $data = Pengaduan::where('kategori', 'sosial')->latest()->get();
                return view('petugas.dashboard', compact('data'))->with('success', 'Login Berhasil');
            } elseif ($user->level == 'infrastruktur') {
                $data = Pengaduan::where('kategori', 'infrastruktur')->latest()->get();
                return view('petugas.dashboard', compact('data'))->with('success', 'Login Berhasil');
            }
        } else {
            Session::flash('error', 'Username or password is incorrect');
            return redirect("/");
        }
    }

    public function loginAdminPage(){
        return view("login");
    }

    public function ProsesLoginAdmin(Request $request)
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
                Session::flash('error', 'This Account is not Admin');
                return redirect("/login");
                // return redirect('/dashboard-petugas')->with('success', 'Login Berhasil');
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
