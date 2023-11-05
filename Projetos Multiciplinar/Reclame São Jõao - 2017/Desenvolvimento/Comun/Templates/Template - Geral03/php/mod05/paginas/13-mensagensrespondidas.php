<table id="table" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Contato</th>
        <th>Nome Contato</th>
		<th>Remetente</th>
		<th>Assunto</th>
		<th>Resposta</th>
		<th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
		<td>1</td>
        <td>3</td>
		<td>Marcola</td>
        <td>marcola@email.com</td>
        <td>Re: Proposta de Publicidade</td>
		<td>Fecho então parça, banner do PCC mensal no topo do site por $100.000,00</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>
			</div>
		</td>
      </tr>
    </tbody>
  </table>
  
  
 <div id="visualizar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detalhes da Resposda de Contato #4871</h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right">#4871</span></li>
					<li class="list-group-item">ID Contato: <span class="pull-right">#4871</span></li>
					<li class="list-group-item">Nome Contato: <span class="pull-right">Marcola</span></li>
					<li class="list-group-item">Remetente: <span class="pull-right">marcola@email.com</span></li>
					<li class="list-group-item">Assunto: <span class="pull-right">RE: Proposta de Publicidade</span></li>
					<li class="list-group-item">Data: <span class="pull-right">22/04/2017</span></li>
					<br><span>Resposta:</span>
					<div class="well">Fecho então parça, banner do PCC mensal no topo do site por $100.000,00</div>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="remover" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Exclusão da Resposda de Contato #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir a mensagem de resposta de contato id: #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
