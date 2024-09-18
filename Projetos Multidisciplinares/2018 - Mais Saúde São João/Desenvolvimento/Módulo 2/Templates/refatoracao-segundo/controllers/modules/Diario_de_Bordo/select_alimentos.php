<?php
include ('classes/DAO/ALIMENTOS_DAO.php');
include ('classes/DAO/ALIMENTOS_FAVORITOS_DAO.php');


$usuario = 1; 
$obj_can_dao = new ALIMENTOS_DAO();
$alimentos = $obj_can_dao->select_alimentos();

$obj_can_dao_fav = new ALIMENTOS_FAVORITOS_DAO();
$alimentos_favoritos = $obj_can_dao_fav-> select_alimentos_favoritos($usuario);

if (isset($_POST["procurar_alimento"]) && ($_POST["procurar_alimento"] != "")) {
    $pesquisa_alimentos = $_POST["procurar_alimento"];
    $cont_pesquisa = 0;
    $alimento_busca = $obj_can_dao->select_alimentos_busca($pesquisa_alimentos);
    foreach($alimento_busca as $row){
        $cont_pesquisa = 1;
        echo "  
                <!-- jquery -->
                <script src='//code.jquery.com/jquery-1.11.0.min.js'></script>
                <!-- bootstrap -->
                <script type='text/javascript' src='js/bootstrap.js'></script>
            <!-- chamada da função -->
            <script type='text/javascript'>
                $(window).load(function() {
                    $('#myModal6').modal('show');
                });
              </script>
              ";
        $cont_pesquisa++;
        break;
    }
    if($cont_pesquisa < 1){
        echo "  
                <!-- jquery -->
                <script src='//code.jquery.com/jquery-1.11.0.min.js'></script>
                <!-- bootstrap -->
                <script type='text/javascript' src='js/bootstrap.js'></script>
            <!-- chamada da função -->
            <script type='text/javascript'>
                $(window).load(function() {
                    $('#myModal5').modal('show');
                });
              </script>
              ";
    }
        
    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

