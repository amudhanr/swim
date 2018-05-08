<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateHeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('events_id')->unsigned();
            $table->foreign('events_id')->references('id')->on('events');
            $table->enum('type', ['Prelims', 'A-Final', 'Timed Finals'])->nullable();
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
        Schema::dropIfExists('heats');
    }
}
