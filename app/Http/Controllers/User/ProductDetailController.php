<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategori;
use App\Merek;
use App\Product;
class ProductDetailController extends Controller
{
    //
    public function index($product)
    {
        $pddetail = Product::latest()->where('id_produk',$product)->get(); //Tampilin Product
        $kategori = Kategori::latest()->get(); //tampilin kategori
        $merek = Merek::latest()->get(); //Tmpilin Merek
        $rekomend = Product::latest()->where('rekom','Y')->get();//Rekomendasi Product
        $product1 = Product::join('mereks', 'mereks.id', 'products.merek')
        ->select('products.*','mereks.nama')->
        latest()->where('products.id_produk',$product)->get(); //Tampilin Product
        return view('indexpage.productdetail', compact(['kategori','merek','product1','product','rekomend','pddetail']));
    }
    public function login()
    {
        $kategori = Kategori::latest()->get(); //tampilin kategori
        return view('indexpage.login', compact(['kategori']));
    }
}
