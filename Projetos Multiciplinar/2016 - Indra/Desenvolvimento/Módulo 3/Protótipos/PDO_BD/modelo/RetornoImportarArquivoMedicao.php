<?php

class RetornoImportarArquivoMedicao{
    private $Titulo;
    private $Mensagem;
    private $Tipo;

    function __construct($Titulo, $Mensagem, $Tipo = "") {
        $this->Titulo = $Titulo;
        $this->Mensagem = $Mensagem;
        $this->Tipo = $Tipo;
    }
    
    function getTitulo() {
        return $this->Titulo;
    }

    function getMensagem() {
        return $this->Mensagem;
    }

    function getTipo() {
        return $this->Tipo;
    }

    function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    function setMensagem($Mensagem) {
        $this->Mensagem = $Mensagem;
    }

    function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

}