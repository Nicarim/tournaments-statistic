<?php

class Stage extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
    public function tournament(){
        return $this->belongsTo("Tourmnament");
    }
    public function group(){
        return $this->hasMany("Group");
    }
}
