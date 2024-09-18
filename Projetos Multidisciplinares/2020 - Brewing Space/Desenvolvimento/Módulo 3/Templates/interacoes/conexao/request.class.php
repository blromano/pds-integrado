<?php
require_once 'PDO.php';

class usuarios{
	private $pdo;

	public function __construct() {
		$conn = new Conexao();
        $this->pdo = $conn->getConexao();
	}

	public function login($email, $pass) {
        $sql = "SELECT * FROM USUARIOS WHERE USU_EMAIL='$email' AND USU_SENHA='$pass'";
        $sql = $this->pdo->query($sql);

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return false;
        }
	}
	
	public function retornaCerveja($usuario)
	{
		$sql = "SELECT RECEITAS_CERVEJA.REC_NOME AS nome, RECEITAS_CERVEJA.REC_ID AS id FROM RECEITAS_CERVEJA INNER JOIN USUARIOS_RECEITAS ON RECEITAS_CERVEJA.REC_ID = USUARIOS_RECEITAS.FK_RECEITAS_CERVEJA_REC_ID INNER JOIN USUARIOS ON USUARIOS.USU_ID = USUARIOS_RECEITAS.FK_USUARIOS_USU_ID WHERE USUARIOS.USU_ID = " . $usuario; 
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
			
		}else{
			return false;
		}
	}

	public function gerenciarBrassagem($volumeInicial, $tempoBrassagem, $volumeLavagem,$temperaturaInicial, $temperaturaBrassagem, $temperaturaLavagem)
	{
		$sql = "INSERT INTO PROCESSOS_BRASSAGEM (BRA_VOLUME_INICIAL, BRA_TEMPO, BRA_VOLUME_LAVAGEM, BRA_TEMPERATURA_INICIAL, BRA_TEMPERATURA_BRASSAGEM,BRA_TEMPERATURA_LAVAGEM) VALUES (:volumeInicial, :tempoBrassagem, :volumeLavagem, :temperaturaInicial, :temperaturaBrassagem, :temperaturaLavagem);";
		
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':volumeInicial', $volumeInicial);
		$sql->bindValue(':tempoBrassagem', $tempoBrassagem);
		$sql->bindValue(':volumeLavagem', $volumeLavagem);
		$sql->bindValue(':temperaturaInicial', $temperaturaInicial);
		$sql->bindValue(':temperaturaBrassagem', $temperaturaBrassagem);
		$sql->bindValue(':temperaturaLavagem', $temperaturaLavagem);
		$sql->execute();
	}

	public function processoCriado($usuario, $idCerveja)
	{
		$sql = "SELECT RECEITAS_CERVEJA.REC_NOME AS nome FROM RECEITAS_CERVEJA INNER JOIN USUARIOS_RECEITAS ON RECEITAS_CERVEJA.REC_ID = USUARIOS_RECEITAS.FK_RECEITAS_CERVEJA_REC_ID INNER JOIN USUARIOS ON USUARIOS.USU_ID = ".$usuario." WHERE USUARIOS.USU_ID = 1 AND RECEITAS_CERVEJA.REC_ID =".$idCerveja;
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
			
		}else{
			return false;
		}
	}
	
/*	public function brassagem()
	{
		$sql = "INSERT INTO PROCESSOS_BRASSAGEM (BRA_VOLUME_INICIAL, BRA_TEMPO,BRA_VOLUME_LAVAGEM,BRA_TEMPERATURA_LAVAGEM,BRA_TEMPERATURA_BRASSAGEM,BRA_TEMPERATURA_INICIAL,BRA_OBSERVACOES,BRA_TESTE_IODO1,BRA_TESTE_IODO2,BRA_TESTE_IODO3,BRA_TESTE_IODO4,BRA_TESTE_IODO5) VALUES (:brassagemVolumeInicial, :brassagemTempo, :brassagemVoulmeLavagem, :brassagemTemperaturaLavagem, :brassagemTemperaturaBrassagem, :brassagemTemperaturaInicial, :brassagemObservacoes, :brassagemIodo1,:brassagemIodo2,:brassagemIodo3,:brassagemIodo4,:brassagemIodo5) ";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':brassagemVolumeInicial', $nome);
		$sql->bindValue(':brassagemTempo', $descricao);
		$sql->bindValue(':brassagemVoulmeLavagem', $quantidade)
		$sql->bindValue(':brassagemTemperaturaLavagem', $nome);
		$sql->bindValue(':brassagemTemperaturaBrassagem', $descricao);
		$sql->bindValue(':brassagemTemperaturaInicial', $quantidade)
		$sql->bindValue(':brassagemObservacoes', $nome);
		$sql->bindValue(':brassagemIodo1', $descricao);
		$sql->bindValue(':brassagemIodo2', $quantidade)
		$sql->bindValue(':brassagemIodo3', $nome);
		$sql->bindValue(':brassagemIodo4', $descricao);
		$sql->bindValue(':brassagemIodo5', $quantidade);
		$sql->execute();

	}*/

	/*			INSERT
	public function addProduto($nome, $descricao, $quantidade){
		$sql = "INSERT INTO produtos (PROD_NOME, PROD_DESCRICAO, PROD_QUANTIDADE) VALUES (:nome, :descricao, :quantidade);";
		
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':descricao', $descricao);
		$sql->bindValue(':quantidade', $quantidade);
		$sql->execute();
	}*/

	/*			SELECT
	public function listProduto(){
		$sql = "SELECT * FROM produtos";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}*/

	/*			UPDATE
	public function altProduto($nome, $quantidade, $descricao, $id){
		$sql = "SELECT * FROM produtos WHERE PROD_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = "UPDATE produtos SET PROD_NOME=:nome, PROD_DESCRICAO=:descricao, PROD_QUANTIDADE=:quantidade WHERE PROD_ID = $id";
			$sql = $this->pdo->prepare($sql);

			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':descricao', $descricao);
			$sql->bindValue(':quantidade', $quantidade);
			$sql->execute();

			return true;
		}else{
			return false;
		}
	}*/

	/*			DELETE
	public function delProduto($id){
		$sql = "SELECT * FROM produtos WHERE PROD_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = "DELETE FROM produtos WHERE PROD_ID = $id";
			$sql = $this->pdo->query($sql);

			return true;
		}else{
			return false;
		}
	}*/
	
	
	
}

?>