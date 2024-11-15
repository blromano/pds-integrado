<?php

require_once 'Conexao.php';


class HR_DISPONIBILIDADE_NUTRICIONISTAS_DAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

     public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "HR_DISPONIBILIDADE_NUTRICIONISTAS";
    }

	public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function Excluir($id) {
        $sql = "DELETE FROM $this->tabela WHERE HDN_CODIGO =  :ID";
		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':ID', $id, PDO::PARAM_INT);   
		$stmt->execute();
    }
	
	public function Insert($FCN_PESO_ATUAL,$FCN_CODIGO,$FCN_COMENTARIOS_NUTRICIONISTA,$FCN_ULTIMO_ACESSO,$FCN_OBJETIVO,$FCN_ESTATURA,$FCN_QUAIS_ALERGIAS,
		$FCN_TEM_ALERGIA,$FCN_QUAIS_RESTRICOES,$FCN_TEM_PLANO_SAUDE,$FCN_DERCROCAO_ATIV_DURACAO,$FCN_QUANTAS_REFEICOES_POR_DIA,$FCN_ATIV_VEZES_POR_SEMANA,
		$FCN_RESTRICAO_ALIMENTAR,$FCN_PRATICA_ATIVIDADE_FISICA,$FCN_QUAL_ATIV_QUANTO_TEMPO,$FCN_FAZ_DIETA_OU_SUPLEMENTACAO,$FCN_SE_N_JA_PRATICOU,
		$FCN_SE_JA_ATIV_QUAIS_DURACAO){
		
		$sql = "INSERT INTO $this->tabela(
		HDN_CODIGO,
		HDN_MES,
		HDN_ANO,
		HDN_SABADO_HR_FIM,
		HDN_SABADO_HR_INICIO,
		HDN_SEXTA_HR_FIM,
		HDN_SEXTA_HR_INICIO,
		HDN_QUINTA_HR_FIM,
		HDN_QUINTA_HR_INICIO,
		HDN_QUARTA_HR_FIM,
		HDN_QUARTA_HR_INICIO,
		HDN_TERCA_HR_FIM,
		HDN_TERCA_HR_INICIO,
		HDN_SEGUNDA_HR_FIM,
		HDN_SEGUNDA_HR_INICIO) 
		VALUES (
        :HDN_CODIGO,
		:HDN_MES,
		:HDN_ANO,
		:HDN_SABADO_HR_FIM,
		:HDN_SABADO_HR_INICIO,
		:HDN_SEXTA_HR_FIM,
		:HDN_SEXTA_HR_INICIO,
		:HDN_QUINTA_HR_FIM,
		:HDN_QUINTA_HR_INICIO,
		:HDN_QUARTA_HR_FIM,
		:HDN_QUARTA_HR_INICIO,
		:HDN_TERCA_HR_FIM,
		:HDN_TERCA_HR_INICIO,
		:HDN_SEGUNDA_HR_FIM,
		:HDN_SEGUNDA_HR_INICIO)";
                                          
			$stmt = $pdo->prepare($sql);
					
			$stmt->bindParam(':HDN_CODIGO', $HDN_CODIGO, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_MES', $HDN_MES, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_ANO', $HDN_ANO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SABADO_HR_FIM', $HDN_SABADO_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SABADO_HR_INICIO', $HDN_SABADO_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SEXTA_HR_FIM', $HDN_SEXTA_HR_FIM, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_SEXTA_HR_INICIO', $HDN_SEXTA_HR_INICIO, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_QUINTA_HR_FIM', $HDN_QUINTA_HR_FIM, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_QUINTA_HR_INICIO', $HDN_QUINTA_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_QUARTA_HR_FIM', $HDN_QUARTA_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_QUARTA_HR_INICIO', $HDN_QUARTA_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_TERCA_HR_FIM', $HDN_TERCA_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_TERCA_HR_INICIO', $HDN_TERCA_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SEGUNDA_HR_FIM', $HDN_SEGUNDA_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SEGUNDA_HR_INICIO', $HDN_SEGUNDA_HR_INICIO, PDO::PARAM_STR); 
												  
			$stmt->execute(); 
		
	}
       
    public function Update($FCN_PESO_ATUAL,$FCN_CODIGO,$FCN_COMENTARIOS_NUTRICIONISTA,$FCN_ULTIMO_ACESSO,$FCN_OBJETIVO,$FCN_ESTATURA,$FCN_QUAIS_ALERGIAS,
		$FCN_TEM_ALERGIA,$FCN_QUAIS_RESTRICOES,$FCN_TEM_PLANO_SAUDE,$FCN_DERCROCAO_ATIV_DURACAO,$FCN_QUANTAS_REFEICOES_POR_DIA,$FCN_ATIV_VEZES_POR_SEMANA,
		$FCN_RESTRICAO_ALIMENTAR,$FCN_PRATICA_ATIVIDADE_FISICA,$FCN_QUAL_ATIV_QUANTO_TEMPO,$FCN_FAZ_DIETA_OU_SUPLEMENTACAO,$FCN_SE_N_JA_PRATICOU,
		$FCN_SE_JA_ATIV_QUAIS_DURACAO){
		
		$sql = "UPDATE $this->tabela SET
		HDN_CODIGO=:HDN_CODIGO,
		HDN_MES=:HDN_MES,
		HDN_ANO=:HDN_ANO,
		HDN_SABADO_HR_FIM=:HDN_SABADO_HR_FIM,
		HDN_SABADO_HR_INICIO=:HDN_SABADO_HR_INICIO,
		HDN_SEXTA_HR_FIM=:HDN_SEXTA_HR_FIM,
		HDN_SEXTA_HR_INICIO=:HDN_SEXTA_HR_INICIO,
		HDN_QUINTA_HR_FIM=:HDN_QUINTA_HR_FIM,
		HDN_QUINTA_HR_INICIO=:HDN_QUINTA_HR_INICIO,
		HDN_QUARTA_HR_FIM=:HDN_QUARTA_HR_FIM,
		HDN_QUARTA_HR_INICIO=:HDN_QUARTA_HR_INICIO,
		HDN_TERCA_HR_FIM=:HDN_TERCA_HR_FIM,
		HDN_TERCA_HR_INICIO=:HDN_TERCA_HR_INICIO,
		HDN_SEGUNDA_HR_FIM=:HDN_SEGUNDA_HR_FIM,
		HDN_SEGUNDA_HR_INICIO=:HDN_SEGUNDA_HR_INICIO";
$stmt = $pdo->prepare($sql);                                  
$stmt->bindParam(':FCN_PESO_ATUAL', $FCN_PESO_ATUAL, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_CODIGO', $HDN_CODIGO, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_MES', $HDN_MES, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_ANO', $HDN_ANO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SABADO_HR_FIM', $HDN_SABADO_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SABADO_HR_INICIO', $HDN_SABADO_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SEXTA_HR_FIM', $HDN_SEXTA_HR_FIM, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_SEXTA_HR_INICIO', $HDN_SEXTA_HR_INICIO, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_QUINTA_HR_FIM', $HDN_QUINTA_HR_FIM, PDO::PARAM_STR);
			$stmt->bindParam(':HDN_QUINTA_HR_INICIO', $HDN_QUINTA_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_QUARTA_HR_FIM', $HDN_QUARTA_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_QUARTA_HR_INICIO', $HDN_QUARTA_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_TERCA_HR_FIM', $HDN_TERCA_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_TERCA_HR_INICIO', $HDN_TERCA_HR_INICIO, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SEGUNDA_HR_FIM', $HDN_SEGUNDA_HR_FIM, PDO::PARAM_STR); 
			$stmt->bindParam(':HDN_SEGUNDA_HR_INICIO', $HDN_SEGUNDA_HR_INICIO, PDO::PARAM_STR); 
				  
$stmt->execute(); 
		
	}
	}




?>
