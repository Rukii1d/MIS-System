<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('redasecurityservices', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->date('due_date')->nullable();
            $table->date('complete_date')->nullable();
            $table->string('status')->default('Pending');
            $table->string('progress')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redasecurityservices');
    }
};

