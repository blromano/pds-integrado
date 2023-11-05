<?php

class exercicios_fisicos {

    private $exf_codigo;
    private $exf_descricao;
    private $exf_como_executar_gif;
    private $exf_demonstracao_youtube;
    private $exf_nome;
    private $fk_tipos_exercicios_fisicos_tef_codigo;
    private $fk_unidades_de_medidas_umn_codigo;

    function getexf_codigo() {return $this->exf_codigo;}
    function setexf_codigo($exf_codigo) {$this->exf_codigo = $exf_codigo;}

    function getexf_descricao() {return $this->exf_descricao;}
    function setexf_descricao($exf_descricao) {$this->exf_descricao = $exf_descricao;}

    function getexf_como_executar_gif() {return $this->exf_como_executar_gif;}
    function setexf_como_executar_gif($exf_como_executar_gif) {$this->exf_como_executar_gif = $exf_como_executar_gif;}

    function getexf_demonstracao_youtube() {return $this->exf_demonstracao_youtube;}
    function setexf_demonstracao_youtube($exf_demonstracao_youtube) {$this->exf_demonstracao_youtube = $exf_demonstracao_youtube;}
    
    function getexf_nome() {return $this->exf_nome;}
    function setexf_nome($exf_nome) {$this->exf_nome = $exf_nome;}
    
    function getfk_tipos_exercicios_fisicos_tef_codigo() {return $this->fk_tipos_exercicios_fisicos_tef_codigo;}
    function setfk_tipos_exercicios_fisicos_tef_codigo($fk_tipos_exercicios_fisicos_tef_codigo) {$this->fk_tipos_exercicios_fisicos_tef_codigo = $fk_tipos_exercicios_fisicos_tef_codigo;}
    
    function getfk_unidades_de_medidas_umn_codigo() {return $this->fk_unidades_de_medidas_umn_codigo;}
    function setfk_unidades_de_medidas_umn_codigo($fk_unidades_de_medidas_umn_codigo) {$this->fk_unidades_de_medidas_umn_codigo = $fk_unidades_de_medidas_umn_codigo;}
}

