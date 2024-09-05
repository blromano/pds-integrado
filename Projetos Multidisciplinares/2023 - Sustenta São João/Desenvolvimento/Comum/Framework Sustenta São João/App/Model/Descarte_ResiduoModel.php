<?php

namespace App\Model;

class Descarte_ResiduoModel
{

    private $DSR_ID;
    private $DSR_QUANTIDADE;
    private $DSR_DATA_HORA_DESCARTE;
    private $FK_CIDADAOS_USU_ID;
    private $FK_RESIDUOS_SOLIDOS_RES_ID;
    private $FK_PONTOS_COLETA_PCO_ID;

    public function __set($nome, $valor)
    {
        $this->$nome = $valor;
    }

    public function __get($nome)
    {
        return $this->$nome;
    }
}
