<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('razonsocial', 255);
            $table->string('descripcion', 150);
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('edificio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion', 150);
            $table->integer('condominio_id')->unsigned();
            $table->foreign('condominio_id')->references('id')->on('condominio');
            $table->timestamps();
        });

        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo'); // 1: Departamento, 2: Bodega, 3: Estacionamientos
            $table->string('numero', 10);
            $table->string('descripcion', 150);
            $table->integer('edificio_id')->unsigned()->nullable();
            $table->foreign('edificio_id')->references('id')->on('edificio');
            $table->integer('propietario_id')->unsigned();
            $table->foreign('propietario_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('morosos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidad');
            $table->string('mes', 2);
            $table->string('año', 4);
            $table->integer('monto_deuda');
            $table->integer('edificio_id')->unsigned();
            $table->foreign('edificio_id')->references('id')->on('edificio');
            $table->timestamps();
        });   

        Schema::create('mGastoComun', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('tipoGasto');       
        });

        Schema::create('cGastoComun', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('condominio_id')->unsigned();
            $table->foreign('condominio_id')->references('id')->on('condominio');
            $table->string('mes', 2);
            $table->string('año', 4);
        });

        Schema::create('dGastoComun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cgastocomun_id')->unsigned();
            $table->foreign('cgastocomun_id')->references('id')->on('cGastoComun');
            $table->integer('codigo_id')->unsigned();
            $table->foreign('codigo_id')->references('id')->on('mGastoComun');
            $table->integer('valor');
            $table->integer('tipodocumento')->nullable(); //Select con tipos de documentos
            $table->string('numerodocumento')->nullable();
        });

        Schema::create('cegreso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes', 2);
            $table->string('año', 4);
            $table->integer('edificio_id')->unsigned();
            $table->foreign('edificio_id')->references('id')->on('edificio');    
        }); 

        Schema::create('degreso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cegreso_id')->unsigned();
            $table->foreign('cegreso_id')->references('id')->on('cegreso');
            $table->integer('numero');
            $table->integer('cheque');
            $table->string('nominacion');
            $table->integer('valor');       
        }); 

        Schema::create('cconsumoenergetico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes', 2);
            $table->string('año', 4);
            $table->integer('totalBoletaMes');
            $table->integer('porcAC'); //Porcentaje de Agua Caliente
            $table->integer('porcCalefa'); //Porcentaje de Calefaccion
            $table->integer('totalConsumoAC'); //Total Consumo de agua caliente en M3
            $table->integer('totalConsumoACV'); //Total Consumo de agua caliente Valor
            $table->integer('totalConsumoCalefa'); //Total Consumo de Calefaccion en M3
            $table->integer('totalConsumoCalefaV'); //Total Consumo de Calefaccion Valor
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidad');
        });

        Schema::create('dconsumoenergetico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cconsumoenergetico_id')->unsigned();
            $table->foreign('cconsumoenergetico_id')->references('id')->on('cconsumoenergetico');
            $table->string('numero', 10);
            $table->integer('LecturaAntesCale');
            $table->integer('LecturaActualCale');
            $table->integer('ConsumoCalefa');
            $table->integer('ConsumoSubToCale');
            $table->integer('LecturaAntesAguaC');
            $table->integer('LecturaActualAguaC');
            $table->integer('ConsumoAguaC');
            $table->integer('ConsumoSubToAguaC');
            $table->integer('ConsumoTotalGeneral');
        });

        Schema::create('cingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidad');
            $table->string('mes', 2);
            $table->string('año', 4); 
            $table->string('fecha');
            $table->integer('nroRecibo');
            $table->string('bancoProcedecia');
            $table->integer('abono');
            $table->integer('saldo'); // = Gasto comun total - abono
        });

        Schema::create('dingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dingreso_id')->unsigned();
            $table->foreign('dingreso_id')->references('id')->on('cingreso');
            $table->string('fecha');
            $table->integer('nroRecibo');
            $table->string('bancoProcedecia');
            $table->integer('abono');
            $table->integer('saldo'); // = Gasto comun total - abono
        });

        Schema::create('fondoreserva', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunidad_id')->unsigned();
            $table->foreign('comunidad_id')->references('id')->on('condominio');
            $table->string('año', 4);
            $table->integer('flagSobre'); //1: % sobre GC, 2: % sobre monto fijo, 3: Valor fijo
            $table->integer('porcGC')->nullable();
            $table->integer('valorFijoPorc')->nullable();
            $table->integer('valorFijo')->nullable();
        });

        Schema::create('consumoenergetico', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comunidad_id')->unsigned();
            $table->foreign('comunidad_id')->references('id')->on('condominio');
            $table->string('año', 4);
            $table->integer('porcGastoComun');
            $table->integer('porcRemarcadores');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad');
        Schema::dropIfExists('edificio');
        Schema::dropIfExists('condominio');
        Schema::dropIfExists('morosos');
        Schema::dropIfExists('mGastoComun');
        Schema::dropIfExists('cGastoComun');
        Schema::dropIfExists('dGastoComun');
        Schema::dropIfExists('cegreso');
        Schema::dropIfExists('degreso');
        Schema::dropIfExists('cconsumoenergetico');
        Schema::dropIfExists('dconsumoenergetico');
        Schema::dropIfExists('cingreso');
        Schema::dropIfExists('dingreso');
        Schema::dropIfExists('consumoenergetico');
        Schema::dropIfExists('fondoreserva');
    }
}
