<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{

    public function updateStatus(Request $request, $id){
        $pengaduan = Pengaduan::find($id);

        $pengaduan->update(['status' => "1"]);

        return redirect('/dashboard')->with('success', 'Status updated successfully.');
    }

    public function addPetugas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:petugas,username|string',
            'password' => 'required|string',
            'telp' => 'required|string',
            'role' => 'required|in:admin,sosial,infrastruktur',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $hashedPassword = Hash::make($request->input('password'));

        $petugas = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedPassword,
            'telp' => $request->input('telp'),
            'role' => $request->input('role'),
        ]);

        return response()->json(['message' => 'Petugas added successfully', 'data' => $petugas], 201);
    }

        public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function UpdatePetugas($id){
        $petugas = User::find($id);
        return view('petugas-form', compact('petugas'));
    }

    public function ProsesUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telp' => 'required|string|max:15',
            'role' => 'required',
        ]);

        $petugas = User::find($id);

        $petugas->name = $request->input('name');
        $petugas->email = $request->input('email');
        $petugas->telp = $request->input('telp');
        $petugas->role = $request->input('role');

        if ($request->has('plain_password')) {
            $petugas->password = $request->input('password');
        } elseif ($request->filled('password')) {
            $petugas->password = Hash::make($request->input('password'));
        }

        $petugas->save();

        return redirect()->route('petugas')->with('success', 'Petugas data updated successfully!');
    }

    public function DeletePetugas($id){
        $user = User::find($id);
        $user->delete();
        return back()->with('success','Data berhasil dihapus!');
    }
}
