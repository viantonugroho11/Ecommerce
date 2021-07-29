<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merek;
class MerekController extends Controller
{
    //
    public function index()
    {
        $merek = Merek::latest()->get();
        return view('adminpage.merek.index', compact('merek'));
    }
    public function create()
    {
        return view('adminpage.merek.add');
    }

    public function store(Request $request)
    {
        $post = Merek::create([
            'nama'     => $request->input('nama')
        ]);
        return redirect(route('merek.index'));
    }
    public function edit(Request $request, Merek $merek)
    {
        return view('adminpage.merek.edit', compact('merek'));
    }

    public function update(Request $request, Merek $merek)
    {
        $merek = Merek::whereId($merek->id)->update([
            'nama'     => $request->input('nama')
        ]);


        return redirect(route('merek.index'));
    }
    public function destroy($id)
    {
        $merek = Merek::find($id);
        $merek->delete();
        return redirect(route('merek.index'));
    }
}
