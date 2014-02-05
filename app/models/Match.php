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

    public function wTeams(){
        return $this->hasMany('Team','id','wteam_id');
    }
    public function lTeams(){
        return $this->hasMany('Team','id','lteam_id');
    }

} 