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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->float('sub_total')->default(0);
            $table->decimal('menu_id')->nullable();
            $table->integer('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->integer('customer_id')->nullable();
            $table->string('description')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->text('address');
            $table->enum('status',['new','process','delivered','cancel'])->default('new');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
            $table->boolean('reorder')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
