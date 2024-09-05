<?php

namespace App\Model;

class Residuo_SolidoModel {

    private $RES_ID;
    private $RES_NOME_RESIDUO;
    private $RES_DESCRICAO;

    public function __set($nome, $valor)
    {
        $this->$nome = $valor;
    }

    public function __get($nome)
    {
        return $this->$nome;
    }
}