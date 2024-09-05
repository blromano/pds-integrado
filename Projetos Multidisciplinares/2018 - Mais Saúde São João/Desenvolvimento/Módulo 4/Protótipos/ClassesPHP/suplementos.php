<?php
class suplementos{
    private $sup_codigo, $sup_nome, $sup_foto, $sup_descricao, $sup_utilizacao, $sup_composicao, $sup_tipo ;
    function getSup_codigo() {
        return $this->sup_codigo;
    }

    function getSup_nome() {
        return $this->sup_nome;
    }

    function getSup_foto() {
        return $this->sup_foto;
    }

    function getSup_descricao() {
        return $this->sup_descricao;
    }

    function getSup_utilizacao() {
        return $this->sup_utilizacao;
    }

    function getSup_composicao() {
        return $this->sup_composicao;
    }

    function getSup_tipo() {
        return $this->sup_tipo;
    }

    function setSup_codigo($sup_codigo) {
        $this->sup_codigo = $sup_codigo;
    }

    function setSup_nome($sup_nome) {
        $this->sup_nome = $sup_nome;
    }

    function setSup_foto($sup_foto) {
        $this->sup_foto = $sup_foto;
    }

    function setSup_descricao($sup_descricao) {
        $this->sup_descricao = $sup_descricao;
    }

    function setSup_utilizacao($sup_utilizacao) {
        $this->sup_utilizacao = $sup_utilizacao;
    }

    function setSup_composicao($sup_composicao) {
        $this->sup_composicao = $sup_composicao;
    }

    function setSup_tipo($sup_tipo) {
        $this->sup_tipo = $sup_tipo;
    }
    
}
?>
