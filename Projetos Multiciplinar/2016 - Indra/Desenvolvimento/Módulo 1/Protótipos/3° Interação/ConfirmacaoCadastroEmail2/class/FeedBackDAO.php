<?php
include_once "Database.php";

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

	} catch (PDOException $e) {
            echo $e->getMessage();

            exit();
        }
    }
}


?>