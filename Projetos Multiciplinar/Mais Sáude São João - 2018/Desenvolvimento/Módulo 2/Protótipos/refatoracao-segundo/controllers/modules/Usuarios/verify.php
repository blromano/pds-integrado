
<?php

require_once "../../../classes/DAO/usuariosDAO.php";
$objUSU = new usuariosDAO();
require_once "../../../classes/DAO/educador_fisicoDAO.php";
$objEDF = new educador_fisicoDAO();


      $e = $objUSU->Verificar_CPF_Existente($_POST["cpf"]);

      if ($e==0){
          $e = $objUSU->Verificar_Email($_POST["email"]);
      }
       if($e==0){
        
          $e = $objEDF->Verificar_CREF_Existente($_POST["cref"]);
      }
      
      

    echo $e;
?>

