<?php
class testes_capacidade_pulmonar {
	private $cpr_capacidade;
	private $cpr_data;
	private $cpr_expiracao;
	private $cpr_codigo;
	private $cpr_inspiracao;
	private $cpr_status;
	private $fk_usuarios_usu_codigo;
	public function __construct($cpr_capacidade ,$cpr_data ,$cpr_expiracao ,$cpr_codigo ,$cpr_inspiracao ,$cpr_status ,$fk_usuarios_usu_codigo) {
		$this->cpr_capacidade = $cpr_capacidade;
		$this->cpr_data = $cpr_data;
		$this->cpr_expiracao = $cpr_expiracao;
		$this->cpr_codigo = $cpr_codigo;
		$this->cpr_inspiracao = $cpr_inspiracao;
		$this->cpr_status = $cpr_status;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_cpr_capacidade() { return $this->cpr_capacidade; }
	public function set_cpr_capacidade($cpr_capacidade) { return $this->cpr_capacidade = $cpr_capacidade; }
	public function get_cpr_data() { return $this->cpr_data; }
	public function set_cpr_data($cpr_data) { return $this->cpr_data = $cpr_data; }
	public function get_cpr_expiracao() { return $this->cpr_expiracao; }
	public function set_cpr_expiracao($cpr_expiracao) { return $this->cpr_expiracao = $cpr_expiracao; }
	public function get_cpr_codigo() { return $this->cpr_codigo; }
	public function set_cpr_codigo($cpr_codigo) { return $this->cpr_codigo = $cpr_codigo; }
	public function get_cpr_inspiracao() { return $this->cpr_inspiracao; }
	public function set_cpr_inspiracao($cpr_inspiracao) { return $this->cpr_inspiracao = $cpr_inspiracao; }
	public function get_cpr_status() { return $this->cpr_status; }
	public function set_cpr_status($cpr_status) { return $this->cpr_status = $cpr_status; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}