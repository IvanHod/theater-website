<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('collectives', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('picture');
		    $table->string('description');
		    $table->string('city');
		    $table->integer('count');
		    $table->integer('creator');
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
        Schema::dropIfExists('collectives');
    }
}
