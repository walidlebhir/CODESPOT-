<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('shipping_companie_id');
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('pick_up_id')->nullable();
            $table->string('pick_up_city')->nullable();
            $table->longText('api_key')->nullable();
            $table->string('key_id')->nullable();
            $table->longText('token')->nullable();
            $table->string('confirmation')->nullable()->default("automated");
            $table->string('default')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('shipping_companie_id')->references('id')->on('shipping_companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_tokens');
    }
}
