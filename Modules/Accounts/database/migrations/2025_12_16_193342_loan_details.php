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
          Schema::create('loan_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('loan_product_setting_id')->constrained('loan_product_settings'); // يربط بمنتج القرض
        $table->decimal('principal_amount', 15, 2); // المبلغ الأصلي للقرض
        $table->decimal('remaining_principal', 15, 2); // المبلغ المتبقي من رأس المال
        $table->decimal('interest_rate_at_disbursement', 5, 4); // سعر الفائدة المحدد وقت صرف القرض
        $table->integer('term_months'); // مدة القرض بالأشهر
        $table->date('disbursement_date'); // تاريخ صرف القرض
        $table->date('next_payment_date'); // تاريخ الاستحقاق القادم
        $table->decimal('monthly_payment_amount', 15, 2); // قيمة القسط الشهري
        // يمكنك إضافة أي تفاصيل أخرى خاصة بهذا القرض المحدد
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
