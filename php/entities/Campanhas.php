
<?php 
namespace Entity;

class Campanhas{
	
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

    private $inicio;

    public function getInicio(){
        return $this->inicio;
    }


    public function setInicio($inicio){
        $this->inicio = $inicio;
        return $this;
    }

    private $fim;

    public function getFim(){
        return $this->fim;
    }


    public function setFim($fim){
        $this->fim = $fim;
        return $this;
    }

    private $desconto;

    public function getDesconto(){
        return $this->desconto;
    }


    public function setDesconto($desconto){
        $this->desconto = $desconto;
        return $this;
    }

    private $oferta;

    public function getOferta(){
        return $this->oferta;
    }


    public function setOferta($oferta){
        $this->oferta = $oferta;
        return $this;
    }

    private $ofertaPratoUuid;

    public function getOfertaPratoUuid(){
        return $this->ofertaPratoUuid;
    }


    public function setOfertaPratoUuid($ofertaPratoUuid){
        $this->ofertaPratoUuid = $ofertaPratoUuid;
        return $this;
    }

    private $ofertaPratoPreco;

    public function getOfertaPratoPreco(){
        return $this->ofertaPratoPreco;
    }


    public function setOfertaPratoPreco($ofertaPratoPreco){
        $this->ofertaPratoPreco = $ofertaPratoPreco;
        return $this;
    }

}