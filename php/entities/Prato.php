
<?php 
namespace Entity;

class Prato{
	
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

    private $descricao;

    public function getDescricao(){
        return $this->descricao;
    }


    public function setDescricao($descricao){
        $this->descricao = $descricao;
        return $this;
    }

    private $img;

    public function getImg(){
        return $this->img;
    }


    public function setImg($img){
        $this->img = $img;
        return $this;
    }

    private $categoriaUuid;

    public function getCategoriaUuid(){
        return $this->categoriaUuid;
    }


    public function setCategoriaUuid($categoriaUuid){
        $this->categoriaUuid = $categoriaUuid;
        return $this;
    }

    private $tipoUuid;

    public function getTipoUuid(){
        return $this->tipoUuid;
    }


    public function setTipoUuid($tipoUuid){
        $this->tipoUuid = $tipoUuid;
        return $this;
    }

    private $preco;

    public function getPreco(){
        return $this->preco;
    }


    public function setPreco($preco){
        $this->preco = $preco;
        return $this;
    }

    private $disponivelTake;

    public function getDisponivelTake(){
        return $this->disponivelTake;
    }


    public function setDisponivelTake($disponivelTake){
        $this->disponivelTake = $disponivelTake;
        return $this;
    }

}