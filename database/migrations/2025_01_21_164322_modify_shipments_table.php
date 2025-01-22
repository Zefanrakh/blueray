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
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn([
                'sender_name',
                'sender_address',
                'sender_phone',
                'receiver_name',
                'receiver_address',
                'receiver_phone',
                'description',
                'weight',
                'price',
                'tracking_id',
                'status',
                'tracking_history',
            ]);

            $table->string('biteship_order_id')->after('id');
            $table->unsignedBigInteger('user_id')->after('biteship_order_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->string('sender_name')->nullable();
            $table->text('sender_address')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('receiver_name')->nullable();
            $table->text('receiver_address')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->text('description')->nullable();
            $table->float('weight')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('tracking_id')->nullable();
            $table->string('status')->nullable();
            $table->text('tracking_history')->nullable();

            $table->dropForeign(['user_id']);
            $table->dropColumn(['biteship_order_id', 'user_id']);
        });
    }
};
