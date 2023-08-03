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
        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->unsignedBigInteger('parent')->nullable();
            $table->string('description', 255)->nullable();
            $table->string('code', 255);
            $table->unsignedBigInteger('ib_lead');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department');
    }
};
