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
        Schema::create('spp_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id');
            $table->foreign('payment_id')->references('id')->on('spp_payments')->onDelete('cascade');
            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('reference_id')->nullable();
            $table->enum('payment_method', ['QRIS', 'Bank Transfer', 'Cash']);
            $table->enum('status', ['pending', 'success', 'failed']);
            $table->unsignedBigInteger('amount');
            $table->timestamp('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spp_transactions');
    }
};
