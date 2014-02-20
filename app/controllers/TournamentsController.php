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
            'gamemodecss' => $this->cssGamemode
        ));
    }
    public function editSettings($id){
        $data = array(
          "prize_first" => Input::get("prizefirst"),
          "prize_second" => Input::get("prizesecond"),
          "prize_third" => Input::get("prizethird"),
          "prize_other" => Input::get("prizeother"),
          "description" => Input::get("description"),
          "state" => Input::get("state")
        );
        $tournament = Tournament::find($id);
        $tournament->prize->first = $data['prize_first'];
        $tournament->prize->second = $data['prize_second'];
        $tournament->prize->third = $data['prize_third'];
        $tournament->prize->other = $data['prize_other'];
        $tournament->state = $data['state'];
        $tournament->overview = $data['description'];
        $tournament->push();
        return Redirect::to('/view/'.$tournament->id);

    }
    
    public function viewCreate(){
    return View::make('tournament/add');    
    }
    
    public function useCreate(){
    /* return View::make('tournament/add'); */
    $data = array(
            "gamemode" => Input::get('gametype'),        
            "name" => Input::get('name'),
            "host" => Input::get('host'),
            "overview" => " ",
            "slots" => 0,
            "max_slots" => 16,
            "deleted_at" => NULL,
            "created_at" => time(),
            "updated_at" => time(),
        );
     $password = Input::get('password');
        
     if ($password == "woop"){
     
        $tourney = Tournament::create($data);
        Prize::create(array(
            "tournament_id" => $tourney->id
        ));
     }
     return Redirect::to('/list');
    }   
}
