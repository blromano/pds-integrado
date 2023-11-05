<?php
class medidas_corporais_usuarios{
    
    private  $mcu_codigo;
    private  $mcu_valor;
    private  $mcu_data_medidas;
    private  $fk_usu_cod;
    private  $fk_mec_codigo;
    
    function getmcu_codigo (){return $this -> $mcu_codigo;}
    function setmcu_codigo($mcu_codigo){
    $this->mcu_codigo = $mcu_codigo;}
    
    function getmcu_data_medidas (){return $this -> $mcu_data_medidas;}
    function setmcu_data_medidas($mcu_data_medidas){
    $this->mcu_data_medidas = $mcu_data_medidas;}
    
    function getmcu_valor (){return $this -> $mcu_valor;}
    function setmcu_valor($mcu_valor){
    $this-> mcu_valor = $mcu_valor;}
    
    function getfk_usu_cod (){return $this -> $fk_usu_cod;}
    function setfk_usu_cod($fk_usu_cod){
    $this->fk_usu_cod = $fk_usu_cod;}
    
    function getfk_mec_codigo (){return $this -> $fk_mec_codigo;}
    function setfk_mec_codigo($fk_mec_codigo){
    $this->fk_mec_codigo = $fk_mec_codigo;}
    
    function __contruct(){} 
}


