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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255);
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('MST', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('point_name', 255)->nullable();
            $table->string('point_nickname', 255)->nullable();
            $table->string('point_phone', 255)->nullable();
            $table->string('point_email', 255)->nullable();
            $table->unsignedBigInteger('incharge_id');
            $table->string('group', 255);
            $table->string('channel', 255);
            
            $table->unsignedBigInteger('routeId');
            $table->string('city');
            $table->string('district');
            $table->string('guide');
            $table->string('address');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('deleted_at')->nullable();
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
