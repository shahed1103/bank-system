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

    Schema::create('investment_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('investment_account_id')->constrained('investment_accounts') ->onDelete('cascade');// يربط بمنتج الاستثمار
        $table->decimal('requested_investment_amount', 15, 2); // مبلغ الاستثمار الأولي
        $table->decimal('approval_investment_amount');
        $table->string('rejected_rasion');
        $table->enum('risk_level', ['low', 'medium', 'high'])->nullable(); // مستوى المخاطر
        $table->date('approved_date');
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
