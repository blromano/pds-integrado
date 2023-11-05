<?php
class testes_visao {
	private $tvi_teste_dalt_2;
	private $tvi_resposta_hipermetropia;
	private $tvi_teste_dalt_1;
	private $tvi_teste_astigmatismo;
	private $tvi_status_daltonismo;
	private $tvi_status_miopia;
	private $tvi_status_hipermetropia;
	private $tvi_teste_hiper_mio;
	private $tvi_teste_dalt_4;
	private $tvi_codigo;
	private $tvi_teste_dalt_3;
	private $tvi_data;
	private $tvi_status_astigmatismo;
	private $tvi_resposta_astigmatismo;
	private $tvi_resposta_miopia;
	private $fk_usuarios_usu_codigo;
	public function __construct($tvi_teste_dalt_2 ,$tvi_resposta_hipermetropia ,$tvi_teste_dalt_1 ,$tvi_teste_astigmatismo ,$tvi_status_daltonismo ,$tvi_status_miopia ,$tvi_status_hipermetropia ,$tvi_teste_hiper_mio ,$tvi_teste_dalt_4 ,$tvi_codigo ,$tvi_teste_dalt_3 ,$tvi_data ,$tvi_status_astigmatismo ,$tvi_resposta_astigmatismo ,$tvi_resposta_miopia ,$fk_usuarios_usu_codigo) {
		$this->tvi_teste_dalt_2 = $tvi_teste_dalt_2;
		$this->tvi_resposta_hipermetropia = $tvi_resposta_hipermetropia;
		$this->tvi_teste_dalt_1 = $tvi_teste_dalt_1;
		$this->tvi_teste_astigmatismo = $tvi_teste_astigmatismo;
		$this->tvi_status_daltonismo = $tvi_status_daltonismo;
		$this->tvi_status_miopia = $tvi_status_miopia;
		$this->tvi_status_hipermetropia = $tvi_status_hipermetropia;
		$this->tvi_teste_hiper_mio = $tvi_teste_hiper_mio;
		$this->tvi_teste_dalt_4 = $tvi_teste_dalt_4;
		$this->tvi_codigo = $tvi_codigo;
		$this->tvi_teste_dalt_3 = $tvi_teste_dalt_3;
		$this->tvi_data = $tvi_data;
		$this->tvi_status_astigmatismo = $tvi_status_astigmatismo;
		$this->tvi_resposta_astigmatismo = $tvi_resposta_astigmatismo;
		$this->tvi_resposta_miopia = $tvi_resposta_miopia;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_tvi_teste_dalt_2() { return $this->tvi_teste_dalt_2; }
	public function set_tvi_teste_dalt_2($tvi_teste_dalt_2) { return $this->tvi_teste_dalt_2 = $tvi_teste_dalt_2; }
	public function get_tvi_resposta_hipermetropia() { return $this->tvi_resposta_hipermetropia; }
	public function set_tvi_resposta_hipermetropia($tvi_resposta_hipermetropia) { return $this->tvi_resposta_hipermetropia = $tvi_resposta_hipermetropia; }
	public function get_tvi_teste_dalt_1() { return $this->tvi_teste_dalt_1; }
	public function set_tvi_teste_dalt_1($tvi_teste_dalt_1) { return $this->tvi_teste_dalt_1 = $tvi_teste_dalt_1; }
	public function get_tvi_teste_astigmatismo() { return $this->tvi_teste_astigmatismo; }
	public function set_tvi_teste_astigmatismo($tvi_teste_astigmatismo) { return $this->tvi_teste_astigmatismo = $tvi_teste_astigmatismo; }
	public function get_tvi_status_daltonismo() { return $this->tvi_status_daltonismo; }
	public function set_tvi_status_daltonismo($tvi_status_daltonismo) { return $this->tvi_status_daltonismo = $tvi_status_daltonismo; }
	public function get_tvi_status_miopia() { return $this->tvi_status_miopia; }
	public function set_tvi_status_miopia($tvi_status_miopia) { return $this->tvi_status_miopia = $tvi_status_miopia; }
	public function get_tvi_status_hipermetropia() { return $this->tvi_status_hipermetropia; }
	public function set_tvi_status_hipermetropia($tvi_status_hipermetropia) { return $this->tvi_status_hipermetropia = $tvi_status_hipermetropia; }
	public function get_tvi_teste_hiper_mio() { return $this->tvi_teste_hiper_mio; }
	public function set_tvi_teste_hiper_mio($tvi_teste_hiper_mio) { return $this->tvi_teste_hiper_mio = $tvi_teste_hiper_mio; }
	public function get_tvi_teste_dalt_4() { return $this->tvi_teste_dalt_4; }
	public function set_tvi_teste_dalt_4($tvi_teste_dalt_4) { return $this->tvi_teste_dalt_4 = $tvi_teste_dalt_4; }
	public function get_tvi_codigo() { return $this->tvi_codigo; }
	public function set_tvi_codigo($tvi_codigo) { return $this->tvi_codigo = $tvi_codigo; }
	public function get_tvi_teste_dalt_3() { return $this->tvi_teste_dalt_3; }
	public function set_tvi_teste_dalt_3($tvi_teste_dalt_3) { return $this->tvi_teste_dalt_3 = $tvi_teste_dalt_3; }
	public function get_tvi_data() { return $this->tvi_data; }
	public function set_tvi_data($tvi_data) { return $this->tvi_data = $tvi_data; }
	public function get_tvi_status_astigmatismo() { return $this->tvi_status_astigmatismo; }
	public function set_tvi_status_astigmatismo($tvi_status_astigmatismo) { return $this->tvi_status_astigmatismo = $tvi_status_astigmatismo; }
	public function get_tvi_resposta_astigmatismo() { return $this->tvi_resposta_astigmatismo; }
	public function set_tvi_resposta_astigmatismo($tvi_resposta_astigmatismo) { return $this->tvi_resposta_astigmatismo = $tvi_resposta_astigmatismo; }
	public function get_tvi_resposta_miopia() { return $this->tvi_resposta_miopia; }
	public function set_tvi_resposta_miopia($tvi_resposta_miopia) { return $this->tvi_resposta_miopia = $tvi_resposta_miopia; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}