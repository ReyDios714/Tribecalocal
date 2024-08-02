<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 30)->unique();
            $table->string('descripcion', 100)->nullable();
            $table->boolean('condicion')->default(1);
        });

        DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'Administrador', 'descripcion' => 'Administrador'],
            ['id' => 2, 'nombre' => 'Vendedor', 'descripcion' => 'Vendedor'],
            ['id' => 3, 'nombre' => 'Comprador', 'descripcion' => 'Comprador'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}



