<?php

namespace App\Model;

class PessoaModel{

    private $PES_ID;
    private $PES_NOME;
    private $PES_EMAIL;
    private $PES_TELEFONE;


    public function __set($nome, $valor){
        $this->$nome = $valor;
    }

    public function __get($nome){
        return $this->$nome;
    }
    
    
    
    
    /*
    public function setPES_ID($valor){
        $this->PES_ID = $valor;
    }

    public function getPES_ID(){
        return $this->PES_ID;
    }
    */



}