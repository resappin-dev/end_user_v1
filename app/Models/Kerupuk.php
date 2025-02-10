<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kerupuk extends Model
{
    use HasFactory;
    protected $table = "master_barang_v1";
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'nama_barang',
        'stok',
        'harga_beli',
        'harga_jual',
        'gambar_barang',
        'created_at',
        'updated_at',
    ];

    public function getSlugAttribute()
    {
        return Str::slug($this->nama_barang);
    }
}

