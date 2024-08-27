<?php
require_once 'PDO.php';

class Receita {
	private $pdo;
	private $id;
	private $resposta;

	public function __construct() {
		$conn = new Conexao();
        $this->pdo = $conn->getConexao();
	}

	public function addCerveja($nome, $estilo, $id_micro, $id){
		$nome_user = $this->infoUser($id);
		$id_estilo = $this->infoEstilo_Nome($estilo);

		$sql = "INSERT INTO cervejas (CER_CRIADOR_CERVEJA, CER_NOME, FK_ESTILOS_CERVEJAS_EST_ID, FK_MICROCERVEJARIAS_MIC_ID) VALUES (:nome_user, :nome, :id_estilo, :id_micro)";
		
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome_user', $nome_user->USU_NOME);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':id_estilo', $id_estilo->EST_ID);
		$sql->bindValue(':id_micro', $id_micro);
		$sql->execute();
		return true;
	}

	public function listCerveja(){
		$sql = "SELECT * FROM cervejas";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}

	public function altCerveja($id, $nome, $estilo){
		$sql = "SELECT * FROM cervejas WHERE CER_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$id_estilo = $this->infoEstilo_Nome($estilo);

			$sql = "UPDATE cervejas SET CER_NOME = :nome, FK_ESTILOS_CERVEJAS_EST_ID = :estilo WHERE CER_ID = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':estilo', $id_estilo->EST_ID);
			$sql->bindValue(':id', $id);
			$sql->execute();

			return true;
		}else{
			return false;
		}
	}

	public function delCerveja($id){
		$sql = "SELECT * FROM cervejas WHERE CER_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = "DELETE FROM cervejas WHERE CER_ID = $id";
			$sql = $this->pdo->query($sql);

			return true;
		}else{
			return false;
		}
	}

	
	public function infoCerveja($id){
		$sql = "SELECT * FROM cervejas WHERE CER_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}
	
}

?>