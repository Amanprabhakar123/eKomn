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
        Schema::create('company_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('company_details');
            $table->boolean('bulk_dispatch_time')->default(false);
            $table->boolean('dropship_dispatch_time')->default(false);
            $table->boolean('product_quality_confirm')->default(false);
            $table->boolean('business_compliance_confirm')->default(false);
            $table->integer('product_qty')->default(0);
            $table->tinyInteger('heard_about')->default(0); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_operations');
    }
};
