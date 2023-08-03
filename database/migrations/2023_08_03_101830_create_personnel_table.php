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
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('code', 255);
            $table->unsignedBigInteger('role_id');
            $table->string('phone', 255);
            $table->string('working_form', 255);
            $table->text('address')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('personnel_lv_id');
            $table->unsignedBigInteger('area_id');
            $table->date('birthday');
            $table->string('gender', 255);
            $table->integer('annual_salary')->default(0);
            $table->string('pack', 255);
            $table->unsignedBigInteger('manage');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
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
