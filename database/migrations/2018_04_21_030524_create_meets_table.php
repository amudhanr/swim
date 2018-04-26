<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('meets', function (Blueprint $table) {
            $table->increments('id')->nullable();
	    $table->string('name');
            $table->date('start_date')->nullable();
	    $table->date('end_date')->nullable();
	    $table->integer('hosts_id')->unsigned();
	    $table->foreign('hosts_id')->references('id')->on('hosts');
	    $table->string('slug', 50)->nullable();
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
        Schema::dropIfExists('meets');
    }
}
