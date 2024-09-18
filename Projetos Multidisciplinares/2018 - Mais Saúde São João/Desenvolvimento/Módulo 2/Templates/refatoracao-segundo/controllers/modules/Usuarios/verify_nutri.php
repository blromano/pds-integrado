
<?php

require_once "../../../classes/DAO/usuariosDAO.php";
$objUSU = new usuariosDAO();
require_once "../../../classes/DAO/nutricionistaDAO.php";
$objNUT = new nutricionistaDAO();

      $e = $objUSU->Verificar_CPF_Existente($_POST["cpf"]);

      if ($e==0){
          $e = $objUSU->Verificar_Email($_POST["email"]);
      }
      
       if($e==0){
        
          $e = $objNUT->Verificar_CRN_Existente($_POST["crn"]);
      }
      
      

    echo $e;
?>

