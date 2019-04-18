<?php

namespace App\Controller;

use App\Controller\FightController;

class GameController extends FightController
{
    
    private $attack = 10;
    private $heal = 10;
    private $shield = 10;
    private $magic = 10;

    


    public function setAttack($attack){
        return $this->setAttack($this->getHeal()-5);
    }

    public function getAttack(){
        return $this->attack;
    }

    public function setHeal($heal){
        $this->setHeal($this->getHeal()+5);
        return $this;
    }

    public function getHeal(){
        return $this->heal;
    }

    public function setShield($shield){
        $this->setShield($this->getHeal()-0);
        return $this;
    }

    public function getShield(){
        return $this->shield;
    }

    public function setMagic(){
        $this->setMagic($this->getHeal()-5);
        return $this;
    }

    public function getMagic(){
        return $this->magic;
    }
}
