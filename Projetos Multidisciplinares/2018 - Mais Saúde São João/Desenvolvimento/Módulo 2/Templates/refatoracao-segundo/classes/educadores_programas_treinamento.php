<?php
class Educadores_programas_treinamento {
    private $fk_educadores_fisicos_edu_crf;
    private $fk_programas_de_treinamento_pgt_codigo;
    
    function __construct() {
        
    }

    
    function getFk_educadores_fisicos_edu_crf() {
        return $this->fk_educadores_fisicos_edu_crf;
    }

    function getFk_programas_de_treinamento_pgt_codigo() {
        return $this->fk_programas_de_treinamento_pgt_codigo;
    }

    function setFk_educadores_fisicos_edu_crf($fk_educadores_fisicos_edu_crf) {
        $this->fk_educadores_fisicos_edu_crf = $fk_educadores_fisicos_edu_crf;
    }

    function setFk_programas_de_treinamento_pgt_codigo($fk_programas_de_treinamento_pgt_codigo) {
        $this->fk_programas_de_treinamento_pgt_codigo = $fk_programas_de_treinamento_pgt_codigo;
    }


}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

