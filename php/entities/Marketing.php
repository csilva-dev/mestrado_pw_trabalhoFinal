
<?php 
namespace Entity;

class Marketing{
	
    private $uuid;

    public function getUuid(){
        return $this->uuid;
    }

    private $campanhaUuid;

    public function getCampanhaUuid(){
        return $this->campanhaUuid;
    }


    public function setCampanhaUuid($campanhaUuid){
        $this->campanhaUuid = $campanhaUuid;
        return $this;
    }

    private $emailTemplate;

    public function getEmailTemplate(){
        return $this->emailTemplate;
    }


    public function setEmailTemplate($emailTemplate){
        $this->emailTemplate = $emailTemplate;
        return $this;
    }

}