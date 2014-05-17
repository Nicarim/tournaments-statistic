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
            $table->integer("matches_won")->default(0);
            $table->integer("matches_lost")->default(0);
            $table->integer("games_won")->default(0);
            $table->integer("games_lost")->default(0);
            $table->float("score_difference")->default(0);
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
