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
        Schema::create('investment_accounts', function (Blueprint $table) {
            $table->id();
 // $table->foreignId('account_id')->constrained('accounts')->cascadeOnDelete();

        $table->decimal('expected_returns', 5, 4)->nullable(); // العوائد المتوقعة (قد تكون غير مضمونة لذا nullable)
        $table->decimal('minimum_investment', 10, 2)->default(0); // الحد الأدنى للاستثمار
        $table->decimal('management_fees_percentage', 5, 4)->default(0); // رسوم الإدارة كنسبة مئوية ة
        $table->unsignedSmallInteger('year_version');

//      $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_accounts');
    }
};
