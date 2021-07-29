<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use App\Product;
use App\Kategori;
use App\Merek;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::latest()->get();
        //LOAD VIEW INDEX.BLADE.PHP YANG BERADA DIDALAM FOLDER PRODUCTS
        // DAN PASSING VARIABLE $PRODUCT KE VIEW AGAR DAPAT DIGUNAKAN
        return view('adminpage.product.index', compact('product'));
    }

    public function detail(Request $request, Product $product)
    {
        return view('adminpage.product.detail', compact('product'));
    }

    public function create()
    {
        //QUERY UNTUK MENGAMBIL SEMUA DATA CATEGORY
        $kategori = Kategori::orderBy('nama', 'DESC')->get();
        $merek = Merek::orderBy('nama', 'DESC')->get();
        //LOAD VIEW create.blade.php` YANG BERADA DIDALAM FOLDER PRODUCTS
        //DAN PASSING DATA CATEGORY
        return view('adminpage.product.add', compact(['kategori','merek']));
    }
    
    public function store(Request $request)
    {
        //VALIDASI REQUESTNYA
        // $this->validate($request, [
        //     'nama' => 'required|string|max:100',
        //     'kategori' => 'required',
        //     'merek' => 'required',
        //     'deskripsi' => 'required',
        //     'harga' => 'required|integer',
        //     'kategori' => 'required',
        //     'slide' => 'required',
        //     'rekomend' => 'required',
        //     'berat' => 'required|integer',
        //     'gambar' => 'required|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
        // ]);
    
        //JIKA FILENYA ADA
        $file = $request->file('Gambar');
        $filepath = $request->file('Gambar')->getClientOriginalName();

		$nama_file = time()."_".$filepath;

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'photoproduct';
        $file->move($tujuan_upload,$nama_file);
        // Auto Number
        $idproduct=IdGenerator::generate(['table'=>'Products',
        'field'=>'id_produk','length'=>10,'prefix'=>'PRD']);
        if($request->input('slide')==null){
            $slide='N';
        }else{
            $slide='Y';
        }
        if($request->input('rekomend')==null){
            $rekom='N';
        }else{
            $rekom='Y';
        }
        // $idProduct = Product::selectRaw('LPAD(CONVERT(COUNT("id_product") + 2, char(8)) , 8,"0") as idProduct')->first();
            $product = Product::create([
                'id_produk' => $idproduct,
                'nama' => $request->input('nama'),
                'kategori' => $request->input('kategori'),
                'merek' => $request->input('merek'),
                'deskripsi' => $request->input('deskripsi'),
                'gambar' => $nama_file, //PASTIKAN MENGGUNAKAN VARIABLE FILENAM YANG HANYA BERISI NAMA FILE SAJA (STRING)
                'berat' => $request->input('berat'),
                'harga' => $request->input('harga'),
                'size' => 'test',
                'slide' => $slide,
                'rekom' => $rekom
            ]);
            //JIKA SUDAH MAKA REDIRECT KE LIST PRODUK
            return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
    }
    public function destroy($id)
    {
        $product = Product::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID
        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        File::delete(storage_path('app/public/products/' . $product->gambar));
        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $product->delete();
        //DAN REDIRECT KE HALAMAN LIST PRODUK
        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }
    
    public function edit(Request $request, Product $product)
    {
        $kategori = Kategori::orderBy('nama', 'DESC')->get();
        $merek = Merek::orderBy('nama', 'DESC')->get();
        return view('adminpage.product.edit', compact(['product','kategori','merek']));
    }

    public function update(Request $request, Kategori $kategori)
    {
        // $product = Product::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID
        // //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        // File::delete(storage_path('app/public/products/' . $product->image));
        // //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        // $product->delete();
        
            //VALIDASI REQUESTNYA
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'description' => 'required',
                'category_id' => 'required|exists:categories,id', //CATEGORY_ID KITA CEK HARUS ADA DI TABLE CATEGORIES DENGAN FIELD ID
                'price' => 'required|integer',
                'weight' => 'required|integer',
                'image' => 'required|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
            ]);
        
            //JIKA FILENYA ADA
                //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
                $file = $request->file('Gambar');
                $filepath = $request->file('Gambar')->getClientOriginalName();

                $nama_file = time()."_".$filepath;

                        // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'photoproduct';
                $file->move($tujuan_upload,$nama_file);
                if($request->input('slide')==null){
                    $slide='N';
                }else{
                    $slide='Y';
                }
                if($request->input('rekomend')==null){
                    $rekom='N';
                }else{
                    $rekom='Y';
                }
                //SETELAH FILE TERSEBUT DISIMPAN, KITA SIMPAN INFORMASI PRODUKNYA KEDALAM DATABASE
                $product = Product::whereId($kategori->id)->update([
                    'nama' => $request->input('nama'),
                    'kategori' => $request->input('kategori'),
                    'merek' => $request->input('merek'),
                    'deskripsi' => $request->input('deskripsi'),
                    'gambar' => $nama_file, //PASTIKAN MENGGUNAKAN VARIABLE FILENAM YANG HANYA BERISI NAMA FILE SAJA (STRING)
                    'berat' => $request->input('berat'),
                    'harga' => $request->input('harga'),
                    'size' => 'test',
                    'slide' => $slide,
                    'rekom' => $rekom
                ]);
                //JIKA SUDAH MAKA REDIRECT KE LIST PRODUK
                return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);       
    }
}
