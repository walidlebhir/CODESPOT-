<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('account_id');

            $table->integer('shipping_company_id')->nullable(); //cathdis; ozon; local
            $table->unsignedBigInteger('call_center_id')->nullable();       // Team : Member with role: call center


            $table->integer('shipping_city_id')->nullable();

            $table->integer('order_reference');
            $table->string('shipping_status',100)->default('new-order');
            $table->string('confirmation_status', 100)->default('new-order');
            $table->dateTime('confirmation_status_updated_at')->nullable();
            $table->dateTime('shipping_status_updated_at')->nullable();



            $table->string('origin_external_order_id')->nullable();
            $table->string('shipping_company_order_id')->nullable();

            $table->text('status_notes')->nullable();

            $table->float('sub_total')->default(0)->nullable();
            $table->float('grand_total')->default(0)->nullable();
            $table->integer('shipping_price')->default(0)->nullable();
            $table->string('discount_type')->nullable();
            $table->float('discount_value')->default(0)->nullable();

            $table->string('shipping_phone');
            $table->string('shipping_address')->nullable();
            $table->string('shipping_comment')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
