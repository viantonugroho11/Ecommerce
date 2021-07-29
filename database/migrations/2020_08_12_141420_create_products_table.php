<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('id_produk');
            $table->string('nama');
            $table->string('kategori');
            $table->string('merek');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->decimal('berat');
            $table->decimal('harga');
            $table->string('size');
            $table->string('slide',1);
            $table->string('rekom',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
