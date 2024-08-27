<?php
require_once 'PDO.php';

class Admin{
	private $pdo;

	public function __construct() {
		$conn = new Conexao();
        $this->pdo = $conn->getConexao();
	}

	public function login($user, $senha) {

		$sql = "SELECT * FROM admin WHERE login = :user AND senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':user', $user);
		$sql->bindValue(':senha', $senha);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return false;
		}
	}

	public function usuarios(){
		$sql = "SELECT * FROM usuarios";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
				return $sql->fetchAll(PDO::FETCH_OBJ);
		} else {
			return false;
		}
	}


}
?>