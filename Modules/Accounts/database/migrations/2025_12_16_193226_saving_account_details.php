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
        $table->foreignId('savings_account_id')->nullable()->constrained('savings_accounts')->onDelete('cascade'); // يربط بإعدادات المنتج
        $table->decimal('currentinterestrate', 5, 4); // سعر الفائدة المطبق حالياً على هذا الحساب (قد يختلف عن إعدادات المنتج)
        $table->integer('monthlywithdrawalsmade')->default(0); // عدد مرات السحب لهذا الشهر
        $table->decimal('amount');
        $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');

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
