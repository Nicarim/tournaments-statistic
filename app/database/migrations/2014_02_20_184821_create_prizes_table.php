<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrizesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prizes', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('tournament_id');
            $table->text('first');
            $table->text('second');
            $table->text('third');
            $table->text('other');
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
		Schema::drop('prizes');
	}

}
