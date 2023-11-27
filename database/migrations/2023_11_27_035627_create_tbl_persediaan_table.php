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
        Schema::create('tbl_persediaan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_obat');
            $table->date('expired');
            $table->integer('persediaan_awal');
            $table->integer('jumlah_masuk');
            $table->integer('persediaan');
            $table->bigInteger('id_obat_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_persediaan');
    }
};
