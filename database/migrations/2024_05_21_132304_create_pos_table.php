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
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('po_number'); 
            $table->string('invoice_number')->nullable(); 
            $table->string('driver_name')->nullable(); 
            $table->string('rep_name')->nullable(); 
            $table->string('driver_phone')->nullable(); 
            $table->string('rep_phone')->nullable(); 
            $table->date('arrival_date')->nullable(); 
            $table->timestamp('arrival_time')->nullable(); 
            $table->timestamp('entrance_time')->nullable(); 
            $table->timestamp('unloading_time')->nullable(); 
            $table->timestamp('leave_time')->nullable(); 
            $table->timestamps(); 
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('last_update_user_id')->nullable();
            $table->foreign('status_id')->references('id')->on('po_statuses')->onDelete('set null');
            $table->foreign('last_update_user_id')->references('id')->on('users')->onDelete('set null');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pos', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['last_update_user_id']);
        });

        Schema::dropIfExists('pos');
    }
};
