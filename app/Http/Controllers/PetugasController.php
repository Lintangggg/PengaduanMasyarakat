<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function DashboardPetugas(){
        return view('petugas.dashboard');
    }
}
