<?php 

require_once 'PDO.php';

class Ferramentas {
	private $pdo;
	private $id;
	private $resposta;

	public function __construct() {
		$conn = new Conexao();
        $this->pdo = $conn->getConexao();
	}
	public function exDados(){
		$sql = "SELECT * FROM ajuste_densidade";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		} else {
			return false;
		}
	}

	public function exDadosR($mes){
		$sql = "SELECT a.ASU_ID, a.ASU_DATA_ASSINATURA, p.PLA_NOME, u.USU_NOME FROM  assinaturas_usuarios_planos_usuarios a, planos p, usuarios u WHERE MONTH(a.ASU_DATA_ASSINATURA) = ".$mes." AND p.PLA_ID = a.FK_PLANOS_PLA_ID AND a.FK_USUARIOS_USU_ID = u.USU_ID";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		} else {
			return false;
		}
	}
	}

//date("m", $data) fltro


 ?>