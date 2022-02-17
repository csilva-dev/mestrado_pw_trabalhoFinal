
<?php 
namespace Entity;

class Reservas{
	
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

    private $periodo;

    public function getPeriodo(){
        return $this->periodo;
    }


    public function setPeriodo($periodo){
        $this->periodo = $periodo;
        return $this;
    }

    private $mesa;

    public function getMesa(){
        return $this->mesa;
    }


    public function setMesa($mesa){
        $this->mesa = $mesa;
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

}