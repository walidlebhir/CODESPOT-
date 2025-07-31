<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('external_variant_id',255)->nullable();
            $table->string('bar_code')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price', 8, 2)->default(0.0);
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(0);
            $table->boolean('status')->default(1);
            $table->float('discounted_percent', 5, 2)->default(0.0);
            $table->float('discounted_price', 8, 2)->default(0.0);
            $table->integer('default_id_photo')->nullable();
            $table->string('default_photo')->nullable();            
            $table->string('photos_path')->nullable();
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
        Schema::dropIfExists('product_variants');
    }
}
