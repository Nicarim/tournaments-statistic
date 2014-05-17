<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 07.02.14
 * Time: 22:45
 */

class Beatmap extends Eloquent{
    protected $table = "beatmaps";
    protected $guarded = array("id");
    public function fullName(){
        return $this->artist." - ".$this->title." [".$this->diff."] by ".$this->creator;
    }
}