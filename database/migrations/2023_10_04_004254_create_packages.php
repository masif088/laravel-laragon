<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('package_status_id');
            $table->integer('price');
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->timestamps();
            $table->foreign('package_status_id')
                ->references('id')
                ->on('package_statuses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
