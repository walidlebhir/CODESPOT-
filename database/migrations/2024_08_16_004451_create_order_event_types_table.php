<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderEventTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_event_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value')->unique();
            $table->string('description')->charset('latin1')->collation('latin1_general_ci')->nullable();
            $table->string('tags',255)->nullable();
            $table->string('icons',255)->nullable();
            $table->integer('height')->nullable()->default(20);
            $table->integer('width')->nullable()->default(20);
            $table->string('status')->nullable()->default('enabled');
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
        Schema::dropIfExists('order_event_types');
    }
}
