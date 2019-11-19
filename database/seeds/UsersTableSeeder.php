<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            // [
            //  'name' => 'Admin', 
            //  'email' => 'admin@gmail.com',
            //  'password' => bcrypt('admin'),
            //  'foto' => 'user.png',
            //  'level' => 1
            // ],
            [
             'name' => 'Kasir 1', 
             'email' => 'kasir@gmail.com',
             'password' => bcrypt('kasir'),
             'foto' => 'user.png',
             'level' => 2
            ]
          ));
    
    }
}
