<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukFavorit extends Model
{
    //
    protected $fillable = [
        'id_user','id_produk'
    ];
}
