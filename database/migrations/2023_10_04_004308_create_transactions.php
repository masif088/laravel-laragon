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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('transaction_status_id');
            $table->dateTime('date_payment');
            $table->integer('money');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('no_invoice');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('transaction_status_id')
                ->references('id')
                ->on('transaction_statuses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

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
