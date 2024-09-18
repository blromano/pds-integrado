<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of USUARIOS
 *
 * @author jvcco
 */
class usuario {

    private $USU_CPF;
    private $USU_ENDERECO;
    private $USU_DATA_CADASTRO_ADM;
    private $USU_GENERO;
    private $USU_DATA_NASCIMENTO;
    private $USU_TELEFONE;
    private $USU_AVISOS;
    private $USU_NOME;
    private $USU_FOTO;
    private $USU_SENHA;
    private $USU_EMAIL;
    private $USU_TIPO;
    private $USU_CODIGO;
      function __construct() {
        
        
    }
    function getUSU_CPF() {
        return $this->USU_CPF;
    }

    function getUSU_ENDERECO() {
        return $this->USU_ENDERECO;
    }

    function getUSU_DATA_CADASTRO_ADM() {
        return $this->USU_DATA_CADASTRO_ADM;
    }

    function getUSU_GENERO() {
        return $this->USU_GENERO;
    }

    function getUSU_DATA_NASCIMENTO() {
        return $this->USU_DATA_NASCIMENTO;
    }

    function getUSU_TELEFONE() {
        return $this->USU_TELEFONE;
    }

    function getUSU_AVISOS() {
        return $this->USU_AVISOS;
    }

    function getUSU_NOME() {
        return $this->USU_NOME;
    }

    function getUSU_FOTO() {
        return $this->USU_FOTO;
    }

    function getUSU_SENHA() {
        return $this->USU_SENHA;
    }

    function getUSU_EMAIL() {
        return $this->USU_EMAIL;
    }

    function getUSU_TIPO() {
        return $this->USU_TIPO;
    }

    function getUSU_CODIGO() {
        return $this->USU_CODIGO;
    }

    function setUSU_CPF($USU_CPF) {
        $this->USU_CPF = $USU_CPF;
    }

    function setUSU_ENDERECO($USU_ENDERECO) {
        $this->USU_ENDERECO = $USU_ENDERECO;
    }

    function setUSU_DATA_CADASTRO_ADM($USU_DATA_CADASTRO_ADM) {
        $this->USU_DATA_CADASTRO_ADM = $USU_DATA_CADASTRO_ADM;
    }

    function setUSU_GENERO($USU_GENERO) {
        $this->USU_GENERO = $USU_GENERO;
    }

    function setUSU_DATA_NASCIMENTO($USU_DATA_NASCIMENTO) {
        $this->USU_DATA_NASCIMENTO = $USU_DATA_NASCIMENTO;
    }

    function setUSU_TELEFONE($USU_TELEFONE) {
        $this->USU_TELEFONE = $USU_TELEFONE;
    }

    function setUSU_AVISOS($USU_AVISOS) {
        $this->USU_AVISOS = $USU_AVISOS;
    }

    function setUSU_NOME($USU_NOME) {
        $this->USU_NOME = $USU_NOME;
    }

    function setUSU_FOTO($USU_FOTO) {
        $this->USU_FOTO = $USU_FOTO;
    }

    function setUSU_SENHA($USU_SENHA) {
        $this->USU_SENHA = $USU_SENHA;
    }

    function setUSU_EMAIL($USU_EMAIL) {
        $this->USU_EMAIL = $USU_EMAIL;
    }

    function setUSU_TIPO($USU_TIPO) {
        $this->USU_TIPO = $USU_TIPO;
    }

    function setUSU_CODIGO($USU_CODIGO) {
        $this->USU_CODIGO = $USU_CODIGO;
    }

        
    
    
}
