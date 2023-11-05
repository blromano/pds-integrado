<?php

class dobras_cutaneas_usuarios{
    
    private  $dcu_codigo;
    private  $dcu_data_medidas;
    private  $dcu_valor;
    private  $fk_usu_cod;
    private  $fk_dbc_codigo;
    
    function getdcu_codigo (){return $this -> $dcu_codigo;}
    function setdcu_codigo($dcu_codigo){
    $this->dcu_codigo = $dcu_codigo;}
    
    function getdcu_data_medidas (){return $this -> $dcu_data_medidas;}
    function setdcu_data_medidas($dcu_data_medidas){
    $this->dcu_data_medidas = $dcu_data_medidas;}
    
    function getdcu_valor (){return $this -> $dcu_valor;}
    function setdcu_valor($dcu_valor){
    $this-> dcu_valor = $dcu_valor;}
    
    function getfk_usu_cod (){return $this -> $fk_usu_cod;}
    function setfk_usu_cod($fk_usu_cod){
    $this->fk_usu_cod = $fk_usu_cod;}
    
    function getfk_dbc_codigo (){return $this -> $fk_dbc_codigo;}
    function setfk_dbc_codigo($fk_dbc_codigo){
    $this->fk_dbc_codigo = $fk_dbc_codigo;}
    
    function __contruct(){} 
}
