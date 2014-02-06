<?php

class TournamentsController extends BaseController {
    private $cssGamemode = array(
        0 => "osu",
        1 => "taiko",
        2 => "ctb",
        3 => "mania"
    );
	public function Lists()
	{
        $tournaments = Tournament::all();
        return View::make('tournament/list')->with(array(
            'tournaments' => $tournaments,
            'gamemodecss' => $this->cssGamemode
        ));
	}
    public function View($id){
        $tournament = Tournament::find($id);
        return View::make('tournament/view')->with(array(
            'tournament' => $tournament,

        ));
    }
}
