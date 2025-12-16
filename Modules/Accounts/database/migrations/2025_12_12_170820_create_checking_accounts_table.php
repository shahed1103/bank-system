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
        Schema::create('checking_accounts', function (Blueprint $table) {
            $table->id();
//      $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
        $table->string('name')->unique(); // مثلاً: "حساب جاري عادي", "حساب جاري مميز"
        $table->decimal('minimum_balance', 10, 2)->default(0); // الحد الأدنى للرصيد (استخدم decimal للأموال)
        $table->decimal('overdraft_limit', 10, 2)->default(0); // الحد الأعلى للسحب الاضافي
        $table->decimal('overdraft_fees', 10, 2)->default(0); // رسوم السحب الاضافي
        $table->decimal('monthlyfees', 10, 2)->default(0); // رسوم شهرية
 //     $table->boolean('is_active')->default(true); // لتمكين/تعطيل إعداد معين
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checking_accounts');
    }
};
