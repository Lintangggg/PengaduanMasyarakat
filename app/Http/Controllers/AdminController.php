<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function DashboardAdmin(){
        return view('admin.dashboard');
    }
}
