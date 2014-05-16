<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("group_id");
            $table->integer("stage_id");
            $table->integer("matches_won");
            $table->integer("matches_lost");
            $table->integer("games_won");
            $table->integer("games_lost");
            $table->float("score_difference");
            $table->string("name");
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
		Schema::drop('teams');
	}

}
