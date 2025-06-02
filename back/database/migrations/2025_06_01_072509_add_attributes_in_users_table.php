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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('phone')->nullable()->after('email');
            $table->boolean('is_agree_terms')->nullable()->after('phone')->default(false);
            $table->string('lastname')->default('');
            $table->text('biography')->nullable()->after('is_agree_terms');
            $table->string('locale')->nullable()->after('biography');
            $table->enum('current_money', ['clp', 'usd', 'eur'])->after('locale')->default('clp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('is_agree_terms');
            $table->dropColumn('lastname');
            $table->dropColumn('biography');
            $table->dropColumn('locale');
            $table->dropColumn('current_money');
        });
    }
};
