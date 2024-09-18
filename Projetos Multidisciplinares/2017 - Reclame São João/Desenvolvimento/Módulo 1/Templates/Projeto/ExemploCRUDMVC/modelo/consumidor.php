<?php
class Consumidor
{
	
	private $con_id;
	private $con_numero;
	private $con_cadastro_validado;
	private $con_status_bloqueio;
	private $con_data_nascimento;
	private $con_complemento;
	private $con_data_hora_email_validacao;
	private $con_telefone2;
	private $con_cpf;

	
	
	public function __construct()
    {
        
    }
		
	public function getCon_Id() {
        return $this->con_id;
    }
	
	public function setCon_Id($con_id) {
        $this->id = $id;
    }
    
	public function getCon_Numero() {
        return $this->con_numero;
    }
	
	public function setCon_Numero($con_numero) {
        $this->con_numero = $con_numero;
    }
	
	public function getCon_Cadastro_Validado() {
        return $this->con_cadastro_validado;
    }
	
	public function setCon_Cadastro_Validado($con_cadastro_validado) {
        $this->con_cadastro_validado = $con_cadastro_validado;
    }
	
	public function getCon_Status_Bloqueio() {
        return $this->con_status_bloqueio;
    }
	
	public function setCon_Status_Bloqueio($con_status_bloqueio) {
        $this->con_status_bloqueio = $con_status_bloqueio;
    }
	
	public function getCon_Data_Nascimento() {
        return $this->con_data_nascimento;
    }
	
	public function setCon_Data_Nascimento($con_data_nascimento) {
        $this->con_data_nascimento = $con_data_nascimento;
    }
	
	public function getCon_Complemento() {
        return $this->con_complemento;
    }
	
	public function setCon_Complemento($con_complemento) {
        $this->con_complemento = $con_complemento;
    }
	
	public function getCon_Data_Hora_Email_Validacao() {
        return $this->con_data_hora_email_validacao;
    }
	
	public function setCon_Data_Hora_Email_Validacao($con_data_hora_email_validacao) {
        $this->numero = $con_data_hora_email_validacao;
    }
	
	public function getCon_Telefone2() {
        return $this->con_telefone2;
    }
	
	public function setCon_Telefone2($con_telefone2) {
        $this->fcon_telefone2 = $con_telefone2;
    }
	
	public function getCon_Cpf () {
        return $this->con_cpf ;
    }
	
	public function setCon_Cpf ($con_cpf) {
        $this->con_cpf  = $con_cpf ;
    }
	
}
  
?>

