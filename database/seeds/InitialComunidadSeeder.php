<?php

use Illuminate\Database\Seeder;

class InitialComunidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condominio')->insert([
          'nombre'  =>  'Condominio 1',
          'razonsocial' =>  'Razón social del condominio',
          'descripcion'  => 'Direccion Desconocida #1234, Santiago',
          'admin_id' => 1,
       ]);

        DB::table('condominio')->insert([
          'nombre'  =>  'Comunidad 2',
          'razonsocial' =>  'Razón social de la comunidad 2',
          'descripcion'  => 'Los Dominicos #01640, Santiago',
          'admin_id' => 2,
       ]);
    }
}
