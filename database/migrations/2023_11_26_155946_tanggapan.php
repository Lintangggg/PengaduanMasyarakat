<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Tanggapan', function (Blueprint $table) {
            $table->id("id_tanggapan");
            $table->string("id_pengaduan");
            $table->date("tgl_tanggapan");
            $table->string("tanggapan");
            $table->string("id_petugas");
            $table->string('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
