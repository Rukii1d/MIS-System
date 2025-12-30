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
        Schema::create('redatourism', function (Blueprint $table) {
            $table->id();
            $table->string('Program');
            $table->string('Responsibility');
            $table->string('Discription'); // Same typo kept for consistency
            $table->enum('status', ['Completed', 'Pending'])->default('Pending');
            $table->string('Email');
            $table->date('Date');
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redatourism');
    }
};
