<?php

class ALIMENTO_PERIODO_CARDAPIO {

    private $APC_CODIGO;
    private $FK_ALIMENTOS_ALI_CODIGO;
    private $APC_PCN_PORCAO;
    private $FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO;
    private $APC_VARIACAO_ALIMENTO;
    private $APC_QTD_CALORIAS;

    function getFK_ALIMENTOS_ALI_CODIGO() {
        return $this->FK_ALIMENTOS_ALI_CODIGO;
    }

    function getFK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO() {
        return $this->FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO;
    }

    function setFK_ALIMENTOS_ALI_CODIGO($FK_ALIMENTOS_ALI_CODIGO) {
        $this->FK_ALIMENTOS_ALI_CODIGO = $FK_ALIMENTOS_ALI_CODIGO;
    }

    function setFK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO($FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO) {
        $this->FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO = $FK_PERIODO_CARDAPIO_NUTRICIONISTA_PCN_CODIGO;
    }

    function getAPC_CODIGO() {
        return $this->APC_CODIGO;
    }

    function getAPC_PCN_PORCAO() {
        return $this->APC_PCN_PORCAO;
    }

    function getAPC_VARIACAO_ALIMENTO() {
        return $this->APC_VARIACAO_ALIMENTO;
    }

    function getAPC_QTD_CALORIAS() {
        return $this->APC_QTD_CALORIAS;
    }

    function setAPC_CODIGO($APC_CODIGO) {
        $this->APC_CODIGO = $APC_CODIGO;
    }

    function setAPC_PCN_PORCAO($APC_PCN_PORCAO) {
        $this->APC_PCN_PORCAO = $APC_PCN_PORCAO;
    }

    function setAPC_VARIACAO_ALIMENTO($APC_VARIACAO_ALIMENTO) {
        $this->APC_VARIACAO_ALIMENTO = $APC_VARIACAO_ALIMENTO;
    }

    function setAPC_QTD_CALORIAS($APC_QTD_CALORIAS) {
        $this->APC_QTD_CALORIAS = $APC_QTD_CALORIAS;
    }

}
