
<?php 
namespace Entity;

class Categoria{
	
    private $uuid;

    public function getUuid(){
        return $this->uuid;
    }

    private $nome;

    public function getNome(){
        return $this->nome;
    }


    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }

}