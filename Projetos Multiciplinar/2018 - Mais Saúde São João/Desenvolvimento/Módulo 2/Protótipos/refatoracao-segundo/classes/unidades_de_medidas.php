<?php

class unidades_de_medidas {

    private $umn_codigo;
    private $umn_nome;
    private $umn_abreviacao;

    function getumn_codigo() {return $this->$umn_codigo;}
    function setumn_codigo($umn_codigo) {$this->$umn_codigo = $umn_codigo;}

    function getumn_nome() {return $this->$umn_nome;}
    function setumn_nome($umn_nome) {$this->$umn_nome = $umn_nome;}

    function getumn_abreviacao() {return $this->$umn_abreviacao;}
    function setumn_abreviacao($umn_abreviacao) {$this->$umn_abreviacao = $umn_abreviacao;}

}

?>
