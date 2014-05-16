<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 16.05.14
 * Time: 20:02
 */
class Player extends Eloquent{
    protected $table = "players";
    public function Team(){
        return $this->belongsTo("Team");
    }
    public function Game(){
        return $this->belongsTo("Game");
    }
}