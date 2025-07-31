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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');
            $table->string('bar_code')->nullable();


            $table->string('name');
            $table->text('description')->nullable();

            $table->float('price')->default(0.0)->nullable();
            $table->integer('stock')->default(0)->nullable();

            $table->float('dicsounted_price')->default(0.0)->nullable();

            $table->string('status',100)->default("enabled")->nullable();

            $table->string('default_photo')->nullable();
            $table->string('photos_path')->nullable();
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
        Schema::dropIfExists('products');
    }
}
