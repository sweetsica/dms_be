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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id');
            $table->bigInteger('order_staff')->index('purchase_orders_order_staff_foreign');
            $table->bigInteger('route_direction')->index('purchase_orders_route_direction_foreign');
            $table->bigInteger('customer_id')->index('purchase_orders_customer_id_foreign');
            $table->string('description')->nullable();
            $table->text('data')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->string('code');
            $table->string('total_money')->nullable();
            $table->bigInteger('edit_order')->nullable()->index('purchase_orders_edit_order_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
