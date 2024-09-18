<?php
class testes_batimentos_por_minuto {
	private $bpm_batimentos;
	private $bpm_status;
	private $bpm_data;
	private $bpm_codigo;
	private $fk_usuarios_usu_codigo;
	public function __construct($bpm_batimentos ,$bpm_status ,$bpm_data ,$bpm_codigo ,$fk_usuarios_usu_codigo) {
		$this->bpm_batimentos = $bpm_batimentos;
		$this->bpm_status = $bpm_status;
		$this->bpm_data = $bpm_data;
		$this->bpm_codigo = $bpm_codigo;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_bpm_batimentos() { return $this->bpm_batimentos; }
	public function set_bpm_batimentos($bpm_batimentos) { return $this->bpm_batimentos = $bpm_batimentos; }
	public function get_bpm_status() { return $this->bpm_status; }
	public function set_bpm_status($bpm_status) { return $this->bpm_status = $bpm_status; }
	public function get_bpm_data() { return $this->bpm_data; }
	public function set_bpm_data($bpm_data) { return $this->bpm_data = $bpm_data; }
	public function get_bpm_codigo() { return $this->bpm_codigo; }
	public function set_bpm_codigo($bpm_codigo) { return $this->bpm_codigo = $bpm_codigo; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}