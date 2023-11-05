<?php

$EstabelecimentosDAO = new EstabelecimentosDAO;
$AvaliacoesDAO = new AvaliacoesDAO;
$ReclamacaoDAO = new ReclamacoesDAO;
$ConsumidorDAO = new ConsumidorDAO;
$UsuarioDAO = new UsuarioDAO;
$RespostaReclamacaoDAO = new RespostaReclamacaoDAO;
$ConsideracaoFinalDAO = new ConsideracaoFinalDAO;

$USU_EMAIL = $ReclamacaoDAO->retornandoEmail();
//print_r($USU_EMAIL);
$USU_ID = $UsuarioDAO->buscarUsuario($USU_EMAIL);
//print_r($USU_ID);
$CON_ID = $ConsumidorDAO->idCon($USU_ID);
//print_r($CON_ID);
$EST_NOME = $EstabelecimentosDAO->estabelecimentoNomeReclamacao($CON_ID);
//print_r($EST_NOME);
$resultado = $ReclamacaoDAO->obterReclamacoesPorConID($CON_ID);
//print_r($resultado);
$string = $ReclamacaoDAO->stringTamanho();
//print_r($string);
$CONT_NOME = $ReclamacaoDAO->contarNome($EST_NOME);
//print_r($CONT_NOME);
$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
//print_r($string);

$_SESSION['CON_ID'] = $CON_ID;
?>

<!DOCTYPE HTML>
<html lang="en">

<body>

<div class="gerenciar_div_reclamacao">
<div class="gerenciar_div_reclamacao_responsivo_1">
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Estabelecimento</th>
			<th>Status<div class="popup" onclick="myFunction()"><i class="fa fa-info-circle" aria-hidden="true"></i>
			<span class="popuptext" id="myPopup">
			<span id="status">Pendente:  </span> aguardando a aprovação do adm <br/>
			<span id="status">Publicado: </span> enviado ao estabelecimento <br/>
			<span id="status">Respondido:</span> estabelecimento enviou uma resposta <br/>
			<span id="status">Suspensa:  </span> recusado pelo adm <br/>
			<span id="status">Finalizado:</span> reclamação chegou a uma solucao <br/>
			</span>
			</div></th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	$cont=0;
	$cont2=0;
	$status="";
	foreach ($resultado as $row):
		
		echo "<tr>";
		echo "<td>#".$row['REC_ID']."</td>";
		
		$REC_ID = $row["REC_ID"];
		$RER_STATUS_APROVADO = $RespostaReclamacaoDAO->selecionarStatus($REC_ID);
		$resultado_consideracao_final = $ConsideracaoFinalDAO->listarInformacoes($REC_ID);
		
		echo "<td>".ucprimeiro(limitar($row["REC_TITULO_RECLAMACAO"],40))."</td>";
		echo "<td>".limitar("$CONT_NOME[$cont]",40)."</td>";
		
		$cont++;
		if ($row["REC_APROVADO"] == 0): echo "<td><span class='label label-warning'>Pendente</span></td>";
		$status = 'Pendente';
		elseif ($row["REC_APROVADO"] == 1): 
		
		if($resultado_consideracao_final!=null):
		echo "<td><span class='label label-default'>Finalizada</span></td>";
		$status = 'Finalizada';
		else:
		
		if($RER_STATUS_APROVADO==1):
		echo "<td><span class='label label-default'>Respondida</span></td>";
		$status = 'Respondida';
		
		else:
		echo "<td><span class='label label-default'>Publicada</span></td>";
		$status = 'Publicada';
		
		endif;
		endif;
		
		elseif ($row["REC_APROVADO"] == -1): 
		echo "<td><span class='label label-danger'>Suspensa</span></td>";
		$status = 'Suspensa';
		endif;
	
	?>
	<td>
	<?php if($status == 'Pendente'): ?>
	
		<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#remover<?php echo $row['REC_ID']; ?>">Apagar</button>
		<button type="button" class="btn btn-xs btn-info disabled">Ir</button>
		
	<?php elseif($status == 'Finalizada'): ?>
	
		<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<button type="button" class="btn btn-xs btn-warning disabled" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<button type="button" class="btn btn-xs btn-danger disabled" data-toggle="modal" data-target="#remover<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button type="button" class="btn btn-xs btn-info">Ir</button></a>
		
	<?php elseif($status == 'Respondida'): ?>
	
		<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<button type="button" class="btn btn-xs btn-warning disabled" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<button type="button" class="btn btn-xs btn-danger disabled" data-toggle="modal" data-target="#remover<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button type="button" class="btn btn-xs btn-info">Ir</button></a>
		
	<?php elseif($status == 'Publicada'): ?>
	
		<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<button type="button" class="btn btn-xs btn-warning disabled" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<button type="button" class="btn btn-xs btn-danger disabled" data-toggle="modal" data-target="#remover<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button type="button" class="btn btn-xs btn-info">Ir</button></a>
		
	<?php elseif($status == 'Suspensa'): ?>
	
		<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<button type="button" class="btn btn-xs btn-warning disabled" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#remover<?php echo $row['REC_ID']; ?>">Apagar</button>
		<button type="button" class="btn btn-xs btn-info disabled">Ir</button>
		
	<?php endif; ?>
	</td>
	<?php
		echo "</tr>";
		endforeach;
	?>
		
	</tbody>
	</table>
	</div>
	
	<?php
	foreach ($resultado as $row):
	?>
	
	<!-- Modal visualizar -->
	<div class="modal fade" id="myModal<?php echo $row['REC_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title">Detalhes da Reclamação #<?php echo $row['REC_ID']; ?></h4>
	</div>
	<div class="modal-body">
	<ul class="list-group">
	<li class="list-group-item">ID: <span class="pull-right">#<?php echo $row['REC_ID']; ?></span></li>
	<li class="list-group-item">Título: <span class="pull-right"><?php echo ucprimeiro($row['REC_TITULO_RECLAMACAO']); ?></span></li>
	<li class="list-group-item">Data e Hora<span class="pull-right"><?php echo $row['REC_DATA_HORA']; ?></span></li>
	<li class="list-group-item">Empresa alvo: <span class="pull-right"><?php echo limitar("$CONT_NOME[$cont2]",40); ?></span></li>
	<li class="list-group-item">Status: <span class="pull-right">
	<?php 
	$REC_ID_MODAL = $row["REC_ID"];
	$RER_STATUS_APROVADO = $RespostaReclamacaoDAO->selecionarStatus($REC_ID_MODAL);
	$resultado_consideracao_final = $ConsideracaoFinalDAO->listarInformacoes($REC_ID_MODAL);
	
	if ($row["REC_APROVADO"] == 0): 
	echo "Pendente";
	elseif ($row["REC_APROVADO"] == 1): 
	
	if($resultado_consideracao_final!=null):
	echo "Finalizada";
	else:

	if($RER_STATUS_APROVADO==1):
	echo "Respondida";

	else:
	echo "Publicada";

	endif;
	endif;

	elseif ($row["REC_APROVADO"] == -1): 
	echo "Suspensa";
	endif;
	
	$cont2++;
	?>
	</span></li>
	
	<li class="list-group-item">Nota: <span class="pull-right"><?php echo $row['REC_NOTA']; ?></span></li>
	<br/><span>Reclamação:</span><div class="well"><?php echo ucprimeiro($row['REC_DESCRICAO']); ?></div>
	</ul>
	</div>
	<div class="modal-footer">
	<button type="button" class="default" data-dismiss="modal" id="botao">Fechar</button>
	</div></div></div></div>

	<!-- Modal editar -->
	<div id="exampleModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title"></h4>
	</div>
	<div class="modal-body">
	<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod02/editarReclamacao.php" enctype="multipart/form-data">
	<div class="form-group">
	<label for="recipient-name" class="control-label">Tituto:</label>
	<input name="nome" type="text" class="form-control" id="recipient-name" required="required">
	</div>
	<div class="form-group">
	<label for="message-text" class="control-label">Descrição:</label>
	<textarea name="detalhes" class="form-control" id="detalhes" required="required"></textarea>
	</div>
	
	<input name="id" type="hidden" class="form-control" id="id-curso" value="">
	
	<button type="button" class="success" id="botao" data-dismiss="modal">Cancelar</button>
	<button type="submit" class="danger" id="botao">Alterar</button>
	</form>
	</div></div></div></div>

	<!-- Modal remover -->
	<div id="remover<?php echo $row['REC_ID']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Exclusão da Reclamação #<?php echo $row['REC_ID']; ?></h4>
	</div>
	<div class="modal-body">
	<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod02/apagarReclamacao.php?id=<?php echo $row['REC_ID']; ?>" enctype="multipart/form-data">
	<div class="form-group">
	<label for="message-text" class="control-label">Descrição:</label>
	<textarea name="descricao" class="form-control" id="descricao" required="required"></textarea>
	</div>
	
	<button type="button" class="success" id="botao" data-dismiss="modal">Cancelar</button>
	<button type="submit" class="danger" id="botao">Confirmar</button>
	</form>
	</div></div></div></div>
	
	<?php endforeach; ?>

</div>

<center>
<div class="gerenciar_div_responsivo_reclamacao">
<div class="gerenciar_div_reclamacao_responsivo_2">
<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Título</th>
			<th>Estabelecimento</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>

	<?php
	$cont=0;
	$cont2=0;
	$status="";
	foreach ($resultado as $row):
		
		echo "<tr>";
		echo "<td>#".$row["REC_ID"]."</td>";
		$REC_ID = $row["REC_ID"];
		$RER_STATUS_APROVADO = $RespostaReclamacaoDAO->selecionarStatus($REC_ID);
		$resultado_consideracao_final = $ConsideracaoFinalDAO->listarInformacoes($REC_ID);
		echo "<td>".ucprimeiro(limitar($row["REC_TITULO_RECLAMACAO"],40))."</td>";
		echo "<td>".limitar("$CONT_NOME[$cont]",40)."</td>";
		$cont++;
		
	if ($row["REC_APROVADO"] == 0):
	$status = 'Pendente';
	elseif ($row["REC_APROVADO"] == 1): 

	if($resultado_consideracao_final!=null):
	$status = 'Finalizada';
	else:

	if($RER_STATUS_APROVADO==1):
	$status = 'Respondida';

	else:
	$status = 'Publicada';

	endif;
	endif;

	elseif ($row["REC_APROVADO"] == -1): 
	$status = 'Suspensa';
	endif;
	
	?>
	
	<td>
	<div class="dropdown">
	<button class="dropbtn">Ações</button>
	<div class="dropdown-content">
	
	<?php if($status == 'Pendente'): ?>
		<a><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal2<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<a><button type="button" class="btn btn-xs btn-warning" id="rec_gerenciar_button_editar" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<a><button type="button" class="btn btn-xs btn-danger" id="rec_gerenciar_button_apagar" data-toggle="modal" data-target="#remover2<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button id="rec_gerenciar_button_ir" type="button" class="btn btn-xs btn-info disabled">Ir</button></a>
	<?php elseif($status == 'Finalizada'): ?>
	
		<a><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal2<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<a><button type="button" class="btn btn-xs btn-warning disabled" id="rec_gerenciar_button_editar" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<a><button type="button" class="btn btn-xs btn-danger disabled" id="rec_gerenciar_button_apagar" data-toggle="modal" data-target="#remover2<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button type="button" id="rec_gerenciar_button_ir" class="btn btn-xs btn-info">Ir</button></a>
		
	<?php elseif($status == 'Respondida'): ?>
	
		<a><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal2<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<a><button type="button" class="btn btn-xs btn-warning disabled" id="rec_gerenciar_button_editar" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<a><button type="button" class="btn btn-xs btn-danger disabled" id="rec_gerenciar_button_apagar" data-toggle="modal" data-target="#remover2<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button type="button" id="rec_gerenciar_button_ir" class="btn btn-xs btn-info">Ir</button></a>
		
	<?php elseif($status == 'Publicada'): ?>
	
		<a><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal2<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<a><button type="button" class="btn btn-xs btn-warning disabled" id="rec_gerenciar_button_editar" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<a><button type="button" class="btn btn-xs btn-danger disabled" id="rec_gerenciar_button_apagar" data-toggle="modal" data-target="#remover2<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button type="button" id="rec_gerenciar_button_ir" class="btn btn-xs btn-info">Ir</button></a>
		
	<?php elseif($status == 'Suspensa'): ?>
	
		<a><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal2<?php echo $row['REC_ID']; ?>">Visualizar</button>
		<a><button type="button" class="btn btn-xs btn-warning disabled" id="rec_gerenciar_button_editar" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $row['REC_ID']; ?>" data-whatevernome="<?php echo $row['REC_TITULO_RECLAMACAO']; ?>" data-whateverdetalhes="<?php echo $row['REC_DESCRICAO']; ?>">Editar</button>
		<a><button type="button" class="btn btn-xs btn-danger" id="rec_gerenciar_button_apagar" data-toggle="modal" data-target="#remover2<?php echo $row['REC_ID']; ?>">Apagar</button>
		<a href='rec_conversa.php?REC_ID=<?php echo $REC_ID; ?>' target='_blank'><button type="button" id="rec_gerenciar_button_ir" class="btn btn-xs btn-info disabled">Ir</button></a>
		
	<?php endif; ?>
	
	</div>
	</div>
	</td>
	<?php
		echo "</tr>";
		endforeach;
	?>
		
	</tbody>
	</table>
	</div>
	
	<?php
	foreach ($resultado as $row):
	?>

	<!-- Modal visualizar -->
	<div class="modal fade" id="myModal2<?php echo $row['REC_ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title">Detalhes da Reclamação #<?php echo $row['REC_ID']; ?></h4>
	</div>
	<div class="modal-body">
	<ul class="list-group">
	<li class="list-group-item">ID: # <span class="pull-right"><?php echo $row['REC_ID']; ?></span></li>
	<li class="list-group-item">Título: <span class="pull-right"><?php echo ucprimeiro($row['REC_TITULO_RECLAMACAO']); ?></span></li>
	<li class="list-group-item">Data e Hora: <span class="pull-right"><?php echo $row['REC_DATA_HORA']; ?></span></li>
	<li class="list-group-item">Empresa alvo: <span class="pull-right"><?php echo "$CONT_NOME[$cont2]"; ?></span></li>
	<li class="list-group-item">Status: <span class="pull-right">
	<?php 
	$REC_ID_MODAL = $row["REC_ID"];
	$RER_STATUS_APROVADO = $RespostaReclamacaoDAO->selecionarStatus($REC_ID_MODAL);
	$resultado_consideracao_final = $ConsideracaoFinalDAO->listarInformacoes($REC_ID_MODAL);
	
	if ($row["REC_APROVADO"] == 0): 
	echo "Pendente";
	elseif ($row["REC_APROVADO"] == 1): 
	
	if($resultado_consideracao_final!=null):
	echo "Finalizada";
	else:

	if($RER_STATUS_APROVADO==1):
	echo "Respondida";

	else:
	echo "Publicada";

	endif;
	endif;

	elseif ($row["REC_APROVADO"] == -1): 
	echo "Suspensa";
	endif;
	
	$cont2++;
	?>
	</span></li>
	
	<li class="list-group-item">Nota: <span class="pull-right"><?php echo $row['REC_NOTA']; ?></span></li>
	<br/><span>Reclamação:</span><div class="well"><?php echo ucprimeiro($row['REC_DESCRICAO']); ?></div>
	</ul>
	</div>
	<div class="modal-footer">
	<button type="button" class="default" data-dismiss="modal" id="rec_botao_responsivo_alterar">Fechar</button>
	</div></div></div></div>

	<!-- Modal editar -->
	<div id="exampleModal2" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title"></h4>
	</div>
	<div class="modal-body">
	<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod02/editarReclamacao.php" enctype="multipart/form-data">
	<div class="form-group">
	<label for="recipient-name" class="control-label">Tituto:</label>
	<input name="nome" type="text" class="form-control" id="recipient-name" required="required">
	</div>
	<div class="form-group">
	<label for="message-text" class="control-label">Descrição:</label>
	<textarea name="detalhes" class="form-control" id="detalhes" required="required"></textarea>
	</div>
	
	<input name="id" type="hidden" class="form-control" id="id-curso" value="">
	<center>
	<button type="button" class="success" id="rec_botao_responsivo_cancelar" data-dismiss="modal">Cancelar</button></td>
	<button type="submit" class="danger" id="rec_botao_responsivo_alterar">Alterar</button></td>
	</center>
	</form>
	</div></div></div></div>

	<!-- Modal remover -->
	<div id="remover2<?php echo $row['REC_ID']; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Exclusão da Reclamação #<?php echo $row['REC_ID']; ?></h4>
	</div>
	<div class="modal-body">
	<form method="POST" action="http://localhost/RECLAME_SAO_JOAO-INTEGRAR/php/mod02/apagarReclamacao.php?id=<?php echo $row['REC_ID']; ?>" enctype="multipart/form-data">
	<div class="form-group">
	<label for="message-text" class="control-label">Descrição:</label>
	<textarea name="descricao" class="form-control" id="descricao" required="required"></textarea>
	</div>
	
	<button type="button" class="success" id="rec_botao_responsivo_cancelar" data-dismiss="modal">Cancelar</button>
	<button type="submit" class="danger" id="rec_botao_responsivo_alterar">Confirmar</button>
	</form>
	</div></div></div></div>
	
	<?php endforeach; ?>

	</div>
	</center>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/modalgerenciar.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/formulario.js"></script>
	<script type="text/javascript" src="js/dropdown_active.js"></script>

</body>
</html>