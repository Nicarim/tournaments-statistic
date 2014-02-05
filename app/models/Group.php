<?php

class Group extends Eloquent{
protected $table = 'groups';
    public function teams(){
        return $this->hasMany('Team');
    }
}