<?php

use Illuminate\Database\Seeder;

class InitialEdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edificio')->insert([
          'nombre'  =>  'Edificio 1',
          'descripcion' =>  'Descripción del edificio',
          'condominio_id'  => '1',
       ]);

        DB::table('edificio')->insert([
          'nombre'  =>  'Edificio 2',
          'descripcion' =>  'Descripción del edificio dos',
          'condominio_id'  => '1',
       ]);
    }
}
