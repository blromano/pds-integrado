<?php

class MeusAlimentos{

    private $idMeuAlimento;
    private $nome;
    private $proteinas;
    private $calorias;
    private $porcao;
    private $sodio;
    private $gordura_trans;
    private $gordura_total;
    private $carboidratos;
    private $fibras;
    private $gordura_saturada;
    private $unidade_medida;
    private $tipo_alimento;

    
    function __construct() {
        
    }
    function getIdMeuAlimento() {
        return $this->idMeuAlimento;
    }

    function getNome() {
        return $this->nome;
    }

    function getProteinas() {
        return $this->proteinas;
    }

    function getCalorias() {
        return $this->calorias;
    }

    function getPorcao() {
        return $this->porcao;
    }

    function getSodio() {
        return $this->sodio;
    }

    function getGordura_trans() {
        return $this->gordura_trans;
    }

    function getGordura_total() {
        return $this->gordura_total;
    }

    function getCarboidratos() {
        return $this->carboidratos;
    }

    function getFibras() {
        return $this->fibras;
    }

    function getGordura_saturada() {
        return $this->gordura_saturada;
    }

    function setIdMeuAlimento($idMeuAlimento) {
        $this->idMeuAlimento = $idMeuAlimento;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setProteinas($proteinas) {
        $this->proteinas = $proteinas;
    }

    function setCalorias($calorias) {
        $this->calorias = $calorias;
    }

    function setPorcao($porcao) {
        $this->porcao = $porcao;
    }

    function setSodio($sodio) {
        $this->sodio = $sodio;
    }

    function setGordura_trans($gordura_trans) {
        $this->gordura_trans = $gordura_trans;
    }

    function setGordura_total($gordura_total) {
        $this->gordura_total = $gordura_total;
    }

    function setCarboidratos($carboidratos) {
        $this->carboidratos = $carboidratos;
    }

    function setFibras($fibras) {
        $this->fibras = $fibras;
    }

    function setGordura_saturada($gordura_saturada) {
        $this->gordura_saturada = $gordura_saturada;
    }

    function getUnidade_medida() {
        return $this->unidade_medida;
    }

    function getTipo_alimento() {
        return $this->tipo_alimento;
    }

    function setUnidade_medida($unidade_medida) {
        $this->unidade_medida = $unidade_medida;
    }

    function setTipo_alimento($tipo_alimento) {
        $this->tipo_alimento = $tipo_alimento;
    }


   
    



}
?>
