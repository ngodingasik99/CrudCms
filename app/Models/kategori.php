<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = ['namakategori', 'fotokategori'];

    public function Produks()
    {
        return $this->hasMany(Produk::class);
    }
}
