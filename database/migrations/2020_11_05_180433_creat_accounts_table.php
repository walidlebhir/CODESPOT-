<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('accounts', function (Blueprint $table) {            
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('store_url')->nullable();
            $table->string('store_image')->nullable();            
            $table->string('notification_email')->nullable();
            $table->string('status', 100)->nullable()->default('enabled');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');        
    }
}
