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
        Schema::create('review_product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('product_id');
            $table->integer('star');
            $table->string('comment', 250);
            $table->datetime('created_date');
            $table->string('created_by', 200);
            $table->timestamp('updated_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_product');
    }
};
