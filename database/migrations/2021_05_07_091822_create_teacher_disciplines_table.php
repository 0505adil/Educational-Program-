<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_disciplines', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('teacher_id')->unsigned();

            $table->BigInteger('discipline_id')->unsigned();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');

            $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');

            $table->integer('course')->nullable();
            $table->unsignedBigInteger('gr_id')->nullable();
            $table->integer('fromDate')->nullable();
            $table->integer('toDate')->nullable();
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
        Schema::dropIfExists('teacher_disciplines');
    }
}
