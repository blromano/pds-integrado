<?php

class Solicitacoes_tratamentos_esportivos {

    function __contruct() {
        
    }

    private $ste_codigo, $ste_data_solicitacao, $ste_data_resposta, $ste_status;

    function getSte_codigo() {
        return $this->ste_codigo;
    }

    function setSte_codigo($ste_codigo) {
        $this->ste_codigo = $ste_codigo;
    }

    function getSte_data_solicitacao() {
        return $this->ste_data_solicitacao;
    }

    function setSte_data_solicitacao($ste_data_solicitacao) {
        $this->ste_data_solicitacao = $ste_data_solicitacao;
    }

    function getSte_data_resposta() {
        return $this->his_resposta_solicitacao;
    }

    function setste_data_resposta($ste_data_resposta) {
        $this->ste_data_resposta = $ste_data_resposta;
    }

    function getSte_status() {
        return $this->ste_status;
    }

    function setSte_status($ste_status) {
        $this->ste_status = $ste_status;
    }

}

?>
