<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('pro_slug');

            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_price');
            $table->string('product_color');
            $table->string('product_size')->nullable();
            $table->string('product_summary');
            $table->string('product_description');
            $table->string('product_image')->nullable();
            $table->string('product_quantity');
            $table->string('alert_quantity');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
