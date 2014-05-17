<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeatmapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('beatmaps', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("stage_id");
            $table->integer("beatmap_id");
            $table->string("artist");
            $table->string("title");
            $table->string("diff");
            $table->string("creator");
            $table->integer("max_score");
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
		Schema::drop('beatmaps');
	}

}
