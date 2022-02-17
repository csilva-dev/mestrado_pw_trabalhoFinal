
<?php 
namespace Entity;

class TakeAway{
	
    private $uuid;

    public function getUuid(){
        return $this->uuid;
    }

    private $data;

    public function getData(){
        return $this->data;
    }


    public function setData($data){
        $this->data = $data;
        return $this;
    }

    private $clienteUuid;

    public function getClienteUuid(){
        return $this->clienteUuid;
    }


    public function setClienteUuid($clienteUuid){
        $this->clienteUuid = $clienteUuid;
        return $this;
    }

    private $takeAwayLinhasUuid;

    public function getTakeAwayLinhasUuid(){
        return $this->takeAwayLinhasUuid;
    }


    public function setTakeAwayLinhasUuid($takeAwayLinhasUuid){
        $this->takeAwayLinhasUuid = $takeAwayLinhasUuid;
        return $this;
    }

}