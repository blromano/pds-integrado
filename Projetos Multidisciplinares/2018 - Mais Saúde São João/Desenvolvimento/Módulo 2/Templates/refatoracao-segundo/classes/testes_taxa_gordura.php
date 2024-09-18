<?php
class testes_taxa_gordura {
	private $txg_sexo;
	private $txg_imc;
	private $txg_codigo;
	private $txg_data;
	private $txg_percentual;
	private $txg_idade;
	private $txg_valor;
	private $txg_status;
	private $fk_usuarios_usu_codigo;
	public function __construct($txg_sexo ,$txg_imc ,$txg_codigo ,$txg_data ,$txg_percentual ,$txg_idade ,$txg_valor ,$txg_status ,$fk_usuarios_usu_codigo) {
		$this->txg_sexo = $txg_sexo;
		$this->txg_imc = $txg_imc;
		$this->txg_codigo = $txg_codigo;
		$this->txg_data = $txg_data;
		$this->txg_percentual = $txg_percentual;
		$this->txg_idade = $txg_idade;
		$this->txg_valor = $txg_valor;
		$this->txg_status = $txg_status;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_txg_sexo() { return $this->txg_sexo; }
	public function set_txg_sexo($txg_sexo) { return $this->txg_sexo = $txg_sexo; }
	public function get_txg_imc() { return $this->txg_imc; }
	public function set_txg_imc($txg_imc) { return $this->txg_imc = $txg_imc; }
	public function get_txg_codigo() { return $this->txg_codigo; }
	public function set_txg_codigo($txg_codigo) { return $this->txg_codigo = $txg_codigo; }
	public function get_txg_data() { return $this->txg_data; }
	public function set_txg_data($txg_data) { return $this->txg_data = $txg_data; }
	public function get_txg_percentual() { return $this->txg_percentual; }
	public function set_txg_percentual($txg_percentual) { return $this->txg_percentual = $txg_percentual; }
	public function get_txg_idade() { return $this->txg_idade; }
	public function set_txg_idade($txg_idade) { return $this->txg_idade = $txg_idade; }
	public function get_txg_valor() { return $this->txg_valor; }
	public function set_txg_valor($txg_valor) { return $this->txg_valor = $txg_valor; }
	public function get_txg_status() { return $this->txg_status; }
	public function set_txg_status($txg_status) { return $this->txg_status = $txg_status; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}