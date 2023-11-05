<?php
class usuarios_treinamentos_prontos{
    
    private  $ptp_codigo;
    private  $fk_usuarios_usu_codigo;
    private  $fk_educadores_fisicos_fk_usuarios_usu_codigo;
    private  $ptp_dificuldade;
    private  $ptp_descricao;
    private  $ptp_duracao;
    private  $ptp_data_criacao;
    
    function getptp_codigo (){return $this -> $ptp_codigo;}
    function setptp_codigo($ptp_codigo){
    $this->ptp_codigo = $ptp_codigo;}
    
    function getfk_usuarios_usu_codigo (){return $this -> $fk_usuarios_usu_codigo;}
    function setfk_usuarios_usu_codigo($fk_usuarios_usu_codigo){
    $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;}
    
    function getptp_dificuldade (){return $this -> $ptp_dificuldade;}
    function setptp_dificuldade($ptp_dificuldade){
    $this->ptp_dificuldade = $ptp_dificuldade;}
    
    function getptp_descricao (){return $this -> $ptp_descricao;}
    function setptp_descricao($ptp_descricao){
    $this->ptp_descricao = $ptp_descricao;}
    
    function getptp_duracao (){return $this -> $ptp_duracao;}
    function setptp_duracao($ptp_duracao){
    $this->ptp_duracao = $ptp_duracao;}
    
    function getfk_educadores_fisicos_fk_usuarios_usu_codigo(){return $this -> $fk_educadores_fisicos_fk_usuarios_usu_codigo;}
    function setfk_educadores_fisicos_fk_usuarios_usu_codigo($fk_educadores_fisicos_fk_usuarios_usu_codigo){
    $this->fk_educadores_fisicos_fk_usuarios_usu_codigo = $fk_educadores_fisicos_fk_usuarios_usu_codigo;}
    
    function getptp_data_criacao (){return $this -> $ptp_data_criacao;}
    function setptp_data_criacao($ptp_data_criacao){
    $this->ptp_data_criacao = $ptp_data_criacao;}

    function __contruct(){} 
}