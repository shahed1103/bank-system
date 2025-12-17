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
        $table->foreignId('loan_id')->constrained('loan_accounts')->onDelete('cascade'); // يربط بمنتج القرض
        $table->decimal('requested_principal_amount', 15, 2); // المبلغ  للقرض
        $table->decimal('approved_principal_amount', 15, 2)->nullable(); //
        $table->decimal('remaining_principal', 15, 2)->nullable(); // المبلغ المتبقي من رأس المال
        $table->decimal('interest_rate_at_disbursement', 5, 4); // سعر الفائدة المحدد وقت صرف القرض
        $table->integer('requested_term_months'); // مدة القرض بالأشهر
        $table->date('approved_date')->nullable(); // تاريخ صرف القرض
        $table->date('next_payment_date')->nullable(); // تاريخ الاستحقاق القادم
        $table->decimal('monthly_payment_amount', 15, 2)->nullable(); // قيمة القسط الشهري
        $table->string('rejected_resion')->nullable();
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
