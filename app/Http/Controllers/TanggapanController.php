<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function FormTanggapan($id){
        $tanggapan = Pengaduan::find($id);

        return view('tanggapan-form', compact('tanggapan'));
    }

    public function AddTanggapan(Request $request){
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        $idPetugas = Auth::id();
        $role = Auth::user()->role;

        $tanggapan = Tanggapan::create([
            'id_pengaduan' => $request->input('id_pengaduan'),
            'tgl_tanggapan' => now(),
            'tanggapan' => $request->input('tanggapan'),
            'id_petugas' => $idPetugas,
            'role' => $role,
        ]);

        $pengaduan = Pengaduan::find($request->input('id_pengaduan'));
        $pengaduan->status = "2";
        $pengaduan->save();

        return redirect()->route('dashboard')->with('success', 'Tanggapan added successfully!');
    }

    public function SelectByIdPengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->get();
        $allResponses = [];

        foreach ($pengaduan as $data) {
            $tanggapanCollection = Tanggapan::where('id_pengaduan', $data->id_pengaduan)->get();

            if (!$tanggapanCollection->isEmpty()) {
                $response = [];
                $tgpn = [];

                foreach ($tanggapanCollection as $tanggapan) {
                    $user = \App\Models\User::where('id', $tanggapan->id_petugas)->first();
                    $tgpn[] = [
                        'id_pengaduan'  => mb_convert_encoding($tanggapan->id_pengaduan, 'UTF-8'),
                        'tgl_tanggapan' => mb_convert_encoding($tanggapan->tgl_tanggapan, 'UTF-8'),
                        'isi_tanggapan'     => mb_convert_encoding($tanggapan->tanggapan, 'UTF-8'),
                        'id_petugas'    => mb_convert_encoding($user->name, 'UTF-8'),
                        'role'          => mb_convert_encoding($tanggapan->role, 'UTF-8'),
                    ];
                }
            }
            return $tgpn;
        }
        if (!empty($allResponses)) {
            return response()->json($allResponses, 200);
        } else {
            return response()->json(['message' => 'Data tanggapan tidak ditemukan'], 404);
        }
    }
}
