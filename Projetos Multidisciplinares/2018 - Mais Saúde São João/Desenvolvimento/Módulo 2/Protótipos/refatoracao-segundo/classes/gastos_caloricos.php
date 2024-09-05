<?php
class gastos_caloricos{
    
    private  $hgc_dt_registro;
    private  $hgc_gasto;
    private  $hgc_codigo;
    private  $fk_efs_codigo;
    private  $fk_usu_cod;
      
    function gethgc_dt_registro (){return $this -> $hgc_dt_registro;}
    function sethgc_dt_registro($hgc_dt_registro){
    $this->hgc_dt_registro = $hgc_dt_registro;}
    
    function gethgc_gasto (){return $this -> $hgc_gasto;}
    function sethgc_gasto($hgc_gasto){
    $this->hgc_gasto = $hgc_gasto;}
    
    function gethgc_codigo (){return $this -> $hgc_codigo;}
    function sethgc_codigo($hgc_codigo){
    $this->hgc_codigo = $hgc_codigo;}
    
    function getfk_efs_codigo (){return $this -> $fk_efs_codigo;}
    function setfk_efs_codigo($fk_efs_codigo){
    $this->fk_efs_codigo = $fk_efs_codigo;}
    
    function getfk_usu_cod (){return $this -> $fk_usu_cod;}
    function setfk_usu_cod($fk_usu_cod){
    $this->fk_usu_cod = $fk_usu_cod;}
    
    function __contruct(){} 
}