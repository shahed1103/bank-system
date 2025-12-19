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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('send_account_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('recive_account_id')->constrained('accounts')->onDelete('cascade');
            $table->decimal('amount');
            $table->boolean('approv')->default(false);

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
