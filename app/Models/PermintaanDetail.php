<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanDetail extends Model
{
    //tambahkan kode untuk mapping ke tabel berita
    protected $table = 'tbl_permintaan_detail';
    //mapping ke kolom fieldnya
    protected $fillable = ['id_obat','persediaan','status','id_permintaan'];

    public function obat()
    {
        return $this->belongsTo(Obat::class,'id_obat');
    }

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class,'id_permintaan');
    }
}
