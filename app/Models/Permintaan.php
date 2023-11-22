<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    //tambahkan kode untuk mapping ke tabel berita
    protected $table = 'tbl_permintaan';
    //mapping ke kolom fieldnya
    protected $fillable = ['tgl_permintaan','keterangan_permintaan','id_users'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'id_users');
    }
}
