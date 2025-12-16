<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained('customers'); // أو 'users' إذا كان لديك جدول مستخدمين
        $table->string('account_number')->unique(); // رقم الحساب الفريد
        $table->string('account_name')->nullable(); // اسم يمكن للعميل تسمية حسابه به (مثل "حسابي الجاري الرئيسي")
        $table->decimal('balance', 15, 2)->default(0); // الرصيد الحالي (استخدم decimal للدقة المالية)
        $table->enum('status', ['active', 'closed', 'suspended', 'frozen'])->default('active'); // حالة الحساب
        $table->timestamp('opened_at')->useCurrent(); // تاريخ فتح الحساب
        $table->timestamp('closed_at')->nullable(); // تاريخ إغلاق الحساب

        // الأعمدة الخاصة بالعلاقة متعددة الأشكال
        $table->morphs('accountable'); // سيضيف 'accountable_id' (integer) و 'accountable_type' (string)

        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
