<table id="table" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
		<th>Assunto</th>
		<th>Mensagem</th>
		<th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
		<td>1</td>
        <td>Birubiru</td>
        <td>birubiru@email.com</td>
        <td>Site muito bom</td>
		<td>Aew man, o site tá nice, continuem assim.</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#responder"><span class="fa fa-reply" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>
			</div>
		</td>
      </tr>
      <tr>
		<td>2</td>
        <td>Rosangela</td>
        <td>rosangela@email.com</td>
        <td>Não consigo logar</td>
		<td>Olá, na noite de hoje tentei efetuar o login na minha conta, porém sem sucesso...</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#responder"><span class="fa fa-reply" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>
			</div>
		</td>
      </tr>
      <tr>
        <td>3</td>
		<td>Marcola</td>
        <td>Marcola@email.com</td>
        <td>Proposta de Publicidade</td>
		<td>Eai rapazida, aqui é o Marcola líder do PCC, gostaria de divulgar minhas ideologias nesse belo site, pf retornar contato!</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#visualizar"><span class="fa fa-eye" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#responder"><span class="fa fa-reply" aria-hidden="true"></span></button>
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
				<h4 class="modal-title">Detalhes do Contato #4871</h4>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item">ID: <span class="pull-right">#4871</span></li>
					<li class="list-group-item">Nome: <span class="pull-right">Marcola</span></li>
					<li class="list-group-item">E-mail: <span class="pull-right">Marcola@email.com</span></li>
					<li class="list-group-item">Assunto: <span class="pull-right">Proposta de Publicidade</span></li>
					<li class="list-group-item">Data: <span class="pull-right">22/04/2017</span></li>
					<br><span>Mensagem:</span>
					<div class="well">Eai rapazida, aqui é o Marcola líder do PCC, gostaria de divulgar minhas ideologias nesse belo site, pf retornar contato!</div>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<div id="responder" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Responder Mensagem de Contato #4871</h4>
			</div>
			<div class="modal-body">
				<form>
				<ul class="list-group">
					<li class="list-group-item">ID de contato: <span class="pull-right"><input type="text" class="form-control" value="#4871" disabled></span></li>
					<li class="list-group-item">Remetente: <span class="pull-right"><input type="text" class="form-control" value="marcola@email.com"></span></li>
					<li class="list-group-item">Assunto: <span class="pull-right"><input type="text" class="form-control" value="RE: Proposta de Publicidade"></span></li>
					<br><span>Resposta:</span>
					<div class="well"><textarea class="form-control" rows="3"></textarea></div>
				</ul>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Enviar</button>
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
				<h4 class="modal-title">Exclusão da Mensagem de Contato #4871</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir a mensagem de contato id: #4871 ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
