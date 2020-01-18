<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('degree_id');
            $table->unsignedInteger('country_id');
            $table->string('specialty', 60);
            $table->date('degree_date')->nullable();
            $table->string('college');
            $table->string('city');
            $table->string('degree_file', 44)->nullable();
            $table->enum('degree_status', ['E', 'T', 'C'])->nullable()->comment('E = ES EGRESADO, T = EN TRAMITE, C = ESTUDIO EN CURSO');
            $table->string('description')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('degree_id')->references('id')->on('degrees')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
        Schema::dropIfExists('education');
    }
}
