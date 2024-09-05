<?php
    
class FichasDeTreinamento {

    private $edu_codigo, $edu_nome, $edu_genero, $edu_formacao, $edu_data_de_nascimento, $edu_foco, $edu_descricao ;
    
    function getEdu_codigo() {
        return $this->edu_codigo;
    }

    function getEdu_nome() {
        return $this->edu_nome;
    }

    function getEdu_genero() {
        return $this->edu_genero;
    }

    function getEdu_formacao() {
        return $this->edu_formacao;
    }

    function getEdu_data_de_nascimento() {
        return $this->edu_data_de_nascimento;
    }

    function getEdu_foco() {
        return $this->edu_foco;
    }

    function getEdu_descricao() {
        return $this->edu_descricao;
    }

    function setEdu_codigo($edu_codigo) {
        $this->edu_codigo = $edu_codigo;
    }

    function setEdu_nome($edu_nome) {
        $this->edu_nome = $edu_nome;
    }

    function setEdu_genero($edu_genero) {
        $this->edu_genero = $edu_genero;
    }

    function setEdu_formacao($edu_formacao) {
        $this->edu_formacao = $edu_formacao;
    }

    function setEdu_data_de_nascimento($edu_data_de_nascimento) {
        $this->edu_data_de_nascimento = $edu_data_de_nascimento;
    }

    function setEdu_foco($edu_foco) {
        $this->edu_foco = $edu_foco;
    }

    function setEdu_descricao($edu_descricao) {
        $this->edu_descricao = $edu_descricao;
    }


}
?>