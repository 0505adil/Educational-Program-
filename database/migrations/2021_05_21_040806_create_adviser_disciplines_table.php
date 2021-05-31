<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdviserDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviser_disciplines', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('adviser_id')->unsigned();

            $table->BigInteger('discipline_id')->unsigned();

            $table->foreign('adviser_id')->references('id')->on('advisers')->onDelete('cascade');

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
        Schema::dropIfExists('adviser_disciplines');
    }
}
