<style>
	
	.col-md-3 .panel-body div {
		 font-size: 20px;
	}
	
	.list-group-item {
		  padding: 10px;
	}
</style>
<?php
// session_start();
// echo $_SESSION['USU_EMAIL'];
include_once 'controle/Conexao.php';
include_once 'controle/UsuarioDAO.php';


$conn = new Conexao();
$dao = new UsuarioDAO();

if (isset($_SESSION['USU_EMAIL'])) {
    # code...
    // $dao->redirecionar($_SESSION['USU_EMAIL']);
    $tipo = $dao->verificarUsuario($_SESSION['USU_EMAIL']);

// echo $tipo;
    if ($tipo == 'est') {
        # code...
        header('Location: est_boas-vindas.php');
    }
    if ($tipo == 'adm') {
        # code...
        // header('Location: admin.php');
    }
    if ($tipo==="usr") {
        # code...
        header('Location: usu_paginaBoasVindasUsuario.php');
    }

}else{
    header('Location: usu_loginUsuario.php');

    // select * from usuarios;
}

?>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #ff0000;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</div>
					<div class="pull-right">23</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #3194DA;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-users" aria-hidden="true"></span> Clientes</div>
					<div class="pull-right">50</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #64594f;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-industry" aria-hidden="true"></span> Empresas</div>
					<div class="pull-right">15</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #00ff00;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-envelope" aria-hidden="true"></span> Mensagens</div>
					<div class="pull-right">10</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading"><span class="fa fa-list" aria-hidden="true"></span> Pendências</div>
	  <div class="panel-body">
		<ul class="list-group">
		  <li class="list-group-item">Reclamações <span class="badge">12</span></li>
		  <li class="list-group-item">Respostas <span class="badge">5</span></li> 
		  <li class="list-group-item">Denúncias <span class="badge">3</span></li>
		  <li class="list-group-item">Mensagens <span class="badge">3</span></li> 
		</ul>
	  
	  </div>
	</div>
</div>
<div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading"><span class="fa fa-user" aria-hidden="true"></span> Últimos Registros</div>
	  <div class="panel-body">
 <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Email</th>
		<th>Data</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Cliente</td>
        <td>Daniel</td>
        <td>daniel@email.com</td>
		<td>23/04/2017</td>
      </tr>
      <tr>
        <td>Empresa</td>
        <td>Praça do Açaí</td>
        <td>pracaacai@email.com</td>
		<td>23/04/2017</td>
      </tr>
      <tr>
        <td>Cliente</td>
        <td>Maria</td>
        <td>maria@email.com</td>
		<td>22/04/2017</td>
      </tr>

    </tbody>
  </table>
	  
	  </div>
	</div>
</div>
</div>