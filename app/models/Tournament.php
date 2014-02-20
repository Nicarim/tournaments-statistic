<?php

class Tournament extends Eloquent {
	protected $guarded = array();
    protected $table = "tournaments";
    public function groups(){
        return $this->hasMany('Group')->orderBy('tourneyid')->orderBy('id');
    }
    public function prize(){
        return $this->hasOne('Prize');
    }
	public static $rules = array();
}
