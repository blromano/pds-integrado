<?php

require_once 'Conexao.php';

class ALIMENTOS_DAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "ALIMENTOS";
    }
    
    public function select_alimentos(){
        $this->sql = "SELECT * FROM $this->tabela ORDER BY ALI_NOME";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function select_alimentos_busca($pesquisa_alimentos){
        $this->sql = "SELECT * FROM $this->tabela WHERE ALI_NOME = '".$pesquisa_alimentos."' ORDER BY ALI_NOME;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function select_alimentos_codigo($idaddr){
        $this->sql = "SELECT * FROM $this->tabela WHERE ALI_CODIGO = '".$idaddr."' ORDER BY ALI_NOME;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
         	
    }
        
    
}

