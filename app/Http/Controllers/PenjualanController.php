<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\TransaksiDetail;
use App\Product;
use App\User;
class PenjualanController extends Controller
{
    //
    public function index()
    {
        $data['products'] = Product::all();
        $data['transaksis'] = Transaksi::all();
        $data['users']=User::all();
        $data['detail'] = TransaksiDetail::join('products', 'products.id_produk', 'transaksi_details.id_produk')
        ->join('transaksis','transaksis.id','transaksi_details.id_transaksi')
            ->select('products.*', 'transaksi_details.*','transaksis.*')->get();
        return view('adminpage.penjualan.index', $data);
    }

    public function store(Request $request)
    {
        $post = Kategori::create([
            'nama'     => $request->input('nama')
        ]);
        return redirect(route('kategori.index'));
    }
    public function edit(Request $request, Kategori $kategori)
    {
        return view('adminpage.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori = Kategori::whereId($kategori->id)->update([
            'nama'     => $request->input('nama')
        ]);


        return redirect(route('kategori.index'));
    }
    public function destroy($id)
    {
        $kategori = kategori::find($id);
        $kategori->delete();


        return redirect(route('kategori.index'));
    }
}
