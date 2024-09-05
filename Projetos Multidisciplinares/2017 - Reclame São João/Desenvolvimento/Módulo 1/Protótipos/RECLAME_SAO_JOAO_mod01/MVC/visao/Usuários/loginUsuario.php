<?PHP

include '../../modelo/Usuario.php';
include '../../controle/UsuarioDAO.php';


$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO();

$usuario->setEmail($_POST['email']);
$usuario->setSenha($_POST['senha']);

$usuarioDAO->logarUsuario($usuario);


header("location:loginUsuario.php"); 

?>