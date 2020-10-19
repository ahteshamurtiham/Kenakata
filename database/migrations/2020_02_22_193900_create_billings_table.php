<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sale_id');//sale table er shb pabo like user er id bla bla
            $table->bigInteger('product_id');//kon product er billing
            $table->bigInteger('shipping_id');//kon product er billing

            $table->string('product_unit_price');//bortoman price ta rekhe dibo
            $table->string('product_quantity');//user kon product ta koyta kinse 1 ta product 4tao kinte pare
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
        Schema::dropIfExists('billings');
    }
}
