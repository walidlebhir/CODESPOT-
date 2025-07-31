<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCompanyCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_company_cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipping_company_id');
            $table->unsignedBigInteger('city_id');
            $table->string('value', 255);
            $table->string('origine_name',255)->nullable();
            $table->unsignedBigInteger('pick_up_point_id')->nullable();
            $table->string('status',100)->default("enabled")->nullable();
            $table->float('refused_price')->nullable()->default(0.0);
            $table->float('returned_price')->nullable()->default(0.0);
            $table->float('delivered_price')->nullable()->default(0.0);            
            $table->boolean('confirmed')->nullable()->default(false);
            $table->text('data')->nullable();
            $table->foreign('shipping_company_id')->references('id')->on('shipping_companies')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('shipping_company_cities');
    }
}
