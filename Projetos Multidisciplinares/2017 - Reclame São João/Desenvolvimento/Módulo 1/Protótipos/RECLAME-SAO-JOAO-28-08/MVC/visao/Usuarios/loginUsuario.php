<?PHP
	session_start();	

include '../../../MVC/modelo/Usuario.php';
include '../../../MVC/controle/UsuarioDAO.php';

$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setEmail($_POST['email']);
$usuario->setSenha($_POST['senha']);

$usuarioDAO->logarUsuario($usuario);


header("location:loginUsuario.php"); 

?>