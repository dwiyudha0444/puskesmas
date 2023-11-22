<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    //tambahkan kode untuk mapping ke tabel berita
    protected $table = 'tbl_obat_masuk';
    //mapping ke kolom fieldnya
    protected $fillable = ['tgl_masuk','keterangan_masuk','id_users'];

    public function user()
    {
        return $this->belongsTo(User::class,'id_users');
    }
}
