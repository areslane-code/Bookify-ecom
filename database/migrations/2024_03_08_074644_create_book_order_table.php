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
        Schema::create('book_order', function (Blueprint $table) {
            $table->foreignId("book_id")->references("id")->on("users")->constrained()->cascadeOnDelete();
            $table->foreignId("order_id")->references("id")->on("orders")->constrained()->cascadeOnDelete();
            $table->integer("quantity");
            $table->primary(['book_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_order');
    }
};
