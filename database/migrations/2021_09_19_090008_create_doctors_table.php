<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('id_doctor');
            $table->string('name_doctor');
            $table->string('doctor_email')->unique();
            $table->string('password')->default(Hash::make("password"));
            $table->date('doctor_date');
            $table->string('image');
            $table->tinyInteger('gender');
            $table->string('address');
            $table->string('phone');
            $table->tinyInteger('star');
            $table->string('doctor_degree');
            $table->string('doctor_export');
            $table->unsignedBigInteger('id_chuyenmon');
            $table->foreign('id_chuyenmon')->references('id_chuyenmon')->on('chuyenmon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor');
    }
}
