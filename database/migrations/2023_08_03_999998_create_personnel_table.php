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
        Schema::create('personnel', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name', 50);
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('personnel_lv_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('email', 50);
            $table->string('phone', 50);
            $table->string('working_form', 50);
            $table->string('status', 50);
            $table->string('password', 255);
            $table->date('birthday');
            $table->string('address', 255)->nullable();
            $table->string('gender', 50);
            $table->integer('annual_salary')->nullable();
            $table->string('pack', 50)->nullable();
            $table->unsignedBigInteger('manage')->nullable();

            $table->foreign('department_id')->references('id')->on('department')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('position')->onDelete('cascade');
            $table->foreign('personnel_lv_id')->references('id')->on('personnel_level')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnel');
    }
};
