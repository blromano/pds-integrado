<?php
class educadores_exercicios_fisicos{
    
    private  $fk_usuarios_fisicos_usu_cpf;
    private  $fk_exercicios_fisicos_exf_codigo;
    private  $usu_gef_codigo;
    
    function getfk_usuarios_fisicos_usu_cpf (){return $this -> $fk_usuarios_fisicos_usu_cpf;}
    function setfk_usuarios_fisicos_usu_cpf($fk_usuarios_fisicos_usu_cpf){
    $this->fk_usuarios_fisicos_usu_cpf = $fk_usuarios_fisicos_usu_cpf;}
    
    function getfk_exercicios_fisicos_exf_codigo (){return $this -> $fk_exercicios_fisicos_exf_codigo;}
    function setfk_exercicios_fisicos_exf_codigo($fk_exercicios_fisicos_exf_codigo){
    $this->fk_exercicios_fisicos_exf_codigo = $fk_exercicios_fisicos_exf_codigo;}
    
    function getusu_gef_codigo (){return $this -> $usu_gef_codigo;}
    function setusu_gef_codigo($usu_gef_codigo){
    $this->usu_gef_codigo = $usu_gef_codigo;}
    
    function __contruct(){} 
}

