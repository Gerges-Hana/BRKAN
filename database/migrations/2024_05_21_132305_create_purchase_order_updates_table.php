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
        Schema::create('purchase_order_updates', function (Blueprint $table) {
            $table->id();
            $table->integer('purchase_order_id');
            $table->integer('user_id');
            $table->integer('status_id');
            $table->timestamp('entrance_time')->nullable();
            $table->timestamp('unloading_time')->nullable();
            $table->timestamp('leave_time')->nullable();
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('purchase_order_status_updates')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_order_updates', function (Blueprint $table) {
            $table->dropForeign(['purchase_order_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['status_id']);
        });

        Schema::dropIfExists('purchase_order_updates');
    }
};
