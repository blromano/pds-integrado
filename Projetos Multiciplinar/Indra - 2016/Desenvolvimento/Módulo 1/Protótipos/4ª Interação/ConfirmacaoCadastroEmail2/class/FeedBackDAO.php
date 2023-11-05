<?php
include_once "Database.php";
include_once "FeedBack.php";

class FeedBackDAO{

	public function CadastrarFeedBack($FEE_TOPICO, $FEE_MENSAGEM, $USU_ID, $FEE_DATA_HORA_ENVIO, $FEE_VISUALIZADO){
        try {
			
		$db = Database::conectar();

		 $query = "INSERT INTO feedback (FEE_TOPICO, FEE_MENSAGEM, USU_ID, FEE_DATA_HORA_ENVIO, FEE_VISUALIZADO) VALUES(:FEE_TOPICO, :FEE_MENSAGEM, :USU_ID, :FEE_DATA_HORA_ENVIO, :FEE_VISUALIZADO )";
         $stmt = $db->prepare($query);
         $stmt->bindValue(":FEE_TOPICO", $FEE_TOPICO, PDO::PARAM_STR);
            $stmt->bindValue(":FEE_MENSAGEM", $FEE_MENSAGEM, PDO::PARAM_STR);
            $stmt->bindValue(":USU_ID", $USU_ID, PDO::PARAM_STR);
            $stmt->bindValue(":FEE_DATA_HORA_ENVIO", $FEE_DATA_HORA_ENVIO, PDO::PARAM_STR);  
            $stmt->bindValue(":FEE_VISUALIZADO", false, PDO::PARAM_STR); 
            $stmt->execute(); 
            return true;

	} catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            exit();
        }
    }
	
	public function Listar() {
        try {
            
			$db = Database::conectar();

            $sql = "select * from feedback";

            $prepare = $db->prepare($sql);

            $prepare->execute();
            
            $fetch = $prepare->fetchAll(PDO::FETCH_ASSOC);	

            $lista = array();
            
            
            foreach ($fetch as $linha) {
                
                $lista[] = new FeedBack($linha["FEE_TOPICO"], $linha["FEE_VISUALIZADO"], $linha["FEE_ID"],$linha["FEE_MENSAGEM"], $linha["USU_ID"], $linha["FEE_DATA_HORA_ENVIO"]);
                
            }
            
            return $lista;
			
        } catch (PDOException $ex) {
            Erro::ErroBD($ex);
        }
    }

   

     public function MostrarMensagem($id) {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM feedback WHERE FEE_ID = :id ";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":id", $id, PDO::PARAM_STR);
            //$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$valor = [];
            $stmt->execute();
            
            $valor = $stmt->fetch(PDO::FETCH_ASSOC);
            return $valor;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

      public function buscarUsuario($USU_ID) {
        try {
            $db = Database::conectar();
            $query = "SELECT * FROM usuarios WHERE USU_ID = :USU_ID";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":USU_ID", $USU_ID, PDO::PARAM_STR);
            
            $stmt->execute();
            
           $valor =  $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $valor;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }



	
	
	
	
	
	
}


?>