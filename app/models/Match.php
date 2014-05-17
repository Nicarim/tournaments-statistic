<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 05.02.14
 * Time: 18:28
 */

class Match extends Eloquent{
    protected $table = "matches";
    protected $guarded = array("id");

    /*public function wTeam(){
        return $this->hasOne('Team','id','wteam_id');
    }
    public function lTeam(){
        return $this->hasOne('Team','id','lteam_id');
    }*/
    public function Group(){
        return $this->belongsTo("Group");
    }
    public function Stage(){
        return $this->belongsTo("Stage");
    }
    public function wTeam(){
        return $this->hasOne("Team", "id", "winning_team_id");
    }
    public function lTeam(){
        return $this->hasOne("Team", "id", "losing_team_id");
    }

} 