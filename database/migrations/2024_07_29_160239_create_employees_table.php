<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('address');
            $table->string('phone');
            $table->string('rfc');
            $table->string('curp');
            $table->date('birthday');
            $table->string('employee_type');
            $table->string('position');
            $table->date('date_of_joining');
            $table->decimal('monthly_salary', 8, 2);
            $table->decimal('service_commission', 8, 2)->nullable();
            $table->decimal('product_commission', 8, 2)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

