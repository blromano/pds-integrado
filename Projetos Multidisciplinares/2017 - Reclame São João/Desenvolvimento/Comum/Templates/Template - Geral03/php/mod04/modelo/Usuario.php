<?php

class Usuario {

    private $id;
    private $nome;
    private $senha;
    private $dataNascimento;
    private $email;
    private $numeroResidencia;
    private $rua;
    private $estado;
    private $cidade;
    private $statusAtivacao;
    private $dataAtivacao;
    private $NivelAcesso;
    private $codigoAtivacao;
    private $dataRecuperacaoSenha;
    private $poderesAdministradores;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $nome   
     * @param    $senha   
     * @param    $dataNascimento   
     * @param    $email   
     * @param    $numeroResidencia   
     * @param    $rua   
     * @param    $estado   
     * @param    $cidade   
     * @param    $statusAtivacao   
     * @param    $dataAtivacao   
     * @param    $NivelAcesso   
     * @param    $codigoAtivacao   
     * @param    $dataRecuperacaoSenha   
     * @param    $poderesAdministradores   
     */
    public function __construct($id, $nome, $senha, $dataNascimento, $email, $numeroResidencia, $rua, $estado, $cidade, $statusAtivacao, $dataAtivacao, $NivelAcesso, $codigoAtivacao, $dataRecuperacaoSenha, $poderesAdministradores)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
        $this->dataNascimento = $dataNascimento;
        $this->email = $email;
        $this->numeroResidencia = $numeroResidencia;
        $this->rua = $rua;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->statusAtivacao = $statusAtivacao;
        $this->dataAtivacao = $dataAtivacao;
        $this->NivelAcesso = $NivelAcesso;
        $this->codigoAtivacao = $codigoAtivacao;
        $this->dataRecuperacaoSenha = $dataRecuperacaoSenha;
        $this->poderesAdministradores = $poderesAdministradores;
    }
    
    

    public function getId() {
        return $this->id;
    }

    public function getNivelAcesso() {
        return $this->NivelAcesso;
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

    public function setNivelAcesso($NivelAcesso) {
        $this->NivelAcesso = $NivelAcesso;
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
