<?php
include_once("rec_conexao.php");

//codigo para procurar no banco os termos de acordo com a letra
if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".$servername.";port=3306;dbname=".$dbname, $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $stmt = $conn->prepare('SELECT EST_NOME_FANTASIA FROM estabelecimentos WHERE EST_NOME_FANTASIA LIKE :term');
	    $stmt->execute(array('term' => ''.$_GET['term'].'%'));
	    
	    while($row = $stmt->fetch()) {
	        $return_arr[] =  $row['EST_NOME_FANTASIA'];
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}
// fim do codigo para procurar no banco os termos de acordo com a letra

?>