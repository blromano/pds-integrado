<?php

class UsuarioInstituicao {

    protected $userId;
    protected $id;
    protected $razaoSocial;
    protected $nomeFantasia;
    protected $cnpj;

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getRazaoSocial() {
        return $this->razaoSocial;
    }

    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setRazaoSocial($razaoSocial) {
        $this->razaoSocial = $razaoSocial;
    }

    public function setNomeFantasia($nomeFantasia) {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

}
