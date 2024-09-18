<?php

class Usuario {

 protected $id;
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
 protected $statusAtivacao;
 protected $dataAtivacao;
 protected $codigoAtivacao;
 protected $dataRecuperacaoSenha;
 protected $nivId;

//    public function __construct($id, $nome, $dataNascimento, $email, $numeroResidencia, $rua, $estado, $cidade, $cep, $statusAtivacao, $dataAtivacao, $codigoAtivacao, $dataRecuperacaoSenha, $poderesAdministradores) {
//        $this->id = $id;
//        $this->nome = $nome;
//        $this->dataNascimento = $dataNascimento;
//        $this->email = $email;
//        $this->numeroResidencia = $numeroResidencia;
//        $this->senha = $senha;
//        $this->cep = $cep;
//        $this->rua = $rua;
//        $this->estado = $estado;
//        $this->cidade = $cidade;
//        $this->statusAtivacao = $statusAtivacao;
//        $this->dataAtivacao = $dataAtivacao;
//        $this->codigoAtivacao = $codigoAtivacao;
//        $this->dataRecuperacaoSenha = $dataRecuperacaoSenha;
//        $this->poderesAdministradores = $poderesAdministradores;
//    }

    public function getId() {//1
        return $this->id;
    }

    public function getNivId() {//2
        return $this->nivId;
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

    public function getStatusAtivacao() {//11
        return $this->statusAtivacao;
    }

    public function getDataAtivacao() {//12
        return $this->dataAtivacao;
    }

    public function getCodigoAtivacao() {//13
        return $this->codigoAtivacao;
    }

    public function getDataRecuperacaoSenha() {//14
        return $this->dataRecuperacaoSenha;
    }

    public function getComplemento(){//16
        return $this->complemento;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNivId($nivId) {
        $this->nivId = $nivId;
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

    public function setStatusAtivacao($statusAtivacao) {
        $this->statusAtivacao = $statusAtivacao;
    }

    public function setDataAtivacao($dataAtivacao) {
        $this->dataAtivacao = $dataAtivacao;
    }

    public function setCodigoAtivacao($codigoAtivacao) {
        $this->codigoAtivacao = $codigoAtivacao;
    }

    public function setDataRecuperacaoSenha($dataRecuperacaoSenha) {
        $this->dataRecuperacaoSenha = $dataRecuperacaoSenha;
    }

}
