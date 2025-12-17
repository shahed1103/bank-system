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
        Schema::create('saving_account_details', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique()->defult('normal'); // مثلاً: "توفير عادي", "توفير بفوائد عالي
        $table->foreignId('saving_account_setting_id')->nullable()->constrained('saving_account_settings'); // يربط بإعدادات المنتج
        $table->decimal('current_interest_rate', 5, 4); // سعر الفائدة المطبق حالياً على هذا الحساب (قد يختلف عن إعدادات المنتج)
        $table->integer('monthly_withdrawals_made')->default(0); // عدد مرات السحب لهذا الشهر
        $table->decimal('amount');
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
