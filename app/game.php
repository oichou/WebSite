<?php

namespace App;

class Game
{
  private $winner;
  private $try;



  public function __construct($oldgame){
    if($oldgame){
      $this->winner = $oldgame->winner;
      $this->try    = $oldgame->try;
    }
  }
  public function getWinner(){
    return $this->winner;
  }
  public function getTry(){
    return $this->try;
  }
  public function setWinner($val){
    $this->winner = $val;
  }
  public function setTry($nb){
    $this->try = $nb;
  }

}
