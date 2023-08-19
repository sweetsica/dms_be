<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->nullable()->default(time());
            $table->string('name', 255)->nullable();
            $table->string('personCompany', 255)->nullable();
            $table->string('type')->nullable()->default(0);
            $table->string('class')->nullable()->default(0);
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('category')->nullable();
            $table->string('zalo', 255)->nullable();
            $table->string('note', 255)->nullable();
            $table->string('website')->nullable();
            $table->string('personContact', 255)->nullable();
            $table->string('companyName', 255)->nullable();
            $table->string('career', 255)->nullable();
            $table->string('taxCode', 255)->nullable();
            $table->string('companyPhoneNumber', 255)->nullable();
            $table->string('companyEmail', 255)->nullable();
            $table->string('accountNumber', 255)->nullable();
            $table->string('bankOpen', 255)->nullable();
            $table->string('group', 255)->nullable();
            $table->unsignedBigInteger('routeId')->nullable();
            $table->unsignedBigInteger('chanelId')->nullable();
            $table->string('status', 255)->nullable()->default(1);
            $table->unsignedBigInteger('personId')->nullable();
            $table->text('productId')->nullable();

            $table->string('city', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('guide', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->text('coordinatesX')->nullable();
            $table->text('coordinatesY')->nullable();

            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            //            $table->timestamp('created_at')->useCurrent();
//            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('routeId')->references('id')->on('route_directions')->onDelete('cascade');
            $table->foreign('chanelId')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('personId')->references('id')->on('personnel')->onDelete('cascade');

            $table->string('filePath', 255)->nullable();
            $table->string('fileName', 255)->nullable();

            $table->text('comment')->nullable();
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