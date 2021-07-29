<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategori = Kategori::latest()->get();
        return view('adminpage.kategori.index', compact('kategori'));
    }
    public function create()
    {
        return view('adminpage.kategori.add');
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
