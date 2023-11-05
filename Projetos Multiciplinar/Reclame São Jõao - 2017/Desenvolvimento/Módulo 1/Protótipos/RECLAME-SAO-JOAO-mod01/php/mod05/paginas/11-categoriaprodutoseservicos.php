<div class="text-right"><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button></div>
<table id="table" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Produto / Serviço</th>
		<th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Eletrônicos</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar"><span class="fa fa-pencil" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>
			</div>
		</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Roupas</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar"><span class="fa fa-pencil" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>
			</div>
		</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Pintura</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#editar"><span class="fa fa-pencil" aria-hidden="true"></span></button>
				<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remover"><span class="fa fa-remove" aria-hidden="true"></span></button>
			</div>
		</td>
      </tr>
    </tbody>
  </table>
  
<div id="editar" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Editar informações da Categoria: Eletrônicos</h4>
			</div>
			<div class="modal-body">
				<form>
					<ul class="list-group">
					  <li class="list-group-item">Nome: <span class="pull-right"><input type="text" class="form-control" value="Eletrônicos"></span></li>
					</ul>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
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
				<h4 class="modal-title">Exclusão da Categoria: Eletrônicos</h4>
			</div>
			<div class="modal-body">
				<p>Você tem certeza que deseja excluir o categoria: Eletrônicos ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Confirmar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
  
<div id="add" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Inserção de categoria de Produto / Serviço</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="nome">Nome da nova categoria:</label>
						<input type="nome" class="form-control" id="nome">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Adicionar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
  