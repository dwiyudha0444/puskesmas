<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    //tambahkan kode untuk mapping ke tabel berita
    protected $table = 'tbl_persediaan';
    //mapping ke kolom fieldnya
    protected $fillable = ['id_obat','expired','persediaan_awal','jumlah_masuk','persediaan','id_obat_masuk'];

    public function obat()
    {
        return $this->belongsTo(Obat::class,'id_obat');
    }

    public function obat_masuk()
    {
        return $this->belongsTo(ObatMasuk::class,'id_obat_masuk');
    }
}
