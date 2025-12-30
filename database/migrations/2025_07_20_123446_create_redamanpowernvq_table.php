<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedamanpowernvqTable extends Migration
{
    public function up()
    {
        Schema::create('redamanpowernvq', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->date('due_date');
            $table->date('complete_date')->nullable();
            $table->enum('status', ['Completed', 'Pending']);
            $table->string('progress')->nullable();
            $table->string('file_path')->nullable();
            // $table->timestamps(); // Uncomment if you want created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('redamanpowernvq');
    }
}
