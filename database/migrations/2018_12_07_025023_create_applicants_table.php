<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->char('ruc', 11)->unique()->nullable();
            $table->char('cellphone_number', 9)->nullable();
            $table->enum('marital_status', ['S', 'C', 'D', 'V'])->nullable()->comment('S = SOLTERO(A), C = CASADO(A), D = DIVORCIADO(A), V = VIUDO(A)');
            $table->string('address')->nullable();	
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('province_id')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->char('tuition_number', 5)->unique()->nullable();
            $table->string('ffaa_file', 44)->nullable();	
            $table->string('disability_file', 44)->nullable();	
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('applicants');
    }
}
