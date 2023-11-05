<?php

class educadores_exercicios_fisicos{
    
    private  $tef_codigo;
    private  $tef_nome;
    
    function gettef_codigo (){return $this -> $tef_codigo;}
    function settef_codigo($tef_codigo){
    $this->tef_codigo = $tef_codigo;}
    
    function gettef_nome(){return $this -> $tef_nome;}
    function settef_nome($tef_nome){
    $this->tef_nome = $tef_nome;}
    
    function __contruct(){} 
}
