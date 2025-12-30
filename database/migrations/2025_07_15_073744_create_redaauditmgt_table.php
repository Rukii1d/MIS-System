<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedaauditmgtTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('redaauditmgts', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->date('due_date');
            $table->date('complete_date')->nullable();
            $table->enum('status', ['Completed', 'Pending']);
            $table->string('progress')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redaauditmgts');
    }
}
