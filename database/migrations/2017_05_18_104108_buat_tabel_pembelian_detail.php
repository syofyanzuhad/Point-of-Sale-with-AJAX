<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPembelianDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_detail', function(Blueprint $table){
            $table->increments('id_pembelian_detail');         
            $table->integer('id_pembelian')->unsigned();         
            $table->bigInteger('kode_produk')->unsigned();           
            $table->bigInteger('harga_beli')->unsigned();           
            $table->integer('jumlah')->unsigned();             
            $table->bigInteger('sub_total')->unsigned();      
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
        Schema::drop('pembelian_detail');
    }
}
