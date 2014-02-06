<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('tournaments', function($table){
            $table->increments('id');
            $table->integer('gamemode');
            $table->string('name');
            $table->text('overview');
            $table->integer('slots')->default(0);
            $table->integer('max_slots');
            $table->softDeletes();
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
        Schema::drop('tournaments');
	}

}
