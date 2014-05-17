<?php

class Stage extends Eloquent {
    protected $table = "stages";
	protected $guarded = array();
	public static $rules = array();
    public function tournament(){
        return $this->belongsTo("Tournament");
    }
    public function group(){
        return $this->hasMany("Group");
    }
    public function Matches(){
        return $this->hasMany("Match");
    }
}
