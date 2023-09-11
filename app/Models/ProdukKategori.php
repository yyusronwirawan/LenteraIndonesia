<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProdukKategori extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'produk_kategoris';
    const tableName = 'produk_kategoris';
    const image_folder = '/assets/produk/kategori';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id', 'id');
    }
}
