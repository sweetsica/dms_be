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
        Schema::create('promotion', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name', 255)->nullable();
            $table->string('promotion_form', 255)->nullable();
            $table->date('applicable_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('multiples', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->text('customer_group_id')->nullable();
            $table->string('customer_type', 255)->nullable();
            $table->text('customer_id', 255)->nullable();
            $table->text('promotion_details', 255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion');
    }
};
