<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('user_id'); // Asegurarse de que el tipo de dato coincida
    $table->string('address');
    $table->string('phone');
    $table->string('rfc');
    $table->string('curp');
    $table->date('birthday');
    $table->string('employee_type'); // planta, temporal, comisión
    $table->string('position'); // administrativo, auxiliar, estilista
    $table->date('date_of_joining');
    $table->decimal('monthly_salary', 8, 2);
    $table->decimal('service_commission', 8, 2)->nullable();
    $table->decimal('product_commission', 8, 2)->nullable();
    $table->timestamps();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
