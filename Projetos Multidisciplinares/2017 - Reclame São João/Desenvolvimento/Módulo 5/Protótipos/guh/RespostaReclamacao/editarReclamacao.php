<?php

include '../../../../controle/RespostaReclamacaoDAO.php';

$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
$php = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['nome']) && !empty($_POST['id'])){
		if ($tiposReclamacaoDAO->pesquisar_igual($_POST['nome'], $vincular) > 0) {
			echo "<script>alert('Categoria já existente!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}else{
			$tiposReclamacao->setId($_POST['id']);
			$tiposReclamacao->setCategoria($_POST['nome']);			                       
			$tiposReclamacaoDAO->editar($tiposReclamacao,$vincular);
			echo "<script>alert('Categoria editada com sucesso!')</script><script>window.location='../../../index.php?pagina=9';</script>";
		}
	}else{
		echo "<script>alert('Campo em branco!')</script><script>window.location='../../../index.php?pagina=9';</script>";
	}	
};
?> 

linha de comando do modal editar 
<li><a href="#" data-toggle="modal" data-target="#editar"     onclick='sendDataToFormEditar("<?php echo $linha["RER_ID"];?>","<?php echo $linha["REC_ID"];?>","<?php echo $linha["RER_resposta_reclamacao"];?>","<?php echo $linha["RER_DATA_HORA"];?>","<?php echo $linha["RER_STATUS_APROVADO"];?>","<?php echo $ADM ;?>","<?php echo $linha["REC_reclamacao"] ;?>","<?php echo $linha["USU_reclamacao"] ;?>","<?php echo $linha["RER_STATUS_RESOLVIDO"];?>","<?php echo $linha["Empresa"] ;?>")'><span class="fa fa-pencil" aria-hidden="true"></span> Alterar</a></li>