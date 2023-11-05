<?php

class educadores_exercicios_fisicos{
    
    private  $fk_educadores_fisicos_edu_cref;
    private  $fk_exercicios_fisicos_exf_codigo;
    private  $eex_codigo;
    
    function getfk_educadores_fisicos_edu_cref (){return $this -> $fk_educadores_fisicos_edu_cref;}
    function setfk_educadores_fisicos_edu_cref($fk_educadores_fisicos_edu_cref){
    $this->fk_educadores_fisicos_edu_cref = $fk_educadores_fisicos_edu_cref;}
    
    function getfk_exercicios_fisicos_exf_codigo (){return $this -> $fk_exercicios_fisicos_exf_codigo;}
    function setfk_exercicios_fisicos_exf_codigo($fk_exercicios_fisicos_exf_codigo){
    $this->fk_exercicios_fisicos_exf_codigo = $fk_exercicios_fisicos_exf_codigo;}
    
    function geteex_codigo (){return $this -> $eex_codigo;}
    function seteex_codigo($eex_codigo){
    $this->eex_codigo = $eex_codigo;}
    
    function __contruct(){} 
}
?>