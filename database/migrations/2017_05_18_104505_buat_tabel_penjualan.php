<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPenjualan extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('penjualan', function(Blueprint $table){
         $table->increments('id_penjualan');        
         $table->bigInteger('kode_member')->unsigned();            
         $table->integer('total_item')->unsigned();         
         $table->bigInteger('total_harga')->unsigned();           
         $table->integer('diskon')->unsigned();       
         $table->bigInteger('bayar')->unsigned();     
         $table->bigInteger('diterima')->unsigned();     
         $table->integer('id_user')->unsigned();     
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
      Schema::drop('penjualan');
   }
}
