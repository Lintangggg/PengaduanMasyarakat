<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Masyarakat extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = "masyarakat";

    public $timestamps = false;
    protected $guarded = ['id'];

}
