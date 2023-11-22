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
        Schema::create('tbl_obat_keluar', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_keluar');
            $table->string('keterangan_keluar');
            $table->string('id_users');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_obat_keluar');
    }
};
