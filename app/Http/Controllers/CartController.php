<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\kategori;
use App\Product;
use App\User;
use App\Merek;
use Auth;
class CartController extends Controller
{
    //
    public function get_province(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 8013798f891b62d5f61f515e99184d5e"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        //ini kita decode data nya terlebih dahulu
        $response=json_decode($response,true);
        //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
        $data_pengirim = $response['rajaongkir']['results'];
        return $data_pengirim;
        }
    }
    public function get_ongkir($origin, $destination, $weight, $courier){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
        CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: 8013798f891b62d5f61f515e99184d5e"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        $response=json_decode($response,true);
        $data_ongkir = $response['rajaongkir']['results'];
        return json_encode($data_ongkir);
        }
    }
    public function get_city($id){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 8013798f891b62d5f61f515e99184d5e"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        $response=json_decode($response,true);
        $data_kota = $response['rajaongkir']['results'];
        return json_encode($data_kota);
        }
    }

    public function index()
    {
        $idUser=Auth::user()->id;
        $product = Product::latest()->get(); //Tampilin Product
        $kategori = Kategori::latest()->get(); //tampilin kategori
        $user=User::latest()->get();
        $merek = Merek::latest()->get(); //Tmpilin Merek
        $cart = Cart::join('products', 'products.id_produk', 'carts.id_produk')
        ->join('users','users.id','carts.id_user')
        ->select('products.*','users.name','users.email','users.alamat',
        'users.kodepos','users.kota','users.provinsi',
        'carts.jumlah','carts.id_user')->
        latest()->where('carts.id_user',$idUser)->get();//Tampilin Product
        return view('indexpage.cart', compact(['cart','kategori']));
    }

    public function store(Request $request)
    {
        $idUser=Auth::user()->id;
        $post = Cart::create([
            'id_produk'     => $request->input('idProduk'),
            'id_user'     => $idUser,
            'jumlah' => $request->input('qty')
        ]);
        return redirect(route('cart.index'));
    }
    public function edit(Request $request, Kategori $kategori)
    {
        return view('adminpage.kategori.edit', compact('kategori'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'qty' => 'required',
        ]);

        $check = Cart::where(['id_produk' => $request->id, 'id_user' => Auth::user()->id])->first();

        if ($check) {
            $check->jumlah = $request->qty;
            $check->save();
        }
    }
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();


        return redirect(route('cart.index'));
    }
}
