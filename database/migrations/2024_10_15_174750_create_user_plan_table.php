<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->integer('orders_remaining')->default(0); // Orders remaining
            $table->integer('confirmation_wts_remaining')->default(0); // WhatsApp confirmations remaining
            $table->integer('sms_remaining')->default(0); // SMS remaining
            $table->integer('email_remaining')->default(0); // Emails remaining
            $table->integer('team_remaining')->default(0); // Number of teams allowed
            $table->integer('leads_remaining')->default(0); // Number of leads            
            $table->string('status', 100)->nullable()->default('enabled');
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
        Schema::dropIfExists('user_plan');
    }
}
