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
            $table->decimal('total_price');
            $table->decimal('discount')->nullable();
            $table->integer('product_id');
            $table->integer('user_id');
            $table->integer('customer_id')->nullable();
            $table->string('description')->nullable();
            $table->boolean('paid')->default(0);
            $table->boolean('deliverde')->default(0);
            $table->boolean('canceled')->default(0);
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
