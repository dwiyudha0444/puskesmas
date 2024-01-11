<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    //tambahkan kode untuk mapping ke tabel berita
    protected $table = 'tbl_obat';
    //mapping ke kolom fieldnya
    protected $fillable = ['id_kategori','nama_obat','kode_obat','satuan','stok_awal','sisa_stok','penerimaan','persediaan','pemakaian','permintaan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function pemakaian()
    {
        return $this->hasMany(Pemakaian::class);
    }
}
