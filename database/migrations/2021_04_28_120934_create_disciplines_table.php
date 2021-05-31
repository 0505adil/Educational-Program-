<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->id();
            $table->string('title_kz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->string('code');
            $table->integer('credits');
            $table->integer('semestr');
            $table->integer('lectures');
            $table->integer('practises');
            $table->integer('labs');
            $table->BigInteger('rup_id')->unsigned()->nullable();
//            $table->unsignedBigInteger('edProgram_id');
//            $table->foreign('rup_id')->references('id')->on('r_u_p_s')->onDelete('cascade');
//            $table->unsignedBigInteger('disciplineComponent_id');
            $table->timestamps();

//            $table->index('edProgram_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplines');
    }
}
