<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $fillable = [
        'id_transaksi','id_produk','harga_satuan','jumlah','total'
    ];
}
