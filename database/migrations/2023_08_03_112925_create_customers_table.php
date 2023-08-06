<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('personContact', 255)->nullable();
            $table->string('comanyName', 255)->nullable();
            $table->string('career', 255)->nullable();
            $table->string('taxCode', 255)->nullable();
            $table->string('companyPhoneNumber', 255)->nullable();
            $table->string('companyEmail', 255)->nullable();
            $table->string('accountNumber', 255)->nullable();
            $table->string('bankOpen', 255)->nullable();
            $table->unsignedBigInteger('routeId');
            $table->unsignedBigInteger('chanelId');
            $table->unsignedBigInteger('groupId');
            $table->string('status');
            $table->unsignedBigInteger('personId');
            $table->unsignedBigInteger('productId');
            $table->string('city');
            $table->string('district');
            $table->string('guide');
            $table->string('address');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
            // $table->foreign('productId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};