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
        Schema::create('position', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('description', 255)->nullable();
            $table->unsignedBigInteger('parent');
            $table->string('code', 255);
            $table->unsignedBigInteger('staffing')->nullable();
            $table->unsignedBigInteger('wage')->nullable();
            $table->string('pack', 50)->nullable();
            $table->string('personnel_level', 50);
            $table->unsignedBigInteger('department_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position');
    }
};
