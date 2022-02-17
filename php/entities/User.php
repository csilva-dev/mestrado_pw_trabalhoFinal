<?php
//namespace Entity;

class User{
	
    private $uuid;
    private $username;
    private $password;
    private $role;
    private $dtRegisto;
    private $lingua;

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

    public function getUsername(){
        return $this->username;
    }


    public function setUsername($username){
        $this->username = $username;
        return $this;
    }

    public function getPassword(){
        return $this->password;
    }


    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function getRole(){
        return $this->role;
    }


    public function setRole($role){
        $this->role = $role;
        return $this;
    }

    public function getDtRegisto(){
        return $this->dtRegisto;
    }


    public function setDtRegisto($dtRegisto){
        $this->dtRegisto = $dtRegisto;
        return $this;
    }

    public function getLingua(){
        return $this->lingua;
    }


    public function setLingua($lingua){
        $this->lingua = $lingua;
        return $this;
    }

    public function __toString() {
        return "$this->uuid - $this->username - $this->password - $this->role - $this->dtRegisto - $this->lingua";
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