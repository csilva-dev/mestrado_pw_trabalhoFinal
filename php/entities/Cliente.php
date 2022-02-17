<?php
//namespace Entity;

class Cliente{
	
    private $uuid;
    private $nome;
    private $morada;
    private $codPostal;
    private $localidade;
    private $nif;
    private $pais;
    private $userUuid;
    private $email;

    public function __construct(){
        $this->uuid = $this->uuid();
    }

    public function getUuid(){
        return $this->uuid;
    }

    public function setUuid($uuid){
        $this->uuid = $uuid;
        return $this->uuid;
    }


    public function getNome(){
        return $this->nome;
    }


    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }


    public function getMorada(){
        return $this->morada;
    }


    public function setMorada($morada){
        $this->morada = $morada;
        return $this;
    }


    public function getCodPostal(){
        return $this->codPostal;
    }


    public function setCodPostal($codPostal){
        $this->codPostal = $codPostal;
        return $this;
    }


    public function getLocalidade(){
        return $this->localidade;
    }


    public function setLocalidade($localidade){
        $this->localidade = $localidade;
        return $this;
    }


    public function getNif(){
        return $this->nif;
    }


    public function setNif($nif){
        $this->nif = $nif;
        return $this;
    }


    public function getPais(){
        return $this->pais;
    }


    public function setPais($pais){
        $this->pais = $pais;
        return $this;
    }


    public function getUserUuid(){
        return $this->userUuid;
    }


    public function setUserUuid($userUuid){
        $this->userUuid = $userUuid;
        return $this;
    }


    public function getEmail(){
        return $this->email;
    }


    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function __toString() {
        return $this->uuid + " | " +     $this->nome + " | " +     $this->morada + " | " +     $this->codPostal + " | " +     $this->localidade + " | " +     $this->nif + " | " +     $this->pais + " | " +     $this->userUuid + " | " +     $this->email ;
    }

    function uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}