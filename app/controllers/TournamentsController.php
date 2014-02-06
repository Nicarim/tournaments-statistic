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
        $markdown = new Markdown;
        $overview = $markdown->render($tournament->overview);
        return View::make('tournament/view')->with(array(
            'tournament' => $tournament,
            'overview' => $overview,
        ));
    }
    public function rawOverview($id){
        return Tournament::find($id)->overview;
    }
    public function editOverview($id){
        $tournament = Tournament::find($id);
        $tournament->overview = Input::get("overview");
        $markdown = new Markdown;
        $output = $markdown->render($tournament->overview);
        $tournament->save();
        return $output;

    }
}