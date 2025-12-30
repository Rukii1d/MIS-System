<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedaSecurityServiceMembersTable extends Migration
{
    public function up()
    {
        Schema::create('reda_security_service_members', function (Blueprint $table) {
            $table->id();
            $table->string('etf_no')->unique();
            $table->string('fullname');
            $table->enum('gender', ['MALE', 'FEMALE']);
            $table->enum('nationality', ['SINHALA', 'TAMIL', 'ISLAMIC', 'CATHOLIC', 'CHRISTIAN']);
            $table->string('nic_no')->unique();
            $table->string('address');
            $table->string('workplace');
            $table->string('salary_bank_branch_no');
            $table->string('acc_no');
            $table->string('telephone');
            $table->string('picture')->nullable();
            $table->date('date_joined');
            $table->date('date_resigned')->nullable();
            $table->string('ds_division');
            $table->string('gn_division');
            $table->string('police_division');
            $table->enum('marital_status', ['UNMARRIED', 'MARRIED']);
            $table->string('spouse_name')->nullable();
            $table->integer('no_of_children')->default(0);
            $table->string('education_qualifications');
            $table->string('experience');
            $table->enum('position_category', ['LSO', 'SO', 'OIC']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reda_security_service_members');
    }
}
