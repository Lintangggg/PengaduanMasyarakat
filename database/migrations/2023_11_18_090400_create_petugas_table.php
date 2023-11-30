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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id("id_petugas");
            $table->string("nama_petugas");
            $table->string("username");
            $table->string("password");
            $table->string("telp");
            // $table->string("kategori");
            $table->enum("level", ['admin', 'sosial', 'infrastruktur']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
