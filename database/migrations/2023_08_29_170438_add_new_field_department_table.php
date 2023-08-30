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
        Schema::table('department', function (Blueprint $table) {
            $table->string('order')->nullable();
            // $table->integer('demarcation')->default(10);
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
