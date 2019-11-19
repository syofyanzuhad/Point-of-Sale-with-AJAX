<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPengeluaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pengeluaran', function(Blueprint $table){
         $table->increments('id_pengeluaran');       
         $table->text('jenis_pengeluaran');       
         $table->bigInteger('nominal')->unsigned();          
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
        Schema::drop('pengeluaran');
    }
}
