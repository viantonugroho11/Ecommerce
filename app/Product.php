<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'id_produk','nama','kategori','merek','gambar','deskripsi','berat','harga','size','slide','rekom'
    ];
}
