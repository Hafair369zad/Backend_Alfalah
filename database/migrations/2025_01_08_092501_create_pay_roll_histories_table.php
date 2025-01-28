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
        Schema::create('pay_roll_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->date('period');
            $table->unsignedBigInteger('basic_bisyaroh');
            $table->unsignedInteger('absen');
            $table->unsignedBigInteger('piece_bisyaroh');
            $table->unsignedBigInteger('total_bisyaroh');
            $table->enum('payment_status', ['paid', 'unpaid', 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_roll_histories');
    }
};
