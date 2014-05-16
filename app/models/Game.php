<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 16.05.14
 * Time: 19:41
 */
class Group extends Eloquent{
    protected $table = "games";
    public function Match(){
        return $this->belongsTo("Match");
    }
    public function Players(){
        return $this->hasMany("Player");
    }

}