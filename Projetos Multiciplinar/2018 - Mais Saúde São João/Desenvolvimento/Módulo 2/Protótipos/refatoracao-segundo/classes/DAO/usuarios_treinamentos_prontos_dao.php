<?php
require_once "./classes/Conexao.php";
class usuarios_treinamentos_prontos_dao {
	
	 private $conexao;
    
    function __construct() {
        $c = new Conexao();
        $this->conexao = $c-> getConexao();
        
    }

    public function selecionar_usuario($usu_codigo){
        $query = "SELECT * FROM PROGRAMAS_TREINAMENTOS_PRONTOS WHERE FK_USUARIOS_USU_CODIGO = :usu_codigo";
        $sql = $this->conexao->prepare($query);
        $sql->bindParam(":usu_codigo", $usu_codigo);
        $sql->execute();
        return $sql->fetchAll();
    }

    //insert
    function inserir_usuarios_treinamentos_prontos($usuarios_treinamentos_prontos) {
        $query = "INSERT INTO USUARIOS_TREINAMENTOS_PRONTOS(DBC_NOME) " . "VALUES (:dbc_nome)";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(':ptp_codigo', $ptp_codigo);
        $sql->bindParam(':usu_codigo', $usu_codigo);
        $ptp_codigo = $usuarios_treinamentos_prontos->getptp_codigo();
        $usu_codigo = $usuarios_treinamentos_prontos->getusu_codigo();
         
        $sql->execute();
        header("location:");
    }
    
    function listar_usuarios_treinamentos_prontos($usuarios_treinamentos_prontos) {
        $query = "SELECT DPT_DATA_ATUALIZACAO, PTP_DESCRICAO, PTP_DIFICULDADE, DPT_CODIGO, USU_CODIGO FROM USUARIO, DESEMPENHO_PROGRAMAS_TREINAMENTO, PROGRAMAS_TRENAMENTOS_PRONTOS  ";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(':ptp_codigo', $ptp_codigo);
        $sql->bindParam(':usu_codigo', $usu_codigo);
        $ptp_codigo = $usuarios_treinamentos_prontos->getptp_codigo();
        $usu_codigo = $usuarios_treinamentos_prontos->getusu_codigo();
        
        $sql->execute();
        return $sql->fetchAll();
        header("location:");
    }
    
    //delete
    function excluir_usuarios_treinamentos_prontos($usuarios_treinamentos_prontos) {
        $query = "DELETE FROM USUARIOS_TREINAMENTOS_PRONTOS WHERE PTP_CODIGO = ptp_codigo AND USU_CODIGO = usu_codigo";
        $sql = $this->conexao->prepare($query);
		$sql->bindParam(":ptp_codigo", $_GET["ptp_codigo"]);
        $sql->bindParam(":usu_codigo", $_GET["usu_codigo"]);
        
        $sql->execute();
    }
    
    function verificarExistenciaVinculo($cod_usuario, $cod_programa_treinamento) {
 
        $query = "SELECT USU_PTP_CODIGO FROM usuarios_programas_treinamentos_prontos 
                  WHERE FK_USUARIOS_USU_CODIGO = :cod_usuario AND 
                  FK_PROGRAMAS_TREINAMENTOS_PRONTOS_PTP_CODIGO = :cod_programa";
        $sql = $this->conexao->prepare($query);
        
        $sql->bindParam(":cod_usuario", $cod_usuario);
        $sql->bindParam(":cod_programa", $cod_programa_treinamento);

        $sql->execute();
        return $sql->fetchAll();
    }

}

//LETRAS MAIUSCULAS EM TUDO QUE FOR BANCO PQ TEM Q ESTAR IGUAL AO BANCO
?>

