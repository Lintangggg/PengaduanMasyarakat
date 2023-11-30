<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Pengaduan extends Model implements Authenticatable
{
    use HasApiTokens ,HasFactory, AuthenticatableTrait;
    public $primaryId = "id_pengaduan";
    protected $primaryKey = 'id_pengaduan';


    public $table = "pengaduan";

    protected $guarded = ['id_pengaduan'];

    // public function tanggapan()
    // {
    //     return $this->hasOne(Tanggapan::class, 'id_pengaduan', 'id_tanggapan');
    // }
}
