<?php
class historico_solicitacoes_acompanhamento {
    private $his_codigo, $his_data_solicitacao, $his_resposta_solicitacao;
    function getHis_codigo() {
        return $this->his_codigo;
    }

    function getHis_data_solicitacao() {
        return $this->his_data_solicitacao;
    }

    function getHis_resposta_solicitacao() {
        return $this->his_resposta_solicitacao;
    }

    function setHis_codigo($his_codigo) {
        $this->his_codigo = $his_codigo;
    }

    function setHis_data_solicitacao($his_data_solicitacao) {
        $this->his_data_solicitacao = $his_data_solicitacao;
    }

    function setHis_resposta_solicitacao($his_resposta_solicitacao) {
        $this->his_resposta_solicitacao = $his_resposta_solicitacao;
    }


}
?>
