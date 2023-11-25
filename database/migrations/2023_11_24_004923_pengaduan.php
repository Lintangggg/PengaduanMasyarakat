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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id("id_pengaduan");
            $table->date("tgl_pengaduan");
            $table->string("nik");
            $table->string("isi_laporan");
            $table->binary("foto");
            $table->enum("kategori", ['sosial', 'infrastruktur']);
            $table->enum("status", ['0', '1', '2']);
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
