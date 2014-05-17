<?php

class Group extends Eloquent{
    protected $table = 'groups';
    protected $guarded = array();
    public function Stage(){
        return $this->belongsTo("Stage");
    }
    public function teams(){
        return $this->hasMany("Team");
    }
}