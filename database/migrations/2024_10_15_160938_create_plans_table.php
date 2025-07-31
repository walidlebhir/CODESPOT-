<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('name');
            $table->integer('account_limit')->default(1)->nullable(); // Number of accounts allowed
            $table->integer('team_limit')->default(1)->nullable(); // Number of teams allowed
            $table->integer('leads_limit')->default(1)->nullable(); // Number of leads
            $table->integer('shipping_company_limit')->default(1)->nullable(); // Number of shipping companies
            $table->integer('order_limit')->default(1)->nullable(); // Order quota
            $table->boolean('brand_watermark')->default(true); // Branding watermark
            $table->integer('confirmation_wts')->nullable(); // Number of WhatsApp confirmations
            $table->integer('grace_period_days')->default(0); // Grace period in days
            $table->boolean('priority_support')->default(false); // Priority support
            
            // Pricing fields
            $table->decimal('monthly_price', 8, 2)->nullable(); // Monthly subscription price
            $table->decimal('yearly_price', 8, 2)->nullable(); // Yearly subscription price
            $table->string('monthly_price_label')->nullable(); // Monthly price label
            $table->string('yearly_price_label')->nullable(); // Yearly price label
            $table->decimal('monthly_discount_value', 5, 2)->default(0); // Discount value
            $table->decimal('yearly_discount_value', 5, 2)->default(0); // Discount value
            
            $table->boolean('has_free_trial')->default(false); // Free trial availability
            $table->string('stripe_product_id')->nullable(); // Stripe product ID
            $table->string('stripe_label')->nullable(); // Stripe product info
            
            // Add-ons
            $table->decimal('whatsapp_addon_price', 8, 2)->default(0);
            $table->decimal('sms_addon_price', 8, 2)->default(0);
            $table->decimal('email_addon_price', 8, 2)->default(0);
            
            $table->decimal('admin_mobile_addon_price', 8, 2)->default(0);
            $table->decimal('manager_mobile_addon_price', 8, 2)->default(0);
            $table->decimal('call_center_mobile_addon_price', 8, 2)->default(0);
            $table->decimal('delivery_mobile_addon_price', 8, 2)->default(0);
            $table->string('status', 100)->nullable()->default('enabled');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}

