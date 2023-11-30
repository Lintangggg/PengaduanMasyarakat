<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Petugas extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    public $primaryId = "id_petugas";

    public $timestamps = false;

    protected $guarded = ['id_petugas'];

    public function checkCredentials($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return $user;
        }

        return null;
    }

}
