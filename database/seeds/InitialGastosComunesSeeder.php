<?php

use Illuminate\Database\Seeder;

class InitialMaestroGastosComunesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Maestros Gasto Comun
        DB::table('mgastocomun')->insert([
          'descripcion' =>  'Remuneraciones Brutas',
          'tipoGasto'  => 1,
       ]);

        DB::table('mgastocomun')->insert([
          'descripcion' =>  'Aporte patronal, seguros cesantia',
          'tipoGasto'  => 1,
       ]);

        DB::table('mgastocomun')->insert([
          'descripcion' =>  'Honorarios Administrador',
          'tipoGasto'  => 1,
       ]);

        DB::table('mgastocomun')->insert([
          'descripcion' =>  'Finiquito',
          'tipoGasto'  => 1,
       ]);

        DB::table('mgastocomun')->insert([
          'descripcion' =>  'Aguinaldos (provisión)',
          'tipoGasto'  => 1,
       ]);

        DB::table('mgastocomun')->insert([
          'descripcion' =>  'Reemplazo vacaciones',
          'tipoGasto'  => 1,
       ]);

        DB::table('mgastocomun')->insert([
          'descripcion' =>  'Bono especial personal',
          'tipoGasto'  => 1,
       ]);

        // Cabeceras Gasto Comun
        DB::table('cgastocomun')->insert([
          'condominio_id' => 1,
          'mes'  => '8',
          'año' => '2017'
        ]);

        // Detalles Gasto Comun
        DB::table('dgastocomun')->insert([
          'cgastocomun_id' => 1,
          'codigo_id'  => 1,
          'valor' => 120000
        ]);

		DB::table('dgastocomun')->insert([
          'cgastocomun_id' => 1,
          'codigo_id'  => 2,
          'valor' => 20000,
          'tipodocumento' => 1,
          'numerodocumento' => '330'
        ]);   

		DB::table('dgastocomun')->insert([
          'cgastocomun_id' => 1,
          'codigo_id'  => 3,
          'valor' => 500000
        ]);
}
