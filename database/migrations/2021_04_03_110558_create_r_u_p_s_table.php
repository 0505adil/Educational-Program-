<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRUPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_u_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('disCycle');
            $table->string('disComponent');
//            $table->unsignedBigInteger('discipline_id');
            $table->date('fromDate');
            $table->date('toDate');
            $table->integer('edProgram_id');
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
        Schema::dropIfExists('r_u_p_s');
    }
}
