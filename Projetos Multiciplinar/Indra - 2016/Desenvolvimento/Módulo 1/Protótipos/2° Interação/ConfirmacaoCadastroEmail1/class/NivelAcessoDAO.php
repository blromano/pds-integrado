<?php

include_once "Database.php";

class NivelAcessoDAO{

public function cadastrarNivel($nivelAcesso) {
	try {
		$db = Database::conectar();
		$query = "INSERT INTO niveis_de_acessos (NIV_ID, NIV_TIPO) VALUES(:NIV_ID, :NIV_TIPO)";
		$stmt = $db->prepare($query);
		$stmt->bindValue(":NIV_TIPO", $nivelAcesso->getTipo(), PDO::PARAM_STR);
		$stmt->bindValue(":NIV_ID",$nivelAcesso->getId() , PDO::PARAM_STR);
        //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $stmt->execute();
        //$usuario->setId($db->lastInsertId());
	} catch (PDOException $e) {
		echo $e->getMessage();
		exit();
	}
}

  // public function buscarNivelId($valor) {
  //   try {
  //       $db = Database::conectar();
  //       $nivel;
  //       $query = "SELECT * FROM niveis_de_acessos WHERE NIV_ID  = $valor";
  //       $stmt = $pdo->prepare($query);
  //       $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //       $stmt->execute();
  //       while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
  //       $nivel =  "Nome: {$linha['NIV_ID']} <br />";
  //       }
         
  //       return $nivel;
  //   } catch (PDOException $e) {
  //       echo $e->getMessage();
  //       exit();
  //   }

  //   $consulta = $pdo->query("SELECT nome, usuario FROM login;");
 
  




}


