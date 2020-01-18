<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('position');
            $table->string('bases', 44)->nullable();
            $table->string('annexes', 44)->nullable();
            $table->string('partial_results', 44)->nullable();
            $table->string('final_results', 44)->nullable();
            $table->unsignedTinyInteger('state')->default(1)->comment('1 = EN PROCESO, 0 = FINALIZADO');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('announcements');
    }
}
