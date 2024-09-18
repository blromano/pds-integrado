<?php
class exercicios_grupos_musculares{
    
    private  $egm_codigo;
    private  $fk_efs_codigo;
    private  $fk_grm_codigo;
    
    function getegm_codigo (){return $this -> $egm_codigo;}
    function setegm_codigo($egm_codigo){
    $this->egm_codigo = $egm_codigo;}
    
    function getfk_efs_codigo (){return $this -> $fk_efs_codigo;}
    function setfk_efs_codigo($fk_efs_codigo){
    $this->fk_efs_codigo = $fk_efs_codigo;}
    
    function getfk_grm_codigo (){return $this -> $fk_grm_codigo;}
    function setfk_grm_codigo($fk_grm_codigo){
    $this->fk_grm_codigo = $fk_grm_codigo;}
    
    function __contruct(){} 
}

