<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedaprocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('redaprocuments', function (Blueprint $table) {
            $table->id();
            $table->string('task'); // You can change this to 'title' if preferred
            $table->date('due_date');
            $table->date('complete_date')->nullable();
            $table->string('status')->default('Pending');
            $table->string('progress')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('redaprocuments');
    }
}
