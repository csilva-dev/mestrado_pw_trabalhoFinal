
<?php 
namespace Entity;

class Menu{
	
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

    private $diaSemana;

    public function getDiaSemana(){
        return $this->diaSemana;
    }


    public function setDiaSemana($diaSemana){
        $this->diaSemana = $diaSemana;
        return $this;
    }

}