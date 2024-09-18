<?php
        include '../controle/RespostaReclamacaoDAO.php';
	$ReclamacaoDAO = new RespostaReclamacaoDAO();
	$registro = $ReclamacaoDAO->listarADM();
        
	
?>
<script>
	function sendDataToFormVisualizar(id,idReclama,Respostareclamacao,Dataresposta,aprovado,admnome,reclamacao,usuReclama,resolvido,usuResposta) {
		document.getElementById("LabelVisid").innerHTML ="#"+id;
                    document.getElementById("IDreclama").innerHTML ="#"+idReclama;
                document.getElementById("USUReclama").innerHTML =usuReclama;
                document.getElementById("Data").innerHTML =Dataresposta;
                document.getElementById("adm").innerHTML =admnome;
                document.getElementById("resReclama").innerHTML =Respostareclamacao;
                
                var txtAprovado = "";
                    if (aprovado == 1){txtAprovado = "<td><span class='label label-warning'>Pendente</span></td>";}
                    if (aprovado == 2){txtAprovado ="<td><span class='label label-success'>Publicado</span></td>";}                                    
                    if (aprovado == 3){txtAprovado ="<td><span class='label label-danger'>Suspenso</span></td>";}
                
                document.getElementById("StatosAprovado").innerHTML= txtAprovado;
   
                var txtResolvido = "";
                    if (resolvido == 1){txtResolvido = "<td><span class='label label-warning'>Pendente</span></td>";}
                    if (resolvido == 2){txtResolvido ="<td><span class='label label-success'>Resolvido</span></td>";}
                    if (resolvido == 0){txtResolvido ="<td><span class='label label-warning'>Pendente</span></td>";}                           
                    if (resolvido == 3){txtResolvido ="<td><span class='label label-danger'>Não Resolvido</span></td>";}
                                
                document.getElementById("StatosResolvido").innerHTML =txtResolvido;
                document.getElementById("Reclamacao").innerHTML =reclamacao;
                document.getElementById("usuResposta").innerHTML =usuResposta;
	}
	function sendDataToFormEditar(id,idReclama,Respostareclamacao,Dataresposta,aprovado,admnome,reclamacao,usuReclama,resolvido,usuResposta) {
		document.getElementById("IDRespostaReclama").value ="#"+id;
                document.getElementById("IDReclama").value ="#"+idReclama;
                document.getElementById("NomeUSU").value =usuReclama;
                document.getElementById("Data1").innerHTML =Dataresposta;
                document.getElementById("adm").value =admnome;
                document.getElementById("Resposta1").value =Respostareclamacao;
                document.getElementById("Statos1").value =aprovado;
                document.getElementById("Statos2").value =resolvido;
                document.getElementById("Reclama1").value =reclamacao;
                document.getElementById("NomeUSUR").value =usuResposta;		
	}
        function sendDataToFormSuspender(num,id,idusu) {
		document.getElementById("statusSuspender").innerHTML ="#"+id;
                document.getElementById("statusSuspender2").innerHTML ="#"+id;
                document.getElementById("modSuspender").value = num;
                document.getElementById("idstatus").value = id;
                document.getElementById("idusu").value = idusu;
	}        
        function sendDataToFormPublicar(num,id,idusu2) {
		document.getElementById("statusPublicar").innerHTML ="#"+id;
                document.getElementById("statusPublicar2").innerHTML ="#"+id;
                document.getElementById("modPublicar").value = num;
                document.getElementById("idstatus2").value = id;
                document.getElementById("idusu2").value = idusu2;
 	} 
        function sendDataToFormRemover(id) {
		document.getElementById("LabelDelid").innerHTML ="#"+id;
                document.getElementById("LabelDelid2").innerHTML ="#"+id;
                document.getElementById("idDelet").value =id;
		
	}
</script>

<table id="table" class="table table-bordered table-hover">
	<thead>
		<tr>
                        <th>ID</th>
			<th>Usuário Resposta da Reclamação</th>
			<th>Resposta da Reclamação</th>
			<th>Data da Resposta Reclamação</th>			
                        <th>Usuário da reclamação</th>
                        <th>Status Aprovaçao</th>
                        <th>Status Resalvido</th>
                        <th>Adm que editou</th>
			<th>Ações</th>
		</tr>
	</thead>
        <!-- Dados do banco para geraçao do Corpo da tabela -->
	<tbody>
			<?php foreach($registro as $linha) { ?>
		<tr>
			<td><?php echo $linha['RER_ID'];?></td>
			<td><?php echo $linha['Empresa'];?></td>
                        <td><?php echo $linha['RER_resposta_reclamacao'];?></td>
                        <td><?php echo $linha['RER_DATA_HORA'];?></td>
                        <td><?php echo $linha['USU_reclamacao'];?></td>
                        <?php if ($linha['RER_STATUS_APROVADO'] == 2){ echo "<td><span class='label label-success'>Publicado</span></td>";}
                                elseif ($linha['RER_STATUS_APROVADO'] == 1) {echo "<td><span class='label label-warning'>Pendente</span></td>";}
                                elseif ($linha['RER_STATUS_APROVADO'] == 3){ echo "<td><span class='label label-danger'>Suspensa</span></td>";}
                                ?>
                        <?php if ($linha['RER_STATUS_RESOLVIDO'] == 2){ echo "<td><span class='label label-success'>Resolvido</span></td>";}
                                elseif ($linha['RER_STATUS_RESOLVIDO'] == 0) {echo "<td><span class='label label-warning'>Pendente</span></td>";}
                                elseif ($linha['RER_STATUS_RESOLVIDO'] == 1) {echo "<td><span class='label label-warning'>Pendente</span></td>";}
                                elseif ($linha['RER_STATUS_RESOLVIDO'] == 3){ echo "<td><span class='label label-danger'>Não Resolvido</span></td>";}
                                ?>
                        <?php $ADM=$ReclamacaoDAO->buscarNomeAdministrador($linha['ADM_ID']);?>
                        <td><?php echo $ADM;?></td>
			<td>
				<div class="dropdown">
                                  <span style="cursor:pointer" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog" aria-hidden="true"></i> Gerenciamento
                                  <span class="caret"></span></span>
                                  <ul class="dropdown-menu">
                                      <!--Chamada das telas de sobreposiçao-->
                                        <li><a href="#" data-toggle="modal" data-target="#visualizar" onclick='sendDataToFormVisualizar("<?php echo $linha["RER_ID"];?>","<?php echo $linha["REC_ID"];?>","<?php echo $linha["RER_resposta_reclamacao"];?>","<?php echo $linha["RER_DATA_HORA"];?>","<?php echo $linha["RER_STATUS_APROVADO"];?>","<?php echo $ADM ;?>","<?php echo $linha["REC_reclamacao"] ;?>","<?php echo $linha["USU_reclamacao"] ;?>","<?php echo $linha["RER_STATUS_RESOLVIDO"];?>","<?php echo $linha["Empresa"] ;?>")'><span class="fa fa-eye" aria-hidden="true"></span>Visualizar </a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#editar" onclick='sendDataToFormEditar("<?php echo $linha["RER_ID"];?>","<?php echo $linha["REC_ID"];?>","<?php echo $linha["RER_resposta_reclamacao"];?>","<?php echo $linha["RER_DATA_HORA"];?>","<?php echo $linha["RER_STATUS_APROVADO"];?>","<?php echo $ADM ;?>","<?php echo $linha["REC_reclamacao"] ;?>","<?php echo $linha["USU_reclamacao"] ;?>","<?php echo $linha["RER_STATUS_RESOLVIDO"];?>","<?php echo $linha["Empresa"] ;?>")'><span class="fa fa-pencil" aria-hidden="true"></span>Editar </a></li>

                                        <li><a href="#" data-toggle="modal" data-target="#suspender"  onclick='sendDataToFormSuspender(3,"<?php echo $linha["RER_ID"];?>","<?php echo $linha["REC_ID"];?>")'><span class="fa fa-ban" aria-hidden="true"></span> Suspender</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#publicar"   onclick='sendDataToFormPublicar(2,"<?php echo $linha["RER_ID"];?>","<?php echo $linha["REC_ID"];?>")'><span class="fa fa-check" aria-hidden="true"></span> Publicar</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#remover"    onclick='sendDataToFormRemover("<?php echo $linha["RER_ID"];?>")'><span class="fa fa-remove" aria-hidden="true"></span> Remover</a></li>
                                        
                                  </ul>
                                </div>
			</td>
		</tr>
		<?php } ?>
						
	</tbody>
</table>

<!-- Modal visualizar -->
<div id="visualizar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Detalhes da Resposta:<span id="LabelVisid"></span></h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">	
                                        <li class="list-group-item">ADM que editou: <span id="adm"></span></li>
                                        <li class="list-group-item">Statos Resolvido: <span id="StatosResolvido"></span></li>
                                        <li class="list-group-item">Statos de aprovação: <span id="StatosAprovado"></span></li>
                                        <li class="list-group-item">ID Reclamação: <span id="IDreclama"></span></li>
					<li class="list-group-item">Usuário da reclamação: <span id="USUReclama"></span></li>					
					<li class="list-group-item">Reclamação: <span id="Reclamacao"></span></li>                                        
                                        <li class="list-group-item">Usuário da Resposta Reclamação: <span id="usuResposta"></span></li>                                     
                                        <li class="list-group-item">Data: <span id="Data"></span></li>
					<br><span>Resposta:</span>
					<div id="resReclama"></div>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal editar -->
<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Alteração da Resposta <span id=""></h4>
			</div>
			<div class="modal-body">
				<form action="paginas/gerenciamento/RespostaReclamacao/editarReclamacao.php" method="post">
				<ul class="list-group">
                                    <li class="list-group-item">ID: <span class="pull-right"><input type="text" class="form-control" value="" id="IDRespostaReclama" disabled></span></li>
                                    <li class="list-group-item">Statos Resolvido: <span class="pull-right">
                                                                                        <select class="form-control" id="Statos2"  name="statuR" required>
                                                                                            <option> Selecione</option>                                                                       
                                                                                            <option name="StatusR" value="1">Pendente</option>
                                                                                            <option name="StatusR" value="3">Não Resolvido</option>
                                                                                            <option name="StatusR" value="2">Resolvido</option>                                                                                               	
                                                                                        </select>
                                                                                    </span>
                                    </li>
                                    <li class="list-group-item">Statos de aprovação: <span class="pull-right"><span class="pull-right">
                                                                                        <select class="form-control" id="Statos1"  name="Statua" required>
                                                                                            <option> Selecione</option>                                                                       
                                                                                            <option name="StatusA" value="1">Pendente</option>
                                                                                            <option name="StatusA" value="3">Suspenso</option>
                                                                                            <option name="StatusA" value="2">Publicado</option>                                                                                               	
                                                                                        </select>
                                                                                    </span>
                                    </li>
                                    <li class="list-group-item">ID Reclamação: <span class="pull-right"><input type="text" class="form-control" value="" id="IDReclama" disabled></span></li>
                                    <li class="list-group-item">Usuário da reclamação: <span class="pull-right"><input type="text" class="form-control" value="" id="NomeUSU"></span></li>
                                    <br><span>Reclamação:</span> 
                                    <div class="well"><textarea class="form-control" rows="3" value="" id="Reclama1" ></textarea></div>                                    
                                    <li class="list-group-item">Data: <span id="Data1"></span></li>
                                    <li class="list-group-item">Usuário da Resposta Reclamação:<span class="pull-right"><input type="text" class="form-control" value="" id="NomeUSUR"></span></li>
                                    <br><span>Resposta:</span>
                                    <div class="well"><textarea class="form-control" rows="3" value="" id="Resposta1"></textarea></div>                                        
				</ul>
				
			</div>
			<div class="modal-footer">
                            <button type="submit" class="btn btn-success">Salvar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
    </form>
		</div>
	</div>
</div>

<!-- Modal suspender -->
<div id="suspender" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Suspensão da Resposta <span id="statusSuspender"></span></h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja suspender a resposta <span id="statusSuspender2"></span> ?</p>
			</div>
			<div class="modal-footer">
                            <form action="paginas/gerenciamento/RespostaReclamacao/Autorizacao.php" method="post">
                                    <input type="hidden" name="reprova" id="modSuspender">
                                    <input type="hidden" name="idstatus" id="idstatus">   
                                    <input type="hidden" name="idusu" id="idusu">
                                <button type="submit" class="btn btn-danger">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                           </form>     
			</div>
		</div>
	</div>
</div>

<!-- Modal publicar -->
<div id="publicar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Publicação da Resposta <sapn id="statusPublicar"></sapn></h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja tornar público a resposta <sapn id="statusPublicar2"></sapn> ?</p>
			</div>
			<div class="modal-footer">
				<form action="paginas/gerenciamento/RespostaReclamacao/Autorizacao.php" method="post">
                                    <input type="hidden" name="aprova" id="modPublicar">
                                    <input type="hidden" name="idstatus" id="idstatus2"> 
                                    <input type="hidden" name="idusu" id="idusu2">
                                <button type="submit" class="btn btn-danger">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                           </form>
			</div>
		</div>
	</div>
</div>

<!-- Modal remover -->
<div id="remover" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Exclusão da Resposta <span id="LabelDelid"></span></h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir a resposta <span id="LabelDelid2"></span> ?</p>
			</div>
			<div class="modal-footer">
                            <form action="paginas/gerenciamento/RespostaReclamacao/removerReclamacao.php" method="post">
				<input type="hidden" name="idDelet" id="idDelet">
                                <button type="submit" class="btn btn-danger">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                           </form>     
			</div>
		</div>
	</div>
</div>
