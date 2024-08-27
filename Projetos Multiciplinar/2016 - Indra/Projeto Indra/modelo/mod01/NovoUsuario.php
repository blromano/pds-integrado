<<?php

class NovoUsuario {


 protected $nome;
 protected $dataNascimento;
 protected $email;
 protected $senha;
 protected $numeroResidencia;
 protected $cep;
 protected $rua;
 protected $complemento;
 protected $estado;
 protected $cidade;
 protected $poderesAdministradores;
 protected $nivId;


    public function getId() {//1
        return $this->id;
    }

    public function getNome() {//2
        return $this->nome;
    }

    public function getDataNascimento() {//3
        return $this->dataNascimento;
    }

    public function getSenha(){//4
        return $this->senha;
    }

    public function getEmail() {//5
        return $this->email;
    }

    public function getNumeroResidencia() {//6
        return $this->numeroResidencia;
    }

    public function getRua() {//7
        return $this->rua;
    }

    public function getEstado() {//8
        return $this->estado;
    }

    public function getCidade() {//9
        return $this->cidade;
    }
    public function getCep() {//10
        return $this->cep;
    }

    

    public function getPoderesAdministradores() {//15
        return $this->poderesAdministradores;
    }
    public function getComplemento(){//16
        return $this->complemento;
    }

   

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setNumeroResidencia($numeroResidencia) {
        $this->numeroResidencia = $numeroResidencia;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }
    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
 
    public function setPoderesAdministradores($poderesAdministradores) {
        $this->poderesAdministradores = $poderesAdministradores;
    }

}


