<?php

class fale_conosco {
private  $FAL_TITULO;
private  $FAL_NOME;
private  $FAL_TIPO_MENSAGEM;
private  $FAL_MENSAGEM;
private $FAL_EMAIL;
private $FAL_CODIGO;
private $USUARIO;
function getFAL_TITULO() {
    return $this->FAL_TITULO;
}

function getFAL_NOME() {
    return $this->FAL_NOME;
}

function getFAL_TIPO_MENSAGEM() {
    return $this->FAL_TIPO_MENSAGEM;
}

function getFAL_MENSAGEM() {
    return $this->FAL_MENSAGEM;
}

function getFAL_EMAIL() {
    return $this->FAL_EMAIL;
}

function getFAL_CODIGO() {
    return $this->FAL_CODIGO;
}

function getUSUARIO() {
    return $this->USUARIO;
}

function setFAL_TITULO($FAL_TITULO) {
    $this->FAL_TITULO = $FAL_TITULO;
}

function setFAL_NOME($FAL_NOME) {
    $this->FAL_NOME = $FAL_NOME;
}

function setFAL_TIPO_MENSAGEM($FAL_TIPO_MENSAGEM) {
    $this->FAL_TIPO_MENSAGEM = $FAL_TIPO_MENSAGEM;
}

function setFAL_MENSAGEM($FAL_MENSAGEM) {
    $this->FAL_MENSAGEM = $FAL_MENSAGEM;
}

function setFAL_EMAIL($FAL_EMAIL) {
    $this->FAL_EMAIL = $FAL_EMAIL;
}

function setFAL_CODIGO($FAL_CODIGO) {
    $this->FAL_CODIGO = $FAL_CODIGO;
}

function setUSUARIO($USUARIO) {
    $this->USUARIO = $USUARIO;
}

function __construct() {
    
}

}


