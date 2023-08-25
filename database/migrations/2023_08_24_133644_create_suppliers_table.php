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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('business_areas')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('representative')->nullable();
            $table->string('job_title')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->unsignedBigInteger('debt_limit')->nullable();
            $table->integer('days_owed')->nullable();
            $table->tinyInteger('status');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
