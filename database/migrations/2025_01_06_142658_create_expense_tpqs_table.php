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
        Schema::create('expense_tpqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('expensetype_id');
            $table->foreign('expensetype_id')->references('id')->on('expense_tpq_types')->onDelete('cascade');
            $table->foreignId('balance_id');
            $table->foreign('balance_id')->references('id')->on('balance_tpqs')->onDelete('cascade');
            $table->date('date');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('unit_price');
            $table->unsignedBigInteger('amount');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_tpqs');
    }
};
