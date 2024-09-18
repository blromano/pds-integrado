<?php

require_once 'Conexao.php';


class TiposAlimentosDAO {

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;
	

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "TIPOS_ALIMENTOS";
    }

    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado;
    }

    public function verificarQuantidadeTiposAlimentos() {
        $this->sql = "select count(*) as num from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        $row = $this->resultado->fetch();
        return $row["num"];
    }
   
	 
	 function insert($TPA_NOME) {
        

        $this->sql = "INSERT INTO $this->tabela
                 (TPA_NOME) 
                 VALUES ('".$TPA_NOME."');";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }


	
	
        function delete($obj_tp_alimento) {
        $id=$obj_tp_alimento->getidTipoAlimento();

        // sql to delete a record
        $this->sql = "DELETE FROM $this->tabela WHERE TPA_CODIGO=:TPA_CODIGO";
		$this->resultado = $this->conexao->prepare($this->sql);
                $this->resultado->bindParam(":TPA_CODIGO",$id , PDO::PARAM_INT);
        $this->resultado->execute();
              
    }
	
	
	function update($obj_tp_alimento) {
        $nome=$obj_tp_alimento->getNome();
        $id=$obj_tp_alimento->getidTipoAlimento();
        

        $this->sql = "UPDATE $this->tabela SET TPA_NOME=:TPA_NOME
		WHERE TPA_CODIGO=:ID";
	  $this->resultado = $this->conexao->prepare($this->sql);
          $this->resultado->bindParam(":TPA_NOME",$nome , PDO::PARAM_STR);
          $this->resultado->bindParam(":ID",$id , PDO::PARAM_INT);
       $this->resultado->execute();
    }
	
	
	

	
    
    }

?>
