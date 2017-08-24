<?php

use Illuminate\Database\Seeder;

class InitialUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
       		'name'	=>	'Diego Espinoza',
       		'email'	=>	'diego.espinoza.rios@gmail.com',
       		'password'	=> bcrypt('admin'),
       		'verified'	=>	1,
       		'role'	=> 1
       ]);
      
       DB::table('users')->insert([
          'name'  =>  'Humberto Espinoza',
          'email' =>  'hespinoza@gmail.com',
          'password'  => bcrypt('admin'),
          'verified'  =>  1,
          'role'  => 1
       ]);
       
       DB::table('users')->insert([
          'name'  =>  'Carlos Cifuentes',
          'email' =>  'vivacif@gmail.com',
          'password'  => bcrypt('admin'),
          'verified'  =>  1,
          'role'  => 1
       ]);
       
       DB::table('users')->insert([
          'name'  =>  'Propietario 1',
          'email' =>  'email@gmail.com',
          'password'  => bcrypt('admin'),
          'verified'  =>  1,
          'role'  => 2
       ]);       
    }
}
