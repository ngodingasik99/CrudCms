<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class produk extends Model
{
    use HasFactory;
    
    protected $fillable = ['namaproduk', 'harga', 'deskripsi', 'fotoproduk', 'id_kategori'];

    static function hapus($data)
    {
       return DB::delete("DELETE FROM produks WHERE id='$data'");
    }

    public function Kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }
}
