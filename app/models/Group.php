<?php

class Group extends Eloquent{
    protected $table = 'groups';
    public function Stage(){
        return $this->belongsTo("Stage");
    }
}