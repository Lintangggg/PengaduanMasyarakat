<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasApiTokens, HasFactory;

    protected $guarded = ['id_tanggapan'];

    protected $table = 'Tanggapan';

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }
}
