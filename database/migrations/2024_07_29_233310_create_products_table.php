<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name')->nullable();
            $table->string('brand')->nullable();
            $table->integer('quantity_ml_grs')->nullable();
            $table->string('barcode')->nullable();
            $table->decimal('purchase_cost', 8, 2)->nullable();
            $table->decimal('sale_cost', 8, 2)->nullable();
            $table->decimal('cost_per_ml_gr', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('inventories')) {
            Schema::table('inventories', function (Blueprint $table) {
                if (Schema::hasColumn('inventories', 'product_id')) {
                    $table->dropForeign(['product_id']);
                }
            });
        }

        Schema::dropIfExists('products');
    }
}


