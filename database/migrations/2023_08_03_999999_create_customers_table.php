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
            $table->string('code', 255);
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('personContact', 255)->nullable();
            $table->string('companyName', 255)->nullable();
            $table->string('career', 255)->nullable();
            $table->string('taxCode', 255)->nullable();
            $table->string('companyPhoneNumber', 255)->nullable();
            $table->string('companyEmail', 255)->nullable();
            $table->string('accountNumber', 255)->nullable();
            $table->string('bankOpen', 255)->nullable();
            $table->string('group', 255);
            $table->unsignedBigInteger('routeId');
            $table->unsignedBigInteger('chanelId');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('personId');
            $table->text('productId');
            $table->string('city');
            $table->string('district');
            $table->string('guide');
            $table->string('address');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('routeId')->references('id')->on('route_directions')->onDelete('cascade')->nullable();
            $table->foreign('chanelId')->references('id')->on('department')->onDelete('cascade')->nullable();
            $table->foreign('personId')->references('id')->on('personnel')->onDelete('cascade');
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