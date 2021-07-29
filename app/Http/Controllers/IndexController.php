<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Merek;
use App\Product;
class IndexController extends Controller
{
    //
    public function index()
    {
        $kategori = Kategori::latest()->get(); //tampilin kategori
        $merek = Merek::latest()->get(); //Tmpilin Merek
        $product = Product::latest()->get(); //Tampilin Product
        $product1 = Product::latest()->limit(6)->get(); //Tampilin Product
        $rekomend = Product::latest()->where('rekom','Y')->get();//Rekomendasi Product
        $slide=Product::latest()->where('slide','Y')->limit(9)->get();//slide Product
        return view('indexpage.home', compact(['kategori','merek','product','product1','rekomend','slide']));
    }
    public function create()
    {
        return view('adminpage.kategori.add');
    }

    public function edit(Request $request, Kategori $kategori)
    {
        return view('adminpage.kategori.edit', compact('kategori'));
    }

    public function ProductDetail(Request $request, Kategori $kategori)
    {
        $kategori = Kategori::latest()->get(); //tampilin kategori
        $merek = Merek::latest()->get(); //Tmpilin Merek
        $product = Product::latest()->get(); //Tampilin Product
        $product1 = Product::latest()->limit(6)->get(); //Tampilin Product
        $rekomend = Product::latest()->where('rekom','Y')->get();//Rekomendasi Product
        return view('indexpage.home', compact(['kategori','merek','product','product1','rekomend','slide']));
    }
    public function ProductKategori($product)
    {
        $kategori = Kategori::latest()->get(); //tampilin kategori
        $merek = Merek::latest()->get(); //Tmpilin Merek
        $product1 = Product::latest()->where('kategori',$product)->paginate(12); //Tampilin Product
        return view('indexpage.product', compact(['kategori','merek','product1','product']));
    }
    public function ProductMerek($product)
    {
        $kategori = Kategori::latest()->get(); //tampilin kategori
        $merek = Merek::latest()->get(); //Tmpilin Merek
        $product1 = Product::latest()->where('merek',$product)->paginate(12); //Tampilin Product
        return view('indexpage.product', compact(['kategori','merek','product1','product']));
    }
}
