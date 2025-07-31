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
        Schema::create('User_Admin', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('User_nale'); // ou 'User_name'
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps(); // Crée created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User_Admin');
    }
};
