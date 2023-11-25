<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Model
{
    use HasFactory;
    protected $table = "masyarakat";

    public $timestamps = false;
    protected $guarded = ['id'];

    // public function checkCredentials($username, $password)
    // {
    //     $user = $this->where('username', $username)->first();

    //     if ($user && Hash::check($password, $user->password)) {
    //         Auth::login($user);
    //         return true;
    //     }

    //     return false;
    // }
}
