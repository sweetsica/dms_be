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
            $table->string('code', 255)->default(time());
            $table->string('name', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('category')->nullable()->nullable();
            $table->string('zalo')->nullable()->nullable();
            $table->string('note')->nullable()->nullable();
            $table->string('website')->nullable()->nullable();
            $table->string('personContact', 255)->nullable();
            $table->string('companyName', 255)->nullable();
            $table->string('career', 255)->nullable();
            $table->string('taxCode', 255)->nullable();
            $table->string('companyPhoneNumber', 255)->nullable();
            $table->string('companyEmail', 255)->nullable();
            $table->string('accountNumber', 255)->nullable();
            $table->string('bankOpen', 255)->nullable();
            $table->unsignedBigInteger('routeId')->nullable();
            $table->unsignedBigInteger('chanelId')->nullable();
            $table->unsignedBigInteger('groupId')->nullable();
            $table->string('status')->default(1);
            $table->unsignedBigInteger('personId')->nullable();
            $table->unsignedBigInteger('productId')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('guide')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
//            $table->timestamp('created_at')->useCurrent();
//            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('routeId')->references('id')->on('route_directions')->onDelete('cascade');
            $table->foreign('chanelId')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('personId')->references('id')->on('personnel')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
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
