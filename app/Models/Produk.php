<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'produks';
    const tableName = 'produks';
    const image_folder = '/assets/produk';

    public function kategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'kategori_id', 'id');
    }
}
