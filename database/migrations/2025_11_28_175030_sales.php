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
            Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('payment');
            $table->foreignId('customer_id')->constrained('Customer');
            $table->foreignId('product_id')->constrained('Product');
            $table->timestamps();
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
