<?php

class Group extends Eloquent{
protected $table = 'groups';
    public function teams(){
        return $this->hasMany('Team')->orderBy('mw','desc')->orderBy('ml')->orderBy('gw','desc')->orderBy('gl')->orderBy('sdr','desc');
    }
    public function matches(){
        return $this->hasMany('Match');
    }
}