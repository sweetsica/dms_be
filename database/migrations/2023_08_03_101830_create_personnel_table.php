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
            $table->string('code', 255);
            $table->string('name', 255);
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('personnel_lv_id');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->string('working_form', 255);
            $table->string('status', 255);
            $table->string('password', 255);
            $table->date('birthday');
            $table->string('address', 255);
            $table->string('gender', 255);
            $table->integer('annual_salary')->nullable();
            $table->string('pack', 255)->nullable();
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
