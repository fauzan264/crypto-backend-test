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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable(false);
            $table->string('deposit_id', 50)->nullable(false);
            $table->string('asset', 10)->nullable(false);
            $table->integer('amount', false, true)->nullable(false);
            $table->string('type', 20)->nullable(false);
            $table->string('status', 20)->nullable(false);
            $table->uuid('created_by')->nullable(false);
            $table->uuid('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('type')->on('transaction_types')->references('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
