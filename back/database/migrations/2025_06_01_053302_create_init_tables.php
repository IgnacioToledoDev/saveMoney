<?php

use App\Models\User;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('expiration_date');
            $table->boolean('has_reminder')->default(false);
            $table->enum('type', ['debit', 'credit']);
            $table->boolean('has_credit_line')->default(false);
            $table->float('credit_line_limit')->default(0);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });

        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('other');
            $table->float('goal_amount');
            $table->float('init_amount')->default(0);
            $table->dateTime('target_date');
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->text('description')->nullable();
            $table->boolean('has_reminder')->default(false);
            $table->timestamps();
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('other');
            $table->float('amount');
            $table->text('description')->nullable();
            $table->boolean('has_reminder')->default(false);
            $table->dateTime('reminder_send_at')->nullable();
            $table->enum('payment_method', ['stripe', 'paypal']);
            $table->boolean('is_shared')->default(false);
            $table->boolean('is_active')->default(true);
            $table->dateTime('facture_day')->nullable();
            $table->timestamps();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('category')->default('other');
            $table->float('amount');
            $table->enum('type', ['income', 'expensive']);
            $table->text('description')->nullable();
            $table->boolean('is_recurrent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('init_tables');
    }
};
