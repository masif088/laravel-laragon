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
        Schema::create('ragilnet_datas', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('facebook_link')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ragilnet_datas');
    }
};
