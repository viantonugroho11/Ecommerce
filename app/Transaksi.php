<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable = [
        'id_user','jasa_kirim','ongkir','jumlah_produk','total_harga','tanggal'
        ,'alamat','status','noresi'
    ];
}
