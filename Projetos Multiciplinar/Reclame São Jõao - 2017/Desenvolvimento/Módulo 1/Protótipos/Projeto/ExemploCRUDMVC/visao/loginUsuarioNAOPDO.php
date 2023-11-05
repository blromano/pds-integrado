<?PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// as variáveis usuario e senha recebem os dados digitados na página anterior
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


//Comando SQL de verificação de autenticação
$sql = "SELECT * " .
" FROM cadastrousuarios " .
" WHERE email = '$email'  " .
" AND senha = '$senha'";
$resultado = $conn->query($sql);


//Caso consiga logar cria a sessão
if ($resultado-> num_rows > 0) {
	// session_start inicia a sessão
	session_start();
	
	$_SESSION['usuario'] = $email;
	$_SESSION['senha'] = $senha;
	
	
	header('location:mod01-paginaBoasVindasUsuario.php');
}

//Caso contrário redireciona para a página de autenticação
else {
	//Destrói
	session_destroy();

	//Limpa
	unset ($_SESSION['usuario']);
	unset ($_SESSION['senha']);

	//Redireciona para a página de autenticação
        
	header('location:loginUsuario.php');

}

$conn->close();
?>