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
        Schema::create('decorators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->boolean('insurance')->default(false);
            $table->boolean('premium_services')->default(false);

            $table->foreignId('insurances_id')->constrained('insurances')->onDelete('cascade')->nullable();
            $table->foreignId('premium_services_id')->constrained('premium_services')->onDelete('cascade')->nullable();
            $table->integer('total_cost')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decorators');
    }
};
