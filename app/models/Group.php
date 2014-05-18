<?php

class Group extends Eloquent{
    protected $table = 'groups';
    protected $guarded = array();
    public function Stage(){
        return $this->belongsTo("Stage");
    }
    public function teams(){
        return $this->hasMany("Team")->orderBy("matches_won", "desc")->orderBy("games_won", "desc")->orderBy("score_difference", "desc");
    }
    public function Matches(){
        return $this->hasMany("Match")->orderBy("updated_at", "desc");
    }
}