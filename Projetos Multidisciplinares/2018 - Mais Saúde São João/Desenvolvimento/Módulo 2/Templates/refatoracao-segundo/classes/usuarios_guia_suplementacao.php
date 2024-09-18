<?php
class Usuarios_guia_suplementacao{
    private $fk_gsp_codigo;
    private $fk_guias_de_suplementacao_gsp_codigo;
    private $fk_usuarios_usu_cpf;
    
    function __construct() {
        
    }

    
    function getFk_gsp_codigo() {
     
        return $this->fk_gsp_codigo;
    }

    function getFk_guias_de_suplementacao_gsp_codigo() {
        return $this->fk_guias_de_suplementacao_gsp_codigo;
    }

    function getFk_usuarios_usu_cpf() {
        return $this->fk_usuarios_usu_cpf;
    }

    function setFk_gsp_codigo($fk_gsp_codigo) {
        $this->fk_gsp_codigo = $fk_gsp_codigo;
    }

    function setFk_guias_de_suplementacao_gsp_codigo($fk_guias_de_suplementacao_gsp_codigo) {
        $this->fk_guias_de_suplementacao_gsp_codigo = $fk_guias_de_suplementacao_gsp_codigo;
    }

    function setFk_usuarios_usu_cpf($fk_usuarios_usu_cpf) {
        $this->fk_usuarios_usu_cpf = $fk_usuarios_usu_cpf;
    }


    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

