<?php
class testes_indice_massa_corporal {
	private $imc_status;
	private $imc_data;
	private $imc_altura;
	private $imc_codigo;
	private $imc_peso;
	private $imc_valor_imc;
	private $fk_usuarios_usu_codigo;
	public function __construct($imc_status ,$imc_data ,$imc_altura ,$imc_codigo ,$imc_peso ,$imc_valor_imc ,$fk_usuarios_usu_codigo) {
		$this->imc_status = $imc_status;
		$this->imc_data = $imc_data;
		$this->imc_altura = $imc_altura;
		$this->imc_codigo = $imc_codigo;
		$this->imc_peso = $imc_peso;
		$this->imc_valor_imc = $imc_valor_imc;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_imc_status() { return $this->imc_status; }
	public function set_imc_status($imc_status) { return $this->imc_status = $imc_status; }
	public function get_imc_data() { return $this->imc_data; }
	public function set_imc_data($imc_data) { return $this->imc_data = $imc_data; }
	public function get_imc_altura() { return $this->imc_altura; }
	public function set_imc_altura($imc_altura) { return $this->imc_altura = $imc_altura; }
	public function get_imc_codigo() { return $this->imc_codigo; }
	public function set_imc_codigo($imc_codigo) { return $this->imc_codigo = $imc_codigo; }
	public function get_imc_peso() { return $this->imc_peso; }
	public function set_imc_peso($imc_peso) { return $this->imc_peso = $imc_peso; }
	public function get_imc_valor_imc() { return $this->imc_valor_imc; }
	public function set_imc_valor_imc($imc_valor_imc) { return $this->imc_valor_imc = $imc_valor_imc; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}