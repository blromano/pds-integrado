<?php
session_start();

include_once("rec_conexao.php");
//Recuperar o id da URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

$result_cursos = "DELETE FROM reclamacoes WHERE REC_ID=$id";
$resultado_cursos = mysqli_query($conn, $result_cursos);	


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
	</head>

	<body>
		<?php
		if (mysqli_affected_rows($conn) != 0 ){	
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/RECLAME_SAO_JOAO-INTEGRAR/rec_gerenciar.php?pagina=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário apagado com Sucesso.\");
				</script>
			";		   
		}
		 else{ 	
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/loja/RECLAME_SAO_JOAO-INTEGRAR/rec_gerenciar.php?pagina=2'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi apagado com Sucesso.\");
				</script>
			";		   

		}

		?>
	</body>
</html>