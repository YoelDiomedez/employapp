<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('dni', 8)->unique();	
            $table->string('name');
            $table->string('paternal_surname');	
            $table->string('maternal_surname');
            $table->date('birth_date');
            $table->enum('gender', ['F', 'M'])->comment('F = FEMENINO, M = MASCULINO');
            $table->string('email')->unique();
            $table->string('profile_picture', 45)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('applying')->default(0)->comment('1 = POSTULANDO, 0 = DISPONIBLE');
            $table->rememberToken();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
    }
}
