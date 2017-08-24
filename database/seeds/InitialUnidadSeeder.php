<?php

use Illuminate\Database\Seeder;

class InitialUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad')->insert([
          'tipo'  => 1,
          'numero' => 101,
          'descripcion' =>  'Descripción del edificio',
          'edificio_id' => 1,
          'propietario_id' => 4,
        ]);

        DB::table('unidad')->insert([
          'tipo'  => 1,
          'numero' => 102,
          'descripcion' =>  'Este es el edificio dos de la comunidad número 1',
          'edificio_id' => 1,
          'propietario_id' => 4,
        ]);

        DB::table('unidad')->insert([
          'tipo'  => 2,
          'numero' => 02,
          'descripcion' =>  'Este es una bodega de la comunidad número 1',
          'edificio_id' => 1,
          'propietario_id' => 4,
        ]);

        DB::table('unidad')->insert([
          'tipo'  => 3,
          'numero' => 03,
          'descripcion' =>  'Este es un estacionamiento de la comunidad número 1',
          'edificio_id' => 1,
          'propietario_id' => 4,
        ]); 
    }
}
