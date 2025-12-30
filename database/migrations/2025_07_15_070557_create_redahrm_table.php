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
        Schema::create('redahrm', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->date('due_date');
            $table->date('complete_date')->nullable();
            $table->enum('status', ['Completed', 'Pending'])->default('Pending');
            $table->string('proofments')->nullable();
            $table->string('progress')->nullable();
            $table->string('file_path')->nullable(); // for uploaded file (pdf, word, etc.)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redahrm');
    }
};
