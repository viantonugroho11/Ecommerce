<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\kategori;
use App\Product;
use App\User;
use App\Merek;
use app\Transaksi;
use app\TransaksiDetail;
use Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();
        return view('indexpage.checkout');
    }
    public function store(Request $request)
    { 
        $idUser=Auth::user()->id;
        $post = Transaksi::create([
            'nama'     => $request->input('nama'),
            'id_user'=> $idUser,
            'jasa_kirim'=> $request->input('jasa'),
            'ongkir'=> $request->input('ongkir'),
            'jumlah_produk'=> $request->input('jumlah'),
            'total_harga'=> $request->input('total'),
            'tanggal'=> $request->input('ongkir'),
            'alamat'=> $request->input('alamat'),
            'status'=> 'Pesan',
        ]);
        return redirect(route('CheckOut.index'));
    }
    
}
