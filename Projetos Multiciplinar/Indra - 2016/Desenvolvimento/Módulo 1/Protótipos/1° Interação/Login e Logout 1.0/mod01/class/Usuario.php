<?php

class Usuario {

    private $id, $nome, $senha, $dataNascimento, $email, $numeroResidencia,
            $rua, $estado, $cidade, $statusAtivacao, $dataAtivacao,
            $codigoAtivacao, $dataRecuperacaoSenha, $poderesAdministradores;

    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNumeroResidencia() {
        return $this->numeroResidencia;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getStatusAtivacao() {
        return $this->statusAtivacao;
    }

    public function getDataAtivacao() {
        return $this->dataAtivacao;
    }

    public function getCodigoAtivacao() {
        return $this->codigoAtivacao;
    }

    public function getDataRecuperacaoSenha() {
        return $this->dataRecuperacaoSenha;
    }

    public function getPoderesAdministradores() {
        return $this->poderesAdministradores;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function setNumeroResidencia($numeroResidencia) {
        $this->numeroResidencia = $numeroResidencia;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
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

    public function setPoderesAdministradores($poderesAdministradores) {
        $this->poderesAdministradores = $poderesAdministradores;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

}
