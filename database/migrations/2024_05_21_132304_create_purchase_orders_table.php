<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('device_unique_key')->nullable();
            $table->string('purchase_order_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('rep_name')->nullable();
            $table->string('driver_phone')->nullable();
            $table->string('rep_phone')->nullable();
            $table->date('arrival_date')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('last_update_user_id')->nullable();
            $table->foreign('status_id')->references('id')->on('purchase_order_statuses')->onDelete('set null');
            $table->foreign('last_update_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['last_update_user_id']);
        });

        Schema::dropIfExists('purchase_orders');
    }
};
