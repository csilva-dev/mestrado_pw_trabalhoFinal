
<?php 
namespace Entity;

class Trafego{
	
    private $uuid;

    public function getUuid(){
        return $this->uuid;
    }

    private $origem;

    public function getOrigem(){
        return $this->origem;
    }


    public function setOrigem($origem){
        $this->origem = $origem;
        return $this;
    }

    private $origemIp;

    public function getOrigemIp(){
        return $this->origemIp;
    }


    public function setOrigemIp($origemIp){
        $this->origemIp = $origemIp;
        return $this;
    }

    private $data;

    public function getData(){
        return $this->data;
    }


    public function setData($data){
        $this->data = $data;
        return $this;
    }

}