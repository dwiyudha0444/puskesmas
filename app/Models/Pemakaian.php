<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    //tambahkan kode untuk mapping ke tabel berita
    protected $table = 'tbl_pemakaian';
    //mapping ke kolom fieldnya
    protected $fillable = ['id_obat','jumlah_keluar','id_obat_keluar'];

    public function obat()
    {
        return $this->belongsTo(Obat::class,'id_obat');
    }

    public function obat_keluar()
    {
        return $this->belongsTo(ObatKeluar::class,'id_obat_keluar');
    }

}
