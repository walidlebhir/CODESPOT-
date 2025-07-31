<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->string('email')->nullable();
            $table->string('base_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('description')->nullable();
            $table->string('icon')->nullable();            
            $table->boolean('has_pick_up')->default(false);
            $table->boolean('has_delivery_bands')->default(false);
            $table->string('type_auth')->default('api_key');
            $table->string('status',100)->default("disabled");
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
        Schema::dropIfExists('shipping_companies');
    }
}
