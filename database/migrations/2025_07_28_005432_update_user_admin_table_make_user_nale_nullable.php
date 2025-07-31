<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('user_admin', function (Blueprint $table) {
        $table->string('User_nale')->nullable()->change();
    });
}

public function down(): void
{
    Schema::table('user_admin', function (Blueprint $table) {
        $table->string('User_nale')->nullable(false)->change();
    });
}

};
