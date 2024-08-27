	<?php
require_once 'PDO.php';

class Receita {
	private $pdo;

	public function __construct() {
		$conn = new Conexao();
        $this->pdo = $conn->getConexao();
	}

	public function userLogin($email, $senha) {
        $sql = "SELECT * FROM usuarios WHERE USU_EMAIL = '$email' AND USU_SENHA = '$senha'";
        $sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}
    }

	public function infoUser($id) { //Coleta todas as informações do usuario
		$sql = "SELECT * FROM usuarios WHERE USU_ID = $id";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}

	}

	public function addUser($nome, $cpf, $email, $senha, $foto){
		$sql = "INSERT INTO usuarios (USU_NOME, USU_CPF, USU_EMAIL, USU_SENHA, USU_FOTO) VALUES (:nome, :cpf, :email, :senha, :foto)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':cpf', $cpf);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->bindValue(':foto', $foto);
		$sql->execute();

		return true;
	}



	public function addCerveja($nome, $estilo, $id_micro, $id){
		$user = $this->infoUser($id);
		$estilo = $this->infoEstilo_Nome($estilo);

		$sql = "INSERT INTO cervejas (CER_CRIADOR_CERVEJA, CER_NOME, FK_ESTILOS_CERVEJAS_EST_ID, FK_MICROCERVEJARIAS_MIC_ID) VALUES (:nome_user, :nome, :id_estilo, :id_micro)";
		
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome_user', $user->USU_NOME);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':id_estilo', $estilo->EST_ID);
		$sql->bindValue(':id_micro', $id_micro);
		$sql->execute();
		return true;
	}

	public function listCerveja(){
		$resp = false;
		$sql = "SELECT * FROM cervejas";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}

	public function altCerveja($id, $nome, $estilo, $id_micro){
		$sql = "SELECT * FROM cervejas WHERE CER_ID = $id AND FK_MICROCERVEJARIAS_MIC_ID = $id_micro";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$id_estilo = $this->infoEstilo_Nome($estilo);

			$sql = "UPDATE cervejas SET CER_NOME = :nome, FK_ESTILOS_CERVEJAS_EST_ID = :estilo WHERE CER_ID = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':estilo', $id_estilo->EST_ID);
			$sql->bindValue(':id', $id);
			$sql->execute();

			return true;
		}else{
			return false;
		}
	}

	public function delCerveja($id_cerveja, $id_micro){
		$sql = "SELECT * FROM cervejas WHERE CER_ID = $id_cerveja AND FK_MICROCERVEJARIAS_MIC_ID = $id_micro";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = "DELETE FROM cervejas WHERE CER_ID = $id_cerveja";
			$sql = $this->pdo->query($sql);

			return true;
		}else{
			return false;
		}
	}

	public function delCervejaFKE($id){
		$sql = "SELECT * FROM cervejas WHERE FK_ESTILOS_CERVEJAS_EST_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = "DELETE FROM cervejas WHERE FK_ESTILOS_CERVEJAS_EST_ID = $id";
			$sql = $this->pdo->query($sql);

			return true;
		}else{
			return false;
		}
	}

	public function delCervejaFKM($id){
		$sql = "SELECT * FROM cervejas WHERE FK_MICROCERVEJARIAS_MIC_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = "DELETE FROM cervejas WHERE FK_MICROCERVEJARIAS_MIC_ID = $id";
			$sql = $this->pdo->query($sql);

			return true;
		}else{
			return false;
		}
	}

	
	public function infoCerveja($id){
		$sql = "SELECT * FROM cervejas WHERE CER_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}
	



	public function addEstilo($nome, $abvmin, $abvmax, $ebcmin, $ebcmax, $ibu){
		$sql = "INSERT INTO estilos_cervejas (EST_NOME, EST_ABVMIN, EST_ABVMAX, EST_EBCMIN, EST_EBCMAX, EST_IBU_RECOMENDADO) VALUES (:nome, :abvmin, :abvmax, :ebcmin, :ebcmax, :ibu)";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':abvmin', $abvmin);
		$sql->bindValue(':abvmax', $abvmax);
		$sql->bindValue(':ebcmin', $ebcmin);
		$sql->bindValue(':ebcmax', $ebcmax);
		$sql->bindValue(':ibu', $ibu);
		$sql->execute();

		return true;
	}

	public function listEstilos(){
		$sql = "SELECT * FROM estilos_cervejas";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
		
	}

	public function altEstilo($nome, $abvmin, $abvmax, $ebcmin, $ebcmax, $ibu, $id){
		$sql = "UPDATE estilos_cervejas SET EST_NOME=:nome, EST_ABVMIN=:abvmin, EST_ABVMAX=:abvmax, EST_EBCMIN=:ebcmin, EST_EBCMAX=:ebcmax, EST_IBU_RECOMENDADO=:ibu WHERE EST_ID = $id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':abvmin', $abvmin);
		$sql->bindValue(':abvmax', $abvmax);
		$sql->bindValue(':ebcmin', $ebcmin);
		$sql->bindValue(':ebcmax', $ebcmax);
		$sql->bindValue(':ibu', $ibu);
		$sql->execute();
	}

	public function delEstilo($id){
		$sql = "SELECT * FROM estilos_cervejas WHERE EST_ID = $id";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$sql = "DELETE FROM estilos_cervejas WHERE EST_ID = $id";
			$sql = $this->pdo->query($sql);
			$this->delCervejaFKE($id);

			return true;
		}else{
			return false;
		}
	}

	public function infoEstilo($id) { //Coleta todas as informações do usuario
		$sql = "SELECT * FROM estilos_cervejas WHERE EST_ID = '$id'";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}
	}

	public function infoEstilo_Nome($nome) { //Coleta todas as informações do usuario
		$sql = "SELECT * FROM estilos_cervejas WHERE EST_NOME = '$nome'";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}
	}




	public function addMicrocervejaria($nome, $telefone, $ende, $infos, $r_sociais, $cnpj, $foto, $id_user){
		$sql = "INSERT INTO microcervejarias (MIC_NOME, MIC_TELEFONE, MIC_ENDERECO, MIC_DESCRICAO, MIC_REDES_SOCIAIS, MIC_CNPJ, MIC_FOTO, FK_USUARIOS_USU_ID) VALUES (:nome, :telefone, :ende, :infos, :r_sociais, :cnpj, :foto, :id_user);";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':telefone', $telefone);
		$sql->bindValue(':ende', $ende);
		$sql->bindValue(':infos', $infos);
		$sql->bindValue(':r_sociais', $r_sociais);
		$sql->bindValue(':cnpj', $cnpj);
		$sql->bindValue(':foto', $foto);
		$sql->bindValue(':id_user', $id_user);
		$sql->execute();

		return true;
	}

	public function listMicrocervejaria(){
		$sql = "SELECT * FROM microcervejarias";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}

	public function altMicrocervejaria($nome, $telefone, $ende, $infos, $r_sociais, $cnpj, $foto, $id){
		$sql = "UPDATE microcervejarias SET MIC_NOME=:nome, MIC_TELEFONE=:telefone, MIC_ENDERECO=:ende, MIC_DESCRICAO=:infos, MIC_REDES_SOCIAIS=:r_sociais, MIC_CNPJ=:cnpj, MIC_FOTO=:foto WHERE MIC_ID = $id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':telefone', $telefone);
		$sql->bindValue(':ende', $ende);
		$sql->bindValue(':infos', $infos);
		$sql->bindValue(':r_sociais', $r_sociais);
		$sql->bindValue(':cnpj', $cnpj);
		$sql->bindValue(':foto', $foto);
		$sql->execute();
	}

	public function delMicrocervejaria($id){
		$sql = "SELECT * FROM microcervejarias WHERE MIC_ID = $id";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$this->delCervejaFKM($id);
			$sql = "DELETE FROM microcervejarias WHERE MIC_ID = $id";
			$sql = $this->pdo->query($sql);
			

			return true;
		}else{
			return false;
		}
	}

	public function infoMicrocervejaria($id) { //Coleta todas as informações pelo id da Microcervejaria
		$sql = "SELECT * FROM microcervejarias WHERE MIC_ID = $id";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}
	}

	public function getIdMicrocervejaria($id) { //Coleta todas as informações pelo id FK do usuario
		$sql = "SELECT * FROM microcervejarias WHERE FK_USUARIOS_USU_ID = $id";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}
	}








	public function listEstoque(){
		$sql = "SELECT * FROM estoque_usuarios";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}

	public function delEstoque($id){
		$sql = "SELECT * FROM estoque_usuarios WHERE EST_ID = $id";
		$sql = $this->pdo->query($sql);

		if ($sql->rowCount() > 0) {
			$sql = "DELETE FROM estoque_usuarios WHERE EST_ID = $id";
			$sql = $this->pdo->query($sql);

			return true;
		}else{
			return false;
		}
	}

	public function infoIngredientes($id) { //Coleta todas as informações do INGREDIENTE
		$sql = "SELECT * FROM ingredientes WHERE ING_ID = $id";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetch(PDO::FETCH_OBJ);
		}else {
			return false;
		}
	}

	public function listIngredientes(){
		$sql = "SELECT * FROM ingredientes";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			return $sql->fetchAll(PDO::FETCH_OBJ);
		}else{
			return false;
		}
	}

	
}

?>