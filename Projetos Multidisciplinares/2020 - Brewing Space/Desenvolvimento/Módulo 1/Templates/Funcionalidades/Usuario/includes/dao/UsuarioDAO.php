<?php
require_once 'ConexaoDAO.php';

class UsuarioDAO {
    private $pdo;
    private $id;
    private $resposta;

    public function __construct() {
        $conn = new ConexaoDAO();
        $this->pdo = $conn->getConexao();
    }

    public function Login($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE USU_EMAIL = '$email' AND USU_SENHA = '$senha'";
        $sql = $this->pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return $sql->fetch(PDO::FETCH_OBJ);
        }else {
            return false;
        }
    }	
}
?>

