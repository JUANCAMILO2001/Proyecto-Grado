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
        Schema::table('users', function ($table) {
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
        Schema::table('products', function ($table) {
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
        Schema::table('bill_products', function ($table) {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade');
        });
        Schema::table('bills', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
        Schema::table('order_bills', function ($table) {
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade');
        });
        Schema::table('orders', function ($table) {
            $table->foreign('pay_id')->references('id')->on('pays')->onUpdate('cascade');
            $table->foreign('comment_id')->references('id')->on('comments')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relations');
    }
};
