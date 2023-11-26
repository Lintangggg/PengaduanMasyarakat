<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    public function createPengaduan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            $response = ['status' => 400, 'message' => $validator->errors()->first()];
            return response()->json($response, 400);
        }

        try {
            $tgl_pengaduan = now()->toDateString();

            $fotoPath = $request->file('foto')->store('pengaduan_photos', 'public');

            $pengaduan = Pengaduan::create([
                'tgl_pengaduan' => $tgl_pengaduan,
                'nik' => $request->nik,
                'isi_laporan' => $request->isi_laporan,
                'foto' => $fotoPath,
                'kategori' => $request->kategori,
                'status' => "0",
            ]);

            $token = $pengaduan->createToken('personal-access-token')->plainTextToken;

            $response = [
                'status' => 201,
                'token' => $token,
                'pengaduan' => $pengaduan,
                'message' => 'Pengaduan created successfully'
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'Internal Server Error',
                'error' => $e->getMessage(),
            ];

            return response()->json($response, 500);
        }
    }

    public function getAllPengaduan()
    {
        try {
            $pengaduan = Pengaduan::all();

            $response = [
                'status' => 200,
                'data' => $pengaduan,
                'message' => 'Data pengaduan retrieved successfully',
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'Internal Server Error',
                'error' => $e->getMessage(),
            ];

            return response()->json($response, 500);
        }
    }
}
