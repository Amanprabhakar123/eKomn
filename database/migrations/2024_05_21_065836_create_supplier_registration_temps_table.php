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
        Schema::create('supplier_registration_temps', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->nullable();
            $table->string('gst')->nullable();
            $table->string('website_url')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile', 13)->nullable();
            $table->string('designation')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pin_code', 7)->nullable();
            $table->boolean('bulk_dispatch_time')->default(false); 
            $table->boolean('dropship_dispatch_time')->default(false); 
            $table->boolean('product_quality_confirm')->default(false); 
            $table->boolean('business_compliance_confirm')->default(false); 
            $table->boolean('stationery')->default(false);  
            $table->boolean('furniture')->default(false); 
            $table->boolean('food_and_bevrage')->default(false);
            $table->boolean('electronics')->default(false);  
            $table->boolean('groceries')->default(false);
            $table->boolean('baby_products')->default(false);   
            $table->boolean('gift_cards')->default(false);
            $table->boolean('cleaining_supplies')->default(false);
            $table->boolean('through_sms')->default(false);
            $table->boolean('through_email')->default(false);
            $table->boolean('google_search')->default(false);
            $table->boolean('social_media')->default(false);
            $table->boolean('referred')->default(false);
            $table->boolean('others')->default(false);  
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_registration_temps');
    }
};
