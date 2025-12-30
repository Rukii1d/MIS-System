<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedalanguagecenterTable extends Migration
{
    public function up()
    {
        Schema::create('redalanguagecenters', function (Blueprint $table) {
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

    public function down()
    {
        Schema::dropIfExists('redalanguagecenters');
    }
}
