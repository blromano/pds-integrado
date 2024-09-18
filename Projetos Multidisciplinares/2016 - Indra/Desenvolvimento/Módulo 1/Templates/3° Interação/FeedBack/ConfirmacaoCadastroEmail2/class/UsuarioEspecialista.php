<?php

include_once "Usuario.php";

class UsuarioEspecialista extends Usuario {
    protected $id;
    protected $userId;
    protected $especializacao;
    protected $rg;
    protected $cpf;
    protected $especialistaId;

    public function getEspecializacao() {
        return $this->especializacao;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getUserId() {
        return $this->userId;
    }
    
    public function getRg() {
        return $this->rg;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getEspecialistaId() {
        return $this->especialistaId;
    }

    public function setId($id) {
        $this->id=$id;
    }
    
    public function setUserId($userId) {
        $this->userId=$userId;
    }
    
    public function setEspecializacao($especializacao) {
        $this->especializacao = $especializacao;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setEspecialistaId($especialistaId) {
        $this->especialistaId = $especialistaId;
    }

}

?>