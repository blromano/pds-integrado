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
	include 'controle/ReclamacoesDAO.php';
	$ReclamacoesDAO = new ReclamacoesDAO();
	$reclamacoes = count($ReclamacoesDAO->listarTodos());
	$recpendencias = count($ReclamacoesDAO->listarPendencias());
	
	include 'controle/RespostaReclamacaoDAO.php';
	$RespostaReclamacaoDAO = new RespostaReclamacaoDAO();
	$respendencias = count($RespostaReclamacaoDAO->listarPendencias());
	
	include 'controle/ConsumidorDAO.php';
	$ConsumidorDAO = new ConsumidorDAO();
	$consumidores = count($ConsumidorDAO->listarADM());

	include 'controle/EstabelecimentosDAO.php';
	$EstabelecimentosDAO = new EstabelecimentosDAO();
	$estabelecimentos = count($EstabelecimentosDAO->listarADM());
	
	include 'controle/ContatoDAO.php';
	$ContatoDAO = new ContatoDAO();
	$contatos = count($ContatoDAO->listarTodos());
	$mespendencias = count($ContatoDAO->listarPendentes());
	
	include 'controle/DenunciasDAO.php';
	$DenunciasDAO = new DenunciasDAO();
	$denpendencias = count($DenunciasDAO->listarDenunciasConsumidoresPendentes()) + count($DenunciasDAO->listarDenunciasEstabelecimentosPendentes());
	
	include_once 'controle/UsuarioDAO.php';
	$UsuarioDAO = new UsuarioDAO();
	$lastRegister = $UsuarioDAO->ultimosCadastros();
?>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #ff0000;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</div>
					<div class="pull-right"><?php echo $reclamacoes; ?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #3194DA;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-users" aria-hidden="true"></span> Clientes</div>
					<div class="pull-right"><?php echo $consumidores; ?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #64594f;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-industry" aria-hidden="true"></span> Empresas</div>
					<div class="pull-right"><?php echo $estabelecimentos; ?></div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-default" style="border-left: thick double #00ff00;">
				<div class="panel-body">
					<div class="pull-left"><span class="fa fa-envelope" aria-hidden="true"></span> Mensagens</div>
					<div class="pull-right"><?php echo $contatos; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
<div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading"><span class="fa fa-users" aria-hidden="true"></span> Usuários</div>
	  <div class="panel-body">
		<?php
			$total = $consumidores + $estabelecimentos;
			$u1 = number_format((($consumidores/$total)*100),2);
			$u2 = number_format((($estabelecimentos/$total)*100),2);
		?>
		<img src="https://chart.googleapis.com/chart?cht=p&chd=t:<?php echo $u1; ?>,<?php echo $u2; ?>&chs=400x160&chl=<?php echo $u1; ?>%|<?php echo $u2; ?>%&chdl=Clientes (<?php echo $consumidores ?>)|Estabelecimentos (<?php echo $estabelecimentos ?>)&chco=756659" class="center-block">
	  </div>
	</div>
</div>

<div class="col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading"><span class="fa fa-sign-in" aria-hidden="true"></span> Cadastros</div>
	  <div class="panel-body">
		<?php
			$m1 = date('M',strtotime("now"));
			$m2 = date('M',strtotime("-1 month"));
			$m3 = date('M',strtotime("-2 month"));
			$m4 = date('M',strtotime("-3 month"));
			$m5 = date('M',strtotime("-4 month"));
			
			$u1 = count($UsuarioDAO->usuariosPorMes(date('n',strtotime("now"))));
			$u2 = count($UsuarioDAO->usuariosPorMes(date('n',strtotime("-1 month"))));
			$u3 = count($UsuarioDAO->usuariosPorMes(date('n',strtotime("-2 month"))));
			$u4 = count($UsuarioDAO->usuariosPorMes(date('n',strtotime("-3 month"))));
			$u5 = count($UsuarioDAO->usuariosPorMes(date('n',strtotime("-4 month"))));
			
			$txtmes = $m5."|".$m4."|".$m3."|".$m2."|".$m1;
			$usercount = $u5.",".$u4.",".$u3.",".$u2.",".$u1;
		?>
		<img src="https://chart.googleapis.com/chart?chxt=x,y&cht=bvs&chco=756659&chds=a&chd=t:<?php echo $usercount ?>&chs=200x160&chxl=0:|<?php echo $txtmes ?>" class="center-block">
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
		  <li class="list-group-item"><a href="admin.php?pagina=2">Reclamações</a> <span class="badge"><?php echo $recpendencias; ?></span></li>
		  <li class="list-group-item"><a href="admin.php?pagina=3">Respostas</a> <span class="badge"><?php echo $respendencias; ?></span></li> 
		  <li class="list-group-item"><a href="admin.php?pagina=4">Denúncias</a> <span class="badge"><?php echo $denpendencias; ?></span></li>
		  <li class="list-group-item"><a href="admin.php?pagina=12">Mensagens</a> <span class="badge"><?php echo $mespendencias; ?></span></li> 
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
        <th>Email</th>
		<th>Data</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach($lastRegister as $linha) {
			?>
			  <tr>
				<td><?php echo $linha["USU_ID"];?></td>
				<td><?php echo $linha["USU_EMAIL"];?></td>
				<td><?php echo date("d/m/Y",strtotime($linha["USU_DATA_CADASTRO"]));?></td>
			  </tr>
		<?php } ?>
    </tbody>
  </table>
	  
	  </div>
	</div>
</div>
</div>