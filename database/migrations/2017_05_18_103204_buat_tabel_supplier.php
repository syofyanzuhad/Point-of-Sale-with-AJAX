<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelSupplier extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('supplier', function(Blueprint $table){
         $table->increments('id_supplier');             
         $table->string('nama', 100);         
         $table->text('alamat');         
         $table->string('telpon', 20);  
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
        Schema::drop('supplier');
   }
}
