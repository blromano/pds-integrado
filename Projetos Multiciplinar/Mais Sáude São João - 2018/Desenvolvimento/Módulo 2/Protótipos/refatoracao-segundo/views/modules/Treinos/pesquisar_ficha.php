<?php
// Conexão com o banco de dados
$conn = @mysql_connect("mysql:host=localhost;dbname=MOD04","root","") or die("Não foi possível a conexão com o Banco");
// Selecionando banco
$db = @mysql_select_db("MOD04", $conn) or die("Não foi possível selecionar o Banco");

// Recuperamos a ação enviada pelo formulário
function selecionar($fichas_treinamento) {
$parametro = trim($_POST['pesquisar']);
	$sql = mysql_query("SELECT * FROM mod04.fichas_de_treinamento WHERE  FTR_DESCRICAO_PRINCIPAIS_EXERCICIOS LIKE '%".$parametro."%' ORDER BY nome");
	$row = mysql_num_rows($sql);
	if ($row != 0) {
            header("location:?mod=treinos&sub=listar_ficha_treinamento");
		
        }

}
?>