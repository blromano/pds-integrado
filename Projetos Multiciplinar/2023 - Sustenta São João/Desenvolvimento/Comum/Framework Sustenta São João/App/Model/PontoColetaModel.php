<?php

namespace App\Model;

class PontoColetaModel{

    private $PRO_NOME;
    private $PRO_CPF;
    private $PRO_RG;
    private $PRO_RUA;
    private $PRO_NUMERO;
    private $PRO_BAIRRO;
    private $PRO_CEP;
    private $PRO_LOGRADOURO;
    private $PRO_TELEFONE;
    private $PCO_ID;
    private $PCO_NOME;
    private $PCO_RUA;
    private $PCO_NUMERO;
    private $PCO_BAIRRO;
    private $PCO_CEP;
    private $PCO_LOGRADOURO;
    private $PCO_LATITUDE;
    private $PCO_LONGITUDE;
    private $PCO_TELEFONE;
    private $PCO_CNPJ;

    



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