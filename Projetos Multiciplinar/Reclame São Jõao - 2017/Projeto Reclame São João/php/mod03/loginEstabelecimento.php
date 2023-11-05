<?PHP
	session_start();	

	include '../../modelo/Usuario.php';
	include '../../controle/UsuarioDAO.php';

		$usuario = new Usuario();

		$usuarioDAO = new UsuarioDAO();

		$usuario->setUSU_EMAIL($_POST['USU_EMAIL']);
		$usuario->setUSU_SENHA($_POST['USU_SENHA']);
	
		$usuarioDAO->logarEstabelecimento($usuario);
		exit();
?>