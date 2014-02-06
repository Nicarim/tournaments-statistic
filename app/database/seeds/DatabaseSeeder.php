<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
        $this->call('TournamentsSeeder');
		// $this->call('UserTableSeeder');
	}


}
class TournamentsSeeder extends Seeder{
    public function run(){
        DB::table('tournaments')->delete();
        Tournament::create(array(
            "name" => "osu! Taiko World Cup 2014",
            "gamemode" => 1,
            "overview" => "Some markup\n====================\nand some smaller header\n----------------------- \n",
            "max_slots" => 16
        ));
    }
}