<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    //tambahkan kode untuk mapping ke tabel berita
    protected $table = 'tbl_obat_keluar';
    //mapping ke kolom fieldnya
    protected $fillable = ['tgl_keluar','keterangan_keluar','id_users'];

    public function user()
    {
        return $this->belongsTo(User::class,'id_users');
    }

    public function pemakaian()
    {
        return $this->hasOne(Pemakaian::class);
    }

}
