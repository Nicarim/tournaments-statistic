<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    public $apikey = "459fc9f4860d2966cd935c9ecd66d7caf5bf9f13";
	public function showStats(){
        $groups = Group::all();
		return View::make('index')->with('groups',$groups);
	}
    public function addStats(){
        $data = array(
            "matcheslist" => Input::get('matches'),
            "ignored" => Input::get('ignored_matches'),
            "password" => Input::get('password')
        );
        if ($data['password'] == "kanapkipo6"){
            $matches = explode(',',$data['matcheslist']);
            $ignmatches = explode(',',$data['ignored']);
            $jsondata = json_decode(file_get_contents("https://osu.ppy.sh/api/get_match?k=".$this->apikey."&mp=".$matches[0]));
            $matchinfo = array(
                "matchname" => explode(':',$jsondata->match->name)[0],
                "teamA" => substr(explode('vs',explode(':',$jsondata->match->name)[1])[0],1),
                "teamB" => substr(explode('vs',explode(':',$jsondata->match->name)[1])[1],1)
            );
            $teamA = Team::where('team_name',$matchinfo['teamA'])->first();
            $teamB = Team::where('team_name',$matchinfo['teamB'])->first();
            $teamA->played += 1; //add 1 played matches overall (since they did play right?)
            $teamB->played += 1; // for both teams
            $teamAwon = 0; // their won matches
            $teamBwon = 0; // ^
            $sdr = 0.00; // unused, TO-DO: add max score for each beatmap
            $gameKey = 0; //defines match key which will be iterated over every played match, used for ignoring certain matches in case of nullify
            foreach($matches as $key => $match){
                $localjsondata = json_decode(file_get_contents("https://osu.ppy.sh/api/get_match?k=".$this->apikey."&mp=".$match)); // get match data for each match played (in case of multi matches because of... something
                foreach($localjsondata->games as $game){ // iterate over every game played... within match
                    if (!in_array($gameKey,$ignmatches)){
                        $teamAscore = 0; // their overall score for whole match
                        $teamBscore = 0; // ^
                        foreach($game->scores as $score){ // iterating over each score, used for calculations
                            if ($score->pass == 1){
                                if ($score->team == 1)
                                    $teamAscore += $score->score;
                                elseif ($score->team == 2)
                                    $teamBscore += $score->score;
                            }
                        }
                        if ($teamAscore > $teamBscore)
                            $teamAwon += 1;
                        elseif ($teamAscore < $teamBscore)
                            $teamBwon += 1;
                        else
                            return "what the fuck?";

                        //need to add SDR here
                        try{
                        $beatmap = Beatmap::where("beatmap_id",$game->beatmap_id)->first();
                        $sdr += round(($teamAscore - $teamBscore) / $beatmap->maxscore,3);
                        }catch (Exception $e){
                            return $game->beatmap_id;
                        }

                    }
                    $gameKey++;
                }
            }
            if ($teamAwon > $teamBwon)
            {
                $matchModel = new Match;
                $matchModel->group_id = $teamA->group_id;
                $matchModel->wteam_id = $teamA->id;
                $matchModel->lteam_id = $teamB->id;
                $matchModel->room_id = $data['matcheslist'];
                $matchModel->sdr = $sdr;
                $matchModel->save();
                $teamA->mw += 1;//won matches by A
                $teamB->ml += 1;//lost matches by opposite team
                $teamA->gw += $teamAwon;//games won by A
                $teamB->gl += $teamAwon;//lost games by opposite team
                $teamA->sdr += $sdr;
                $teamB->sdr += -($sdr);

            }elseif($teamAwon < $teamBwon){
                $matchModel = new Match;
                $matchModel->group_id = $teamB->group_id;
                $matchModel->wteam_id = $teamB->id;
                $matchModel->lteam_id = $teamA->id;
                $matchModel->room_id = $data['matcheslist'];
                $matchModel->sdr = $sdr;
                $matchModel->save();
                $teamB->mw += 1;//won matches by A
                $teamA->ml += 1;//lost matches by opposite team
                $teamB->gw += $teamBwon;//games won by A
                $teamA->gl += $teamBwon;//lost games by opposite team
                $teamB->sdr += $sdr;//lost games by opposite team
                $teamA->sdr += -($sdr);//lost games by opposite team
            }
            $teamA->save(); //save both teams
            $teamB->save(); //^
        }

        return Redirect::to('/');
    }
}