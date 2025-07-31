<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebhookLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webhook_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_webhook_id')->nullable();
            $table->string('key',50)->nullable();
            $table->string('app_name',50)->nullable();
            $table->string('event',100)->nullable();
            $table->json('payload')->nullable();
            $table->integer('status_code')->nullable();
            $table->text('response_message')->nullable(); // Response message or error details
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
        Schema::dropIfExists('webhook_logs');
    }
}
