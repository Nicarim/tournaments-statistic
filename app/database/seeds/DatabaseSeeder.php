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
        $tournament = Tournament::create(array(
            "name" => "osu! Taiko World Cup 2014",
            "gamemode" => 1,
            "overview" => "Some markup\n====================\nand some smaller header\n----------------------- \n",
            "max_slots" => 16,
        ));

        DB::table('prizes')->delete();
        Prize::create(array(
            "tournament_id" => $tournament->id,
            "first" => "osu!tablet, 6 months of supporter, profile badge",
            "second" => "2 months of supporter",
            "third" => "1 months of supporter",
        ));
        DB::table('users')->delete();
        User::create(array(
               "username" => "Marcin",
               "password" => Hash::make("randompassword")
            ));
    }
}