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
    public function editSettings($id, $type){
        switch($type){
            case "overview":
                    $tournament = Tournament::find($id);
                    $data = array(
                        "prize_first" => Input::get("prizefirst"),
                        "prize_second" => Input::get("prizesecond"),
                        "prize_third" => Input::get("prizethird"),
                        "prize_other" => Input::get("prizeother"),
                        "description" => Input::get("description"),
                        "state" => Input::get("state")
                    );
                    $tournament->prize->first = $data['prize_first'];
                    $tournament->prize->second = $data['prize_second'];
                    $tournament->prize->third = $data['prize_third'];
                    $tournament->prize->other = $data['prize_other'];
                    $tournament->state = $data['state'];
                    $tournament->overview = $data['description'];
                    $tournament->push();
                break;
            case "stages":
                $tournament = Tournament::find($id);
                $data = array(
                    "name" => Input::get("stagename"),
                    "max_players" => Input::get("playersamount"),
                    "type" => Input::get("stagetype")
                );
                $stage = new Stage($data);
                $tournament->stages()->save($stage);
                break;
            case "groups":
                $tournament = Tournament::find($id);
                $data = array(
                    "stage_id" => Input::get('whichstage'),
                    "name" => Input::get('groupname')
                );
                $group = Group::firstOrNew($data);
                $group->save();
                break;
            case "teams":
                $tournament = Tournament::find($id);
                $group_id = Group::find(Input::get('whichgroup'))->Stage->id;
                $data = array(
                    "name" => Input::get('teamname'),
                    "group_id" => Input::get('whichgroup'),
                    "stage_id" => $group_id,
                );
                $team = Team::firstOrNew($data);
                $team->save();
                break;
            case "remove_stages":
                $stage = Stage::destroy($id);
                break;
        }
        return Redirect::back();
    }
    public function viewSettings($id){
        $tournament = Tournament::find($id);
        return View::make('options/settings')->with(array(
            "tournament" => $tournament
        ));
    }
    
    public function viewCreate(){
        return View::make('tournament/add');
    }
    
    public function useCreate(){
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
    public function viewResults($id){
        return View::make("tabs/results")->with("tournament", Tournament::find($id));
    }
    public function login($login, $password){
        $session = Auth::attempt(array(
               "username" => $login,
               "password" => $password
            ));
        if ($session)
            return Redirect::back();
        else
            return "damn, you hackey";
    }
}
