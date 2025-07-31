<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');

            $table->string('origin_external_customer_id')->nullable();

            $table->string('full_name');
            $table->string('phone');
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->string('city_id')->nullable();
            $table->string('address')->nullable();
            $table->string('post_code')->nullable();

            $table->text('note')->nullable();
            $table->string('status',100)->default("enabled")->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
