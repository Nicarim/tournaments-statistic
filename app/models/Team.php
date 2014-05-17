<?php
/**
 * Created by PhpStorm.
 * User: Marcin
 * Date: 05.02.14
 * Time: 12:44
 */
class Team extends Eloquent{
    protected $table = 'teams';
    protected $guarded = array();
    public function matches_played(){
        return $this->matches_won + $this->matches_lost;
    }
}