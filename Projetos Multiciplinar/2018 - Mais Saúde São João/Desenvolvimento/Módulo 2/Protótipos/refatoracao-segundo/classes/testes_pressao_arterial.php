<?php
class testes_pressao_arterial {
	private $pra_pressao_diastolica;
	private $pra_precao_sistolica;
	private $pra_codigo;
	private $pra_data;
	private $pra_status;
	private $fk_usuarios_usu_codigo;
	public function __construct($pra_pressao_diastolica ,$pra_precao_sistolica ,$pra_codigo ,$pra_data ,$pra_status ,$fk_usuarios_usu_codigo) {
		$this->pra_pressao_diastolica = $pra_pressao_diastolica;
		$this->pra_precao_sistolica = $pra_precao_sistolica;
		$this->pra_codigo = $pra_codigo;
		$this->pra_data = $pra_data;
		$this->pra_status = $pra_status;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_pra_pressao_diastolica() { return $this->pra_pressao_diastolica; }
	public function set_pra_pressao_diastolica($pra_pressao_diastolica) { return $this->pra_pressao_diastolica = $pra_pressao_diastolica; }
	public function get_pra_precao_sistolica() { return $this->pra_precao_sistolica; }
	public function set_pra_precao_sistolica($pra_precao_sistolica) { return $this->pra_precao_sistolica = $pra_precao_sistolica; }
	public function get_pra_codigo() { return $this->pra_codigo; }
	public function set_pra_codigo($pra_codigo) { return $this->pra_codigo = $pra_codigo; }
	public function get_pra_data() { return $this->pra_data; }
	public function set_pra_data($pra_data) { return $this->pra_data = $pra_data; }
	public function get_pra_status() { return $this->pra_status; }
	public function set_pra_status($pra_status) { return $this->pra_status = $pra_status; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}