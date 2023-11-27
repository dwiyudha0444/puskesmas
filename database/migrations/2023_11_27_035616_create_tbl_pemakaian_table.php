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
        Schema::create('tbl_pemakaian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_obat');
            $table->integer('jumlah_keluar');
            $table->bigInteger('id_obat_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pemakaian');
    }
};
