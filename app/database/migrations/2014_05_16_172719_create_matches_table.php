<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("group_id");
            $table->integer("stage_id");
            $table->integer("winning_team_id");
            $table->integer("losing_team_id");
            $table->integer("room_id");
            $table->integer("games_count");
            $table->float("score_difference")->default(0);
            $table->integer("loose_type")->default(0); //0 for normal loose (one team wins / one looses) and 1 for double loose (both team looses)
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
		Schema::drop('matches');
	}

}
