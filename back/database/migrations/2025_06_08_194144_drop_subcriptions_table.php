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
        Schema::dropIfExists('recurring_transactions');
        Schema::table('subscriptions', function (Blueprint $table) {
           $table->enum('frequency', ['daily', 'weekly', 'monthly', 'yearly'])->nullable();
           $table->string('start_date')->nullable();
           $table->string('end_date')->nullable();
           $table->unsignedBigInteger('user_id');
           $table->foreign('user_id')->references('id')->on('users');
           $table->unsignedBigInteger('account_id');
           $table->foreign('account_id')->references('id')->on('accounts');
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
