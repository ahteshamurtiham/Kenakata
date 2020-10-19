<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable(); //social login hole th r email na die jdi phone diye duke tai fakao thakte pare
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();//social login hole th r pass dibe na tai fakao thakte pare
            $table->string('provider_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('user_role')->default('user')->comment('1=user 2=admin');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
