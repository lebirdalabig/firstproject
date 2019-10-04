<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jerseynum');
            $table->string('fname');
            $table->string('lname');
            $table->bigInteger('teamid')->unsigned();
            $table->string('position');
            $table->string('srcimg');
            $table->timestamps();

            $table->foreign('teamid')
                  ->references('id')
                  ->on('teams')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
