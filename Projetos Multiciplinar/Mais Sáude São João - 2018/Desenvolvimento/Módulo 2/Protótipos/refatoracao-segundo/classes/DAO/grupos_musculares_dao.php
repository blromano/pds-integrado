<?php
include "./classes/Conexao.php";

class grupos_musculares_dao {
	
	 private $conexao;
    
    function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }
    private  $grm_nome;
    private  $grm_codigo;
    
    //insert
    function inserir_grupos_musculares($grupos_musculares) {
        $query = "INSERT INTO GRUPOS_MUSCULARES(GRM_NOME) VALUES (:grm_nome)";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(':grm_nome', $grm_nome);
        $grm_nome = $grupos_musculares->getgrm_nome();
		
        $sql->execute();
        header("location:");
    }

    //update
    function atualizar_grupos_musculares($grupos_musculares) {
        $query = "UPDATE GRUPOS_MUSCULARES SET GRM_NOME = :grm_nome WHERE GRM_CODIGO = :grm_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":grm_codigo", $grm_codigo);
        $sql->bindParam(':grm_nome', $grm_nome);
        $grm_codigo = $grupos_musculares->getgrm_codigo();
        $grm_nome = $grupos_musculares->getgrm_nome();
        
        $sql->execute();
        header("location:");
    }

    //select
    function selecionar_grupos_musculares($grupos_musculares) {
        $query = "SELECT * FROM GRUPOS_MUSCULARES";
        $sql = $this->conexao->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    //delete
    function excluir_grupos_musculares($grupos_musculares) {
        $query = "DELETE FROM GRUPOS_MUSCULARES WHERE GRM_CODIGO = :grm_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":grm_codigo", $_GET["grm_codigo"]);
        
        $sql->execute();
    }

}

//LETRAS MAIUSCULAS EM TUDO QUE FOR BANCO PQ TEM Q ESTAR IGUAL AO BANCO
?>