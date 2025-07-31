<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('value', 100);
            $table->boolean('shipping')->nullable()->default(false);
            $table->boolean('confirmation')->nullable()->default(false);
            $table->string('color', 100)->nullable();
            $table->string('description', 2500)->nullable();
            $table->string('status', 100)->nullable()->defaut('disabled');
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
        Schema::dropIfExists('status');
    }
}
