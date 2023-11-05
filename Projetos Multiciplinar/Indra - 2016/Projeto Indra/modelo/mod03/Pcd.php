<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pcd
 *
 * @author aluno
 */
class Pcd{
    private $idPcd;
    private $periodicidade;
    
    
    function __construct($idPcd, $periodicidade) {
        $this->idPcd = $idPcd;
        $this->periodicidade = $periodicidade;
    }
    
    function getIdPcd() {
        return $this->idPcd;
    }

    function getPeriodicidade() {
        return $this->periodicidade;
    }

    function setIdPcd($idPcd) {
        $this->idPcd = $idPcd;
    }

    function setPeriodicidade($periodicidade) {
        $this->periodicidade = $periodicidade;
    }



}
