<?php
class Programas_de_treinamento {
	
    private $pgt_codigo;
    
    private $ptg_nome;
    
    private $ptg_dificuldade;
    function __construct() {
        
    }

    function getPgt_codigo() {
        return $this->pgt_codigo;
    }

    function getPtg_nome() {
        return $this->ptg_nome;
    }

    function getPtg_dificuldade() {
        return $this->ptg_dificuldade;
    }

    function setPgt_codigo($pgt_codigo) {
        $this->pgt_codigo = $pgt_codigo;
    }

    function setPtg_nome($ptg_nome) {
        $this->ptg_nome = $ptg_nome;
    }

    function setPtg_dificuldade($ptg_dificuldade) {
        $this->ptg_dificuldade = $ptg_dificuldade;
    }


    
    
    
    }






