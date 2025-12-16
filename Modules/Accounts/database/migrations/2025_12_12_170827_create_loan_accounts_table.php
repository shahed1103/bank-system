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
        Schema::create('loan_accounts', function (Blueprint $table) {
            $table->id();
 //  $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();
        $table->string('name')->unique(); // مثلاً: "قرض شخصي", "قرض سيارة", "قرض عقاري"
        $table->decimal('interest_rate', 5, 4); // الفائدة
        $table->enum('interest_rate_type', ['fixed', 'variable'])->default('fixed'); // نوع الفائدة
        $table->decimal('late_payment_fees', 10, 2)->default(0); // رسوم الدفع المتأخر
        $table->decimal('processing_fees', 10, 2)->default(0); // رسوم معالجة القرض
        $table->integer('max_tenure_months'); // أقصى مدة للقرض بالشهر
        $table->decimal('min_loan_amount', 10, 2)->default(0); // الحد الأدنى لمبلغ القرض
        $table->decimal('max_loan_amount', 10, 2)->default(0); // الحد الأقصى لمبلغ القرض
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_accounts');
    }
};
