<?php
class historico_solicitacoes_acompanhamento{
    private $per_codigo, $per_data_atualizacao, $per_experiencia, $per_objetivo;
    function getPer_codigo() {
        return $this->per_codigo;
    }

    function getPer_data_atualizacao() {
        return $this->per_data_atualizacao;
    }

    function getPer_experiencia() {
        return $this->per_experiencia;
    }

    function getPer_objetivo() {
        return $this->per_objetivo;
    }

    function setPer_codigo($per_codigo) {
        $this->per_codigo = $per_codigo;
    }

    function setPer_data_atualizacao($per_data_atualizacao) {
        $this->per_data_atualizacao = $per_data_atualizacao;
    }

    function setPer_experiencia($per_experiencia) {
        $this->per_experiencia = $per_experiencia;
    }

    function setPer_objetivo($per_objetivo) {
        $this->per_objetivo = $per_objetivo;
    }

}
?>