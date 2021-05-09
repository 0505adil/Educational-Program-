<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDisciplineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_disciplines', function (Blueprint $table) {

            $table->id();
            $table->BigInteger('student_id')->unsigned();

            $table->BigInteger('discipline_id')->unsigned();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');

            $table->boolean('approved')->nullable();
            $table->boolean('left')->nullable();
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
        Schema::dropIfExists('student_disciplines');
    }
}
