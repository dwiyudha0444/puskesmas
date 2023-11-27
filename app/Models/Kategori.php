<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
        //tambahkan kode untuk mapping ke tabel berita
        protected $table = 'tbl_kategori';
        //mapping ke kolom fieldnya
        protected $fillable = ['nama_kategori'];

        public function Obat()
        {
            return $this->hasMany(Obat::class);
        }
}
