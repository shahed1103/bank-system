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
    Schema::create('checking_account_details', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique()->default('normal'); // مثلاً: "حساب جاري عادي", "حساب جاري مميز"
        $table->foreignId('checking_account_setting_id')->nullable()->constrained('checking_account_settings'); // يربط بإعدادات المنتج
        $table->decimal('amount');
        $table->boolean('allows_overdraft')->default(false); // هل هذا الحساب الجاري المحدد يسمح بالسحب الاضافي
        $table->decimal('current_overdraft_used', 15, 2)->default(0); // المبلغ المسحوب حالياً الاضافي
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
