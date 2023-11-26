<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MasyarakatController extends Controller
{

    public function getAllMasyarakat()
    {
        try {
            $users = User::all();

            $response = [
                'status' => 200,
                'data' => $users,
                'message' => 'Data users retrieved successfully',
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

    public function getMasyarakatById($id){
        try {
            $user = User::find($id);

            if (!$user) {
                $response = ['status' => 404, 'message' => 'User not found'];
                return response()->json($response, 404);
            }

            $response = [
                'status' => 200,
                'data' => $user,
                'message' => 'Data users retrieved successfully',
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

    public function createMasyarakat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required'
        ]);

        if ($validator->fails()) {
            $response = ['status' => 400, 'message' => $validator->errors()->first()];
            return response()->json($response, 400);
        }

        try {
            $user = User::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'telp' => $request->telp,
            ]);

            $token = $user->createToken('personal-access-token')->plainTextToken;

            $response = [
                'status' => 201,
                'token' => $token,
                'user' => $user,
                'message' => 'User created successfully'
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

    public function deleteMasyarakat($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                $response = ['status' => 404, 'message' => 'User not found'];
                return response()->json($response, 404);
            }

            $user->delete();

            $response = [
                'status' => 200,
                'message' => 'User deleted successfully',
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

    public function updateMasyarakat(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                $response = ['status' => 404, 'message' => 'User not found'];
                return response()->json($response, 404);
            }

            $validator = Validator::make($request->all(), [
                'nik' => 'required|numeric',
                'nama' => 'required',
                'username' => 'required',
                'password' => 'required',
                'telp' => 'required'
            ]);

            if ($validator->fails()) {
                $response = ['status' => 400, 'message' => $validator->errors()->first()];
                return response()->json($response, 400);
            }

            $user->nik = $request->nik;
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->telp = $request->telp;

            $user->save();

            $response = [
                'status' => 200,
                'user' => $user,
                'message' => 'User updated successfully'
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

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('personal-access-token')->plainTextToken;
            $masyarakat = User::find($user->id);
            $masyarakat->nik = $user->nik;
            $masyarakat->save();

            $response = [
                'status' => 200,
                'token' => $token,
                'user' => $user,
                'message' => 'Login berhasil'
            ];
            return response()->json($response, 200);
        } else if (!$user) {
            $response = ['status' => 404, 'message' => 'Akun tidak ditemukan dengan username ini'];
            return response()->json($response, 404);
        } else {
            $response = ['status' => 401, 'message' => 'Username atau password Anda salah! Silahkan coba lagi'];
            return response()->json($response, 401);
        }

        }

        public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'nik' => 'required|numeric',
                'nama' => 'required',
                'username' => 'required',
                'password' => 'required',
                'telp' => 'required'
            ]);

            if ($validator->fails()) {
                $response = ['status' => 400, 'message' => $validator->errors()->first()];
                return response()->json($response, 400);
            }

            if (User::where('nik', $request->nik)->exists()) {
                $response = ['status' => 409, 'message' => 'NIK already exists'];
                return response()->json($response, 409);
            }

            if (User::where('username', $request->username)->exists()) {
                $response = ['status' => 409, 'message' => 'Username already exists'];
                return response()->json($response, 409);
            }

            if (User::where('telp', $request->telp)->exists()) {
                $response = ['status' => 409, 'message' => 'Phone number already exists'];
                return response()->json($response, 409);
            }

            $user = User::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'telp' => $request->telp,
            ]);

            $token = $user->createToken('personal-access-token')->plainTextToken;

            $response = [
                'status' => 201,
                'token' => $token,
                'user' => $user,
                'message' => 'Registrasi berhasil'
            ];

            return response()->json($response, 201);
        }

        public function showPengaduanByNIK(Request $request)
        {
            try {
                $nik = $request->nik;

                $pengaduan = Pengaduan::where('nik', $nik)->get();

                if ($pengaduan->isEmpty()) {
                    $response = [
                        'status' => 404,
                        'message' => 'No pengaduan data found for the specified NIK',
                    ];

                    return response()->json($response, 404);
                }

                $response = [
                    'status' => 200,
                    'data' => $pengaduan,
                    'message' => 'Pengaduan data retrieved successfully',
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
