<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function UpdateMasyarakat($id){
        $masyarakat = Masyarakat::find($id);
        return view('masyarakat-form', compact('masyarakat'));
    }

    public function ProsesUpdate(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'telp' => 'required|string',
        ]);

        $masyarakat = Masyarakat::find($id);

        $masyarakat->nik = $request->input('nik');
        $masyarakat->nama = $request->input('nama');
        $masyarakat->username = $request->input('username');
        $masyarakat->telp = $request->input('telp');

        if ($request->has('plain_password')) {
            $masyarakat->password = $request->input('password');
        } elseif ($request->filled('password')) {
            $masyarakat->password = Hash::make($request->input('password'));
        }

        $masyarakat->save();

        return redirect()->route('masyarakat')->with('success', 'Petugas data updated successfully!');
    }

    public function DeleteMasyarakat($id){
        $masyarakat = Masyarakat::find($id);
        $masyarakat->delete();
        return back()->with('success','Data berhasil dihapus!');
    }
}
