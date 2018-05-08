<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateLanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lanes', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('heats_id')->unsigned()->nullable();
	    $table->foreign('heats_id')->references('id')->on('heats');
	    $table->integer('events_id')->unsigned();
	    $table->foreign('events_id')->references('id')->on('events');
            $table->tinyInteger('lane_number')->unsigned();
            $table->integer('swimmers_id')->unsigned();
            $table->foreign('swimmers_id')->references('id')->on('swimmers');
            $table->integer('seed_time')->unsigned()->nullable();
            $table->integer('time')->unsigned()->nullable();
            $table->tinyInteger('position')->unsigned()->nullable();
            $table->tinyInteger('points')->unsigned()->nullable();
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
        Schema::dropIfExists('lanes');
    }
}
