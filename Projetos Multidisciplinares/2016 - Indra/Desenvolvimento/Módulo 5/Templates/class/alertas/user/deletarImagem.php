<?php 

include '../../../dao/alertaUserDAO.php';

$caminho = $_POST['caminho'];
$temp = explode('.', basename($caminho));
$num = $temp[0];
$info = pathinfo('../../../' . $caminho);
$caminhoPasta = end(explode('../../../', ($info['dirname'])));
$arquivosPasta = scandir($info['dirname']);
$caminhoReal = realpath('../../../' . $_POST['caminho']);
if (is_writable($caminhoReal)){
	if(unlink($caminhoReal)){ // Deleta a imagem
		$i = 1; 
		$dir = pathinfo($caminhoReal);
		$dir = $dir['dirname'] . '\\';
		$handler = opendir($dir);
		while ($file = readdir($handler)) {
			if ($file != "." && $file != "..") {
				$newName = $i . '.jpg';
				rename($dir.$file, $dir.$newName);
				$i++;
			}
		}		
		closedir($handler);
		
		$alertaUserDAO = new alertaUserDAO(); 		
		echo $alertaUserDAO->deletarImagem($num, $caminhoPasta, $arquivosPasta, $_POST['id']); // reorganiza o banco
	}else echo false;
}else echo false;

// Renomeia as imagens na pasta