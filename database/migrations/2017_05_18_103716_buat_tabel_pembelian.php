<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPembelian extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('pembelian', function(Blueprint $table){
         $table->increments('id_pembelian');        
         $table->integer('id_supplier')->unsigned();            
         $table->integer('total_item')->unsigned();         
         $table->bigInteger('total_harga')->unsigned();           
         $table->integer('diskon')->unsigned();       
         $table->bigInteger('bayar')->unsigned();      
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
      Schema::drop('pembelian');
   }
}
