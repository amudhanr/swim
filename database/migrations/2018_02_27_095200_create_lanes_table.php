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
	          $table->integer('heats_id')->unsigned();
	          $table->foreign('heats_id')->references('id')->on('heats');
            $table->tinyInteger('lane_number')->unsigned();
            $table->integer('swimmers_id')->unsigned();
            $table->foreign('swimmers_id')->references('id')->on('swimmers');
            $table->integer('seed_time')->unsigned();
            $table->integer('time')->unsigned();
            $table->tinyInteger('position')->unsigned();
            $table->tinyInteger('points')->unsigned();
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
