<?php

class PCD {

    protected $id;
    protected $cidade;
    protected $statusFuncionamento;
    protected $estado;

    public function __construct($id, $statusFuncionamento, $cidade, $estado) {
        $this->id = $id;
        $this->statusFuncionamento = $statusFuncionamento;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function getId() {
        return $this->id;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getStatusFuncionamento() {
        $status;
        if($this->statusFuncionamento==0){
            $status = "Inativo";
        }
        if($this->statusFuncionamento==1){
            $status = "Ativo";
        }
        return $status;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setStatusFuncionamento($statusFuncionamento) {
        $this->statusFuncionamento = $statusFuncionamento;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

}
