
<?php 
namespace Entity;

class Config{
	
    private $uuid;

    public function getUuid(){
        return $this->uuid;
    }

    private $maxMesas;

    public function getMaxMesas(){
        return $this->maxMesas;
    }


    public function setMaxMesas($maxMesas){
        $this->maxMesas = $maxMesas;
        return $this;
    }

    private $maxTakeAway;

    public function getMaxTakeAway(){
        return $this->maxTakeAway;
    }


    public function setMaxTakeAway($maxTakeAway){
        $this->maxTakeAway = $maxTakeAway;
        return $this;
    }

}