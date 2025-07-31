<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');            
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
                                    
            $table->Integer('quantity')->default(0)->nullable();              
            $table->string('status', 100)->nullable()->default('enabled');         
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');            
            $table->foreign('account_id')->references('id')->on('accounts');            
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
