<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function DashboardPetugas(){
        $data = Pengaduan::latest()->get();

        return view('petugas.dashboard', ['data' => $data]);
    }
}
