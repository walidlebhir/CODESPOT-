<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');            
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreignId('account_id');
            $table->foreignId('order_event_type_id')->constrained('order_event_types')->onDelete('cascade');
            $table->text('old_value')->nullable();
            $table->text('new_value')->nullable();
            $table->string('status')->nullable()->default('enabled');
            $table->string('icons',50)->nullable();
            $table->integer('height')->nullable()->default(20);
            $table->integer('width')->nullable()->default(20);         
            $table->string('change_description')->charset('latin1')->collation('latin1_general_ci')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('team_member_roles')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_timelines');
    }
}
