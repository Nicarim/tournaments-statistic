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
        $key = "459fc9f4860d2966cd935c9ecd66d7caf5bf9f13";
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
            case "add_match":
                $tournament = Tournament::find($id);
                $data = array(
                    "room_id" => Input::get("matchid"),
                    "group_id" => Input::get("group_id"),
                    "stage_id" => Input::get("stage_id"),
                );
                $skipIds = explode(',', Input::get("skipid"));
                $requesturl = "https://osu.ppy.sh/api/get_match?k=".$key."&mp=".$data['room_id'];
                $request = file_get_contents($requesturl);
                $json = json_decode($request);
                $match = Match::firstOrCreate($data);
                preg_match_all("/\(([^)]+)\)/", $json->match->name, $nameRegex);
                $teamAName = $nameRegex[1][0];
                $teamBName = $nameRegex[1][1];
                $teamAModel = Team::firstOrCreate(array(
                    "name" => $teamAName,
                    "group_id" => $data['group_id']
                ));
                $teamBModel = Team::firstOrCreate(array(
                        "name" => $teamBName,
                        "group_id" => $data['group_id']
                    ));
                //$teamAModel = Team::where("name", $teamAName)->where("group_id", $data['group_id'])->first();
                //$teamBModel = Team::where("name", $teamBName)->where("group_id", $data['group_id'])->first();
                $teamAwinCount = 0;
                $teamBWinCount = 0;
                $sdr = 0;
                foreach ($json->games as $key => $game)
                {
                    if (in_array($key, $skipIds))
                        continue;
                    $beatmapId = $game->beatmap_id;
                    $teamAScore = 0;
                    $teamBScore = 0;
                    foreach ($game->scores as $score)
                    {
                        if ($score->team == 1)
                            $teamAScore += $score->score;
                        if ($score->team == 2)
                            $teamBScore += $score->score;
                    }

                    if ($teamAScore > $teamBScore)
                    {
                        $winningTeam = $teamAModel;
                        $teamAwinCount += 1;
                    }
                    else
                    {
                        $winningTeam = $teamBModel;
                        $teamBWinCount += 1;
                    }
                    $beatmapModel = Beatmap::where("beatmap_id", $beatmapId)->where("stage_id", $data['stage_id'])->first();
                    $difference = abs($teamAScore - $teamBScore) / $beatmapModel->max_score;
                    $gameModel = Game::firstOrNew(array(
                            "match_id" => $match->id,
                            "teamA_id" => $teamAModel->id,
                            "teamB_id" => $teamBModel->id,
                            "teamA_score" => $teamAScore,
                            "teamB_score" => $teamBScore,
                            "winning_team_id" => $winningTeam->id,
                            "score_difference" => $difference,
                            "beatmap_id" => $beatmapId
                        ));
                    $sdr += $difference;
                    $gameModel->save();
                }
                if ($teamAwinCount > $teamBWinCount)
                {
                    $match->winning_team_id = $teamAModel->id;
                    $match->losing_team_id = $teamBModel->id;
                    $match->games_count = $teamAwinCount + $teamBWinCount;
                    $teamAModel->matches_won += 1;
                    $teamBModel->matches_lost += 1;
                    $teamAModel->score_difference += $sdr;
                    $teamBModel->score_difference -= $sdr;
                }
                else
                {
                    $match->winning_team_id = $teamBModel->id;
                    $match->losing_team_id = $teamAModel->id;
                    $match->games_count = $teamAwinCount + $teamBWinCount;
                    $teamAModel->matches_lost += 1;
                    $teamBModel->matches_won += 1;
                    $teamAModel->score_difference -= $sdr;
                    $teamBModel->score_difference += $sdr;
                }
                $teamAModel->games_won += $teamAwinCount;
                $teamBModel->games_lost += $teamAwinCount;
                $teamAModel->games_lost += $teamBWinCount;
                $teamBModel->games_won += $teamBWinCount;
                $match->score_difference = $sdr;
                $match->save();
                $teamAModel->save();
                $teamBModel->save();
                break;
            case "remove_match":
                $data = array(
                    "match_id" => Input::get("match_id")
                );
                $match = Match::find($data['match_id']);
                $teamAModel = Team::find($match->winning_team_id);
                $teamBModel = Team::find($match->losing_team_id);
                $games = Game::where("match_id", $match->id)->get();
                $teamAModel->matches_won -= 1;
                $teamBModel->matches_lost -= 1;
                $teamAModel->score_difference -= $match->score_difference;
                $teamBModel->score_difference += $match->score_difference;
                foreach($games as $game)
                {
                    if ($game->winning_team_id == $teamAModel->id)
                    {
                        $teamAModel->games_won -= 1;
                        $teamBModel->games_lost -= 1;
                    }
                    elseif ($game->winning_team_id == $teamBModel->id)
                    {
                        $teamBModel->games_won -= 1;
                        $teamAModel->games_lost -= 1;
                    }
                    $game->delete();
                }
                $match->delete();
                $teamAModel->save();
                $teamBModel->save();
                break;
            case "default_win":
                $data = Input::all();
                $match = Match::firstOrNew(array(
                       "group_id" => $data['group_id'],
                       "stage_id" => $data['stage_id'],
                       "games_count" => 4,
                       "winning_team_id" => $data['winningteam'],
                       "losing_team_id" => $data['losingteam'],
                       "room_id" => $data['match_id'],
                       "score_difference" => 2.5
                    ));
                $match->save();
                $teamAModel = Team::find($data['winningteam']);
                $teamBModel = Team::find($data['losingteam']);
                $teamAModel->games_won += 4;
                $teamBModel->games_lost += 4;
                $teamAModel->matches_won += 1;
                $teamBModel->matches_lost += 1;
                $teamAModel->score_difference += 2.5;
                $teamBModel->score_difference -= 2.5;
                $teamAModel->save();
                $teamBModel->save();
                break;
            case "beatmaps":
                $data = array(
                    "beatmap_id" => Input::get("beatmapid"),
                    "stage_id" => Input::get("whichstage"),
                    "max_score" => Input::get("beatmapsscore"),
                );
                $requesturl = "https://osu.ppy.sh/api/get_beatmaps?k=".$key."&b=".$data['beatmap_id'];
                $request = file_get_contents($requesturl);
                $json = json_decode($request)[0];
                $beatmapModel = Beatmap::firstOrNew($data);
                $beatmapModel->creator = $json->creator;
                $beatmapModel->title = $json->title;
                $beatmapModel->artist = $json->artist;
                $beatmapModel->diff = $json->version;
                $beatmapModel->save();
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
