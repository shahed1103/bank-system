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
        Schema::create('savings_accounts', function (Blueprint $table) {
        $table->id();
  //    $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();

        $table->string('name')->unique(); // مثلاً: "توفير عادي", "توفير بفوائد عالية"
        $table->decimal('interest_rate', 5, 4); // الفوائد (نسبة مئوية، 5 أرقام منها 4 بعد الفاصلة)
        $table->decimal('minimumbalancefor_interest', 10, 2)->default(0); // الحد الأدنى لكسب الفائدة
        $table->integer('freewithdrawlimitpermonth')->default(0); // عدد مرات السحب المجانية المسموحة
        $table->decimal('withdrawfeeafter_limit', 10, 2)->default(0); // رسوم السحب بعد تجاوز الحد
 //       $table->boolean('is_active')->default(true);
        $table->timestamps();
    });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savings_accounts');
    }
};
