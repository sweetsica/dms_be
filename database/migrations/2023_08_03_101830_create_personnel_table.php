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
            $table->string('code', 50);
            $table->string('name', 50);
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('personnel_lv_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('email', 50);
            $table->integer('phone');
            $table->string('working_form', 50);
            $table->string('status', 50);
            $table->string('password', 255);
            $table->date('birthday');
            $table->string('address', 255)->nullable();
            $table->string('gender', 50);
            $table->integer('annual_salary')->nullable();
            $table->string('pack', 50)->nullable();
            $table->unsignedBigInteger('manage')->nullable();
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
