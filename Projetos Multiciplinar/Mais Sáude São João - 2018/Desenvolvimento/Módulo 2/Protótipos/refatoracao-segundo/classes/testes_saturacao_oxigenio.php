<?php
class testes_saturacao_oxigenio {
	private $sat_status;
	private $sat_data;
	private $sat_porcentagem;
	private $sat_codigo;
	private $fk_usuarios_usu_codigo;
	public function __construct($sat_status ,$sat_data ,$sat_porcentagem ,$sat_codigo ,$fk_usuarios_usu_codigo) {
		$this->sat_status = $sat_status;
		$this->sat_data = $sat_data;
		$this->sat_porcentagem = $sat_porcentagem;
		$this->sat_codigo = $sat_codigo;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_sat_status() { return $this->sat_status; }
	public function set_sat_status($sat_status) { return $this->sat_status = $sat_status; }
	public function get_sat_data() { return $this->sat_data; }
	public function set_sat_data($sat_data) { return $this->sat_data = $sat_data; }
	public function get_sat_porcentagem() { return $this->sat_porcentagem; }
	public function set_sat_porcentagem($sat_porcentagem) { return $this->sat_porcentagem = $sat_porcentagem; }
	public function get_sat_codigo() { return $this->sat_codigo; }
	public function set_sat_codigo($sat_codigo) { return $this->sat_codigo = $sat_codigo; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}