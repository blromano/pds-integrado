<?php

class Usuario {

    private $id, $nome, $dataNascimento, $email, $numeroResidencia,
            $rua, $estado, $cidade, $statusAtivacao, $dataAtivacao,
            $codigoAtivacao, $dataRecuperacaoSenha, $poderesAdministradores;

    function __construct($id, $nome, $dataNascimento, $email, $numeroResidencia, $rua, $estado, $cidade, $statusAtivacao, $dataAtivacao, $codigoAtivacao, $dataRecuperacaoSenha, $poderesAdministradores) {
        $this->id = $id;
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->email = $email;
        $this->numeroResidencia = $numeroResidencia;
        $this->rua = $rua;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->statusAtivacao = $statusAtivacao;
        $this->dataAtivacao = $dataAtivacao;
        $this->codigoAtivacao = $codigoAtivacao;
        $this->dataRecuperacaoSenha = $dataRecuperacaoSenha;
        $this->poderesAdministradores = $poderesAdministradores;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getEmail() {
        return $this->email;
    }

    function getNumeroResidencia() {
        return $this->numeroResidencia;
    }

    function getRua() {
        return $this->rua;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getStatusAtivacao() {
        return $this->statusAtivacao;
    }

    function getDataAtivacao() {
        return $this->dataAtivacao;
    }

    function getCodigoAtivacao() {
        return $this->codigoAtivacao;
    }

    function getDataRecuperacaoSenha() {
        return $this->dataRecuperacaoSenha;
    }

    function getPoderesAdministradores() {
        return $this->poderesAdministradores;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setNumeroResidencia($numeroResidencia) {
        $this->numeroResidencia = $numeroResidencia;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setStatusAtivacao($statusAtivacao) {
        $this->statusAtivacao = $statusAtivacao;
    }

    function setDataAtivacao($dataAtivacao) {
        $this->dataAtivacao = $dataAtivacao;
    }

    function setCodigoAtivacao($codigoAtivacao) {
        $this->codigoAtivacao = $codigoAtivacao;
    }

    function setDataRecuperacaoSenha($dataRecuperacaoSenha) {
        $this->dataRecuperacaoSenha = $dataRecuperacaoSenha;
    }

    function setPoderesAdministradores($poderesAdministradores) {
        $this->poderesAdministradores = $poderesAdministradores;
    }

}
