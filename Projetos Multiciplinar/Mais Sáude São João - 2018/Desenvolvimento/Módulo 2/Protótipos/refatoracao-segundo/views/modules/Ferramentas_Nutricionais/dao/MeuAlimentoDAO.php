<?php

require_once 'Conexao.php';



class MeuAlimentoDAO {

    private $conexao;
    private $sql;
    private $resultado;
    private $tabela;
	

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "meus_alimentos";
    }

    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado;
    }
    public function inner(){
        $this->sql = "select ma.*,ta.TPA_NOME as NOME_TPA from $this->tabela ma,tipos_alimentos ta where ma.FK_TIPOS_ALIMENTOS_TPA_CODIGO = ta.TPA_CODIGO";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado;    
    }
	 public function verificarQuantidadeMeusAlimentos() {
        $this->sql = "select count(*) as num from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        $row = $this->resultado->fetch();
        return $row["num"];
    }
    
    function insert($MEU_NOME,$MEU_PROTEINAS,$MEU_CALORIAS,$MEU_PORCAO,$MEU_SODIO,$MEU_GORDURA_TRANS,$MEU_GORDURA_TOTAL,$MEU_CARBOIDRATOS,$MEU_FIBRAS,$MEU_GORDURA_SATURADA,$usuID,$umnID,$tpaID) {
        

        $this->sql = "INSERT INTO $this->tabela
                 (MEU_NOME,MEU_PROTEINAS,MEU_CALORIAS,MEU_PORCAO,MEU_SODIO,MEU_GORDURA_TRANS,MEU_GORDURA_TOTAL,MEU_CARBOIDRATOS,
                 MEU_FIBRAS,MEU_GORDURA_SATURADA,FK_USUARIOS_USU_CODIGO,FK_UNIDADES_MEDIDAS_NUTRICIONAIS_UMN_CODIGO,FK_TIPOS_ALIMENTOS_TPA_CODIGO) 
                 VALUES ('".$MEU_NOME."','".$MEU_PROTEINAS."','".$MEU_CALORIAS."','".$MEU_PORCAO."','".$MEU_SODIO."','".$MEU_GORDURA_TRANS."'"
                . ",'".$MEU_GORDURA_TOTAL."','".$MEU_CARBOIDRATOS."','".$MEU_FIBRAS."','".$MEU_GORDURA_SATURADA."','".$usuID."','".$umnID."','".$tpaID."');";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
    }
	
        function delete($obj_meu_alimento) {
        $id=$obj_meu_alimento->getidMeuAlimento();
        // sql to delete a record
        $this->sql = "DELETE FROM $this->tabela WHERE MEU_CODIGO=:MEU_CODIGO";
		$this->resultado = $this->conexao->prepare($this->sql);
                $this->resultado->bindParam(":MEU_CODIGO",$id , PDO::PARAM_INT);
        $this->resultado->execute();
              
    }
	
	
	function update($obj_meu_alimento) {
        $nome=$obj_meu_alimento->getNome();
        $proteinas=$obj_meu_alimento->getProteinas();
        $calorias=$obj_meu_alimento->getCalorias();
        $porcao=$obj_meu_alimento->getPorcao();
        $sodio=$obj_meu_alimento->getSodio();
        $gordura_trans=$obj_meu_alimento->getGordura_Trans();
        $gordura_total=$obj_meu_alimento->getGordura_Total();
        $carboidratos=$obj_meu_alimento->getCarboidratos();
        $fibras=$obj_meu_alimento->getFibras();
        $gordura_saturada=$obj_meu_alimento->getGordura_Saturada(); 
        $unidade_medida=$obj_meu_alimento->getUnidade_medida();
        $tipo_alimento=$obj_meu_alimento->getTipo_alimento();
        $id=$obj_meu_alimento->getidMeuAlimento();
 
           $this->sql = "UPDATE $this->tabela SET MEU_NOME=:MEU_NOME,MEU_PROTEINAS=:MEU_PROTEINAS,MEU_CALORIAS=:MEU_CALORIAS,MEU_PORCAO=:MEU_PORCAO,MEU_SODIO=:MEU_SODIO,
               MEU_GORDURA_TRANS=:MEU_GORDURA_TRANS,MEU_GORDURA_TOTAL=:MEU_GORDURA_TOTAL,MEU_CARBOIDRATOS=:MEU_CARBOIDRATOS,
               MEU_FIBRAS=:MEU_FIBRAS,MEU_GORDURA_SATURADA=:MEU_GORDURA_SATURADA, FK_UNIDADES_MEDIDAS_NUTRICIONAIS_UMN_CODIGO=:FK_UNIDADES_MEDIDAS_NUTRICIONAIS_UMN_CODIGO,
               FK_TIPOS_ALIMENTOS_TPA_CODIGO=:FK_TIPOS_ALIMENTOS_TPA_CODIGO
		WHERE MEU_CODIGO=:MEU_CODIGO";
	  $this->resultado = $this->conexao->prepare($this->sql);
          $this->resultado->bindParam(":MEU_NOME",$nome , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_PROTEINAS",$proteinas , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_CALORIAS",$calorias , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_PORCAO",$porcao , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_SODIO",$sodio , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_GORDURA_TRANS",$gordura_trans , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_GORDURA_TOTAL",$gordura_total , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_CARBOIDRATOS",$carboidratos , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_FIBRAS",$fibras , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_GORDURA_SATURADA",$gordura_saturada , PDO::PARAM_STR);
          $this->resultado->bindParam(":FK_UNIDADES_MEDIDAS_NUTRICIONAIS_UMN_CODIGO",$unidade_medida , PDO::PARAM_STR);
          $this->resultado->bindParam(":FK_TIPOS_ALIMENTOS_TPA_CODIGO",$tipo_alimento , PDO::PARAM_STR);
          $this->resultado->bindParam(":MEU_CODIGO",$id , PDO::PARAM_STR);
          $this->resultado->execute();
    }
	
	
	

	
    
    }

?>
