<?php

require_once 'Conexao.php';



class UnidadeMedidaDAO {

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;
	

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "unidades_medidas_nutricionais";
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
    
    function insert($UMN_NOME,$UMN_ABREVIATURA) {
        

        $this->sql = "INSERT INTO $this->tabela
                 (UMN_NOME,UMN_ABREVIATURA) 
                 VALUES ('".$UMN_NOME."','".$UMN_ABREVIATURA."');";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }
	
        function delete($obj_un_medida) {
        $id=$obj_un_medida->getidUnidadeMedida();

        // sql to delete a record
        $this->sql = "DELETE FROM $this->tabela WHERE UMN_CODIGO=:UMN_CODIGO";
		$this->resultado = $this->conexao->prepare($this->sql);
                $this->resultado->bindParam(":UMN_CODIGO",$id , PDO::PARAM_INT);
        $this->resultado->execute();
              
    }
	
	
	function update($obj_un_medida) {
        $nome=$obj_un_medida->getNome();
        $abreviatura=$obj_un_medida->getAbreviatura();
        $id=$obj_un_medida->getidUnidadeMedida();
        
           $this->sql = "UPDATE $this->tabela SET UMN_NOME=:UMN_NOME,UMN_ABREVIATURA=:UMN_ABREVIATURA
		WHERE UMN_CODIGO=:UMN_CODIGO";
	  $this->resultado = $this->conexao->prepare($this->sql);
          $this->resultado->bindParam(":UMN_NOME",$nome , PDO::PARAM_STR);
          echo $nome."<br>";
          $this->resultado->bindParam(":UMN_ABREVIATURA",$abreviatura , PDO::PARAM_STR);
          echo $abreviatura."<br>";
          $this->resultado->bindParam(":UMN_CODIGO",$id , PDO::PARAM_INT);
          echo $id."<br>";
          $this->resultado->execute();
    }
	
	
	

	
    
    }

?>
