<?php

class Feedbacks {
    
    private $FEE_ID;
    private $FEE_ASSUNTO;
    private $FEE_EMAIL;
    private $FEE_MENSAGEM;
    
    public function getFEE_ID() {
        return $this->FEE_ID;
    }

    public function getFEE_ASSUNTO() {
        return $this->FEE_ASSUNTO;
    }

    public function getFEE_EMAIL() {
        return $this->FEE_EMAIL;
    }

    public function getFEE_MENSAGEM() {
        return $this->FEE_MENSAGEM;
    }

    public function setFEE_ID($FEE_ID){
        $this->FEE_ID = $FEE_ID;
    }

    public function setFEE_ASSUNTO($FEE_ASSUNTO){
        $this->FEE_ASSUNTO = $FEE_ASSUNTO;
    }

    public function setFEE_EMAIL($FEE_EMAIL){
        $this->FEE_EMAIL = $FEE_EMAIL;
    }

    public function setFEE_MENSAGEM($FEE_MENSAGEM){
        $this->FEE_MENSAGEM = $FEE_MENSAGEM;
    }

}
