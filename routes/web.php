<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('indexpage.home');
});
//User
Route::resource('/', 'IndexController');
Route::get('/product/kategori/{product}/', 'IndexController@ProductKategori')->name('index.kategori');
Route::get('/product/Merek/{product}/', 'IndexController@ProductMerek')->name('index.merek');
Route::get('/admin/product/{product}/detail/', 'ProductController@detail')->name('product.detail');
Route::get('/product/{product}', 'User\ProductDetailController@index')->name('productdetail.index');
Route::get('/user', 'User\ProductDetailController@login')->name('user.login');
route::get('/provinsi','CartController@get_province');
Route::get('/kota/{id}','CartController@get_city');
Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}','CartController@get_ongkir');
Route::middleware(['auth:web'])->group(function(){
    Route::resource('/cart','CartController');
    Route::resource('/checkout','CheckOutController');
    Route::resource('/wishlist','WishlistController');
}); 

Auth::routes();
// Admin
Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin');
Route::get('admin/logout', 'Auth\AdminAuthController@postLogout')->name('admin.logout');

Route::middleware('auth:admin')->group(function(){
    // Tulis routemu di sini.
    Route::get('/admin/', function () {
        return view('adminpage.index.index');
    });
    Route::resource('/admin/kategori', 'KategoriController');
    Route::resource('/admin/merek', 'MerekController');
    Route::resource('/admin/product', 'ProductController');
    Route::get('/admin/product/{product}/detail/', 'ProductController@detail')->name('product.detail');
    Route::resource('/admin/transaksi', 'PenjualanController');
    Route::resource('/admin/transaksi', 'PenjualanController');
});
Route::get('/home', 'HomeController@index')->name('home');
