<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 100; $i++) { 
            DB::table('kategori')->insert(array(
                [
                    'nama_kategori' => 'Barang '.$i
                ]
            ));
        };
    }
}
