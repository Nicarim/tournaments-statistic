<?php

class Tournament extends Eloquent {
	protected $guarded = array();
    protected $table = "tournaments";
    public function prize(){
        return $this->hasOne('Prize');
    }
    public function stages(){
        return $this->hasMany('Stage');
    }
    public function groupStages(){
        return $this->hasMany('Stage')->where('type', '0');
    }
	public static $rules = array();
}
