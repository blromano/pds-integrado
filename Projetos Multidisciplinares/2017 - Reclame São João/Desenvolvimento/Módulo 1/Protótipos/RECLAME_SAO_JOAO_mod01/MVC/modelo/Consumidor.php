<?php
class Consumidor
{
	
	private $id;
	private $numero;
	//private $cadastro_validado;
	//private $status_bloqueio;
	private $data_nascimento;
	private $complemento;
	private $data_hora_email_validacao;
	private $telefone2;
	private $cpf;
	private $idUsuario;
	private $idLocalizacao;

	
	
	public function __construct()
    {
        
    }
		
	public function getId() {
        return $this->id;
    }
	
	public function setId($id) {
        $this->id = $id;
    }
    
	public function getNumero() {
        return $this->numero;
    }
	
	public function setNumero($numero) {
        $this->numero = $numero;
    }
	
	/*public function getCadastro_Validado() {
        return $this->cadastro_validado;
    }
	
	public function setCadastro_Validado($cadastro_validado) {
        $this->cadastro_validado = $cadastro_validado;
    }
	
	public function getStatus_Bloqueio() {
        return $this->status_bloqueio;
    }
	
	public function setStatus_Bloqueio($status_bloqueio) {
        $this->status_bloqueio = $status_bloqueio;
    }
	*/
	public function getData_Nascimento() {
        return $this->data_nascimento;
    }
	
	public function setData_Nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }
	
	public function getComplemento() {
        return $this->complemento;
    }
	
	public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }
	
	public function getData_Hora_Email_Validacao() {
        return $this->data_hora_email_validacao;
    }
	
	public function setData_Hora_Email_Validacao($data_hora_email_validacao) {
        $this->numero = $data_hora_email_validacao;
    }
	
	public function getTelefone2() {
        return $this->telefone2;
    }
	
	public function setTelefone2($telefone2) {
        $this->telefone2 = $telefone2;
    }
	
	public function getCpf () {
        return $this->cpf ;
    }
	
	public function setCpf ($cpf) {
        $this->cpf  = $cpf;
    }
	
	public function getIdUsuario () {
        return $this->idUsuario;
    }
	
	public function setIdUsuario ($idUsuario) {
        $this->idUsuario  = $idUsuario;
    }
	
	public function getIdLocalizacao () {
        return $this->idLocalizacao;
    }
	
	public function setIdLocalizacao ($idLocalizacao) {
        $this->idLocalizacao  = $idLocalizacao;
    }
	
}
  
?>

