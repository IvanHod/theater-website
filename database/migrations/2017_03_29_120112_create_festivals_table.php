<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('festivals', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name');
		    $table->string('picture');
		    $table->string('description');
		    $table->string('city');
		    $table->date('date_begin');
		    $table->date('date_end');
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
	    Schema::dropIfExists('festivals');
    }
}
