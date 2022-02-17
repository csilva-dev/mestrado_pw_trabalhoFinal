
<?php 
namespace Entity;

class TakeAwayLinhas{
	
    private $uuid;

    public function getUuid(){
        return $this->uuid;
    }

    private $pratoUuid;

    public function getPratoUuid(){
        return $this->pratoUuid;
    }


    public function setPratoUuid($pratoUuid){
        $this->pratoUuid = $pratoUuid;
        return $this;
    }

    private $qtt;

    public function getQtt(){
        return $this->qtt;
    }


    public function setQtt($qtt){
        $this->qtt = $qtt;
        return $this;
    }

}