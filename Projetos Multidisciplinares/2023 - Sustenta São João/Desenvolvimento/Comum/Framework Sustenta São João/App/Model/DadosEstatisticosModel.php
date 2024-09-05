<?php

namespace App\Model;

class DadosEstatisticosModel
{

    private $DDE_QUANTIDADE;
    private $DDE_RESIDUO;

    public function __set($nome, $valor)
    {
        $this->$nome = $valor;
    }

    public function __get($nome)
    {
        return $this->$nome;
    }
}
