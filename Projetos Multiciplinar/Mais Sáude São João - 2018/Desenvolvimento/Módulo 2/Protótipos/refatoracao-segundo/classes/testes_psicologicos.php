<?php
class testes_psicologicos {
	private $tps_resposta_pergunta_11;
	private $tps_resposta_pergunta_14;
	private $tps_data;
	private $tps_resposta_pergunta_5;
	private $tps_resposta_pergunta_3;
	private $tps_resposta_pergunta_8;
	private $tps_resposta_pergunta_7;
	private $tps_resposta_pergunta_13;
	private $tps_resultado;
	private $tps_resposta_pergunta_2;
	private $tps_resposta_pergunta6;
	private $tps_pontuacao;
	private $tps_resposta_pergunta_15;
	private $tps_resposta_pergunta_1;
	private $tps_codigo;
	private $tps_resposta_pergunta_10;
	private $tps_resposta_pergunta_12;
	private $tps_resposta_pergunta_9;
	private $tps_resposta_pergunta_4;
	private $fk_usuarios_usu_codigo;
	public function __construct($tps_resposta_pergunta_11,$tps_resposta_pergunta_14,$tps_data,$tps_resposta_pergunta_5,$tps_resposta_pergunta_3,$tps_resposta_pergunta_8,$tps_resposta_pergunta_7,$tps_resposta_pergunta_13,$tps_resultado,$tps_resposta_pergunta_2,$tps_resposta_pergunta6,$tps_pontuacao,$tps_resposta_pergunta_15,$tps_resposta_pergunta_1,$tps_codigo,$tps_resposta_pergunta_10,$tps_resposta_pergunta_12,$tps_resposta_pergunta_9,$tps_resposta_pergunta_4,$fk_usuarios_usu_codigo) {
		$this->tps_resposta_pergunta_11 = $tps_resposta_pergunta_11;
		$this->tps_resposta_pergunta_14 = $tps_resposta_pergunta_14;
		$this->tps_data = $tps_data;
		$this->tps_resposta_pergunta_5 = $tps_resposta_pergunta_5;
		$this->tps_resposta_pergunta_3 = $tps_resposta_pergunta_3;
		$this->tps_resposta_pergunta_8 = $tps_resposta_pergunta_8;
		$this->tps_resposta_pergunta_7 = $tps_resposta_pergunta_7;
		$this->tps_resposta_pergunta_13 = $tps_resposta_pergunta_13;
		$this->tps_resultado = $tps_resultado;
		$this->tps_resposta_pergunta_2 = $tps_resposta_pergunta_2;
		$this->tps_resposta_pergunta6 = $tps_resposta_pergunta6;
		$this->tps_pontuacao = $tps_pontuacao;
		$this->tps_resposta_pergunta_15 = $tps_resposta_pergunta_15;
		$this->tps_resposta_pergunta_1 = $tps_resposta_pergunta_1;
		$this->tps_codigo = $tps_codigo;
		$this->tps_resposta_pergunta_10 = $tps_resposta_pergunta_10;
		$this->tps_resposta_pergunta_12 = $tps_resposta_pergunta_12;
		$this->tps_resposta_pergunta_9 = $tps_resposta_pergunta_9;
		$this->tps_resposta_pergunta_4 = $tps_resposta_pergunta_4;
		$this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo;
	}
	public function get_tps_resposta_pergunta_11() { return $this->tps_resposta_pergunta_11; }
	public function set_tps_resposta_pergunta_11($tps_resposta_pergunta_11) { return $this->tps_resposta_pergunta_11 = $tps_resposta_pergunta_11; }
	public function get_tps_resposta_pergunta_14() { return $this->tps_resposta_pergunta_14; }
	public function set_tps_resposta_pergunta_14($tps_resposta_pergunta_14) { return $this->tps_resposta_pergunta_14 = $tps_resposta_pergunta_14; }
	public function get_tps_data() { return $this->tps_data; }
	public function set_tps_data($tps_data) { return $this->tps_data = $tps_data; }
	public function get_tps_resposta_pergunta_5() { return $this->tps_resposta_pergunta_5; }
	public function set_tps_resposta_pergunta_5($tps_resposta_pergunta_5) { return $this->tps_resposta_pergunta_5 = $tps_resposta_pergunta_5; }
	public function get_tps_resposta_pergunta_3() { return $this->tps_resposta_pergunta_3; }
	public function set_tps_resposta_pergunta_3($tps_resposta_pergunta_3) { return $this->tps_resposta_pergunta_3 = $tps_resposta_pergunta_3; }
	public function get_tps_resposta_pergunta_8() { return $this->tps_resposta_pergunta_8; }
	public function set_tps_resposta_pergunta_8($tps_resposta_pergunta_8) { return $this->tps_resposta_pergunta_8 = $tps_resposta_pergunta_8; }
	public function get_tps_resposta_pergunta_7() { return $this->tps_resposta_pergunta_7; }
	public function set_tps_resposta_pergunta_7($tps_resposta_pergunta_7) { return $this->tps_resposta_pergunta_7 = $tps_resposta_pergunta_7; }
	public function get_tps_resposta_pergunta_13() { return $this->tps_resposta_pergunta_13; }
	public function set_tps_resposta_pergunta_13($tps_resposta_pergunta_13) { return $this->tps_resposta_pergunta_13 = $tps_resposta_pergunta_13; }
	public function get_tps_resultado() { return $this->tps_resultado; }
	public function set_tps_resultado($tps_resultado) { return $this->tps_resultado = $tps_resultado; }
	public function get_tps_resposta_pergunta_2() { return $this->tps_resposta_pergunta_2; }
	public function set_tps_resposta_pergunta_2($tps_resposta_pergunta_2) { return $this->tps_resposta_pergunta_2 = $tps_resposta_pergunta_2; }
	public function get_tps_resposta_pergunta6() { return $this->tps_resposta_pergunta6; }
	public function set_tps_resposta_pergunta6($tps_resposta_pergunta6) { return $this->tps_resposta_pergunta6 = $tps_resposta_pergunta6; }
	public function get_tps_pontuacao() { return $this->tps_pontuacao; }
	public function set_tps_pontuacao($tps_pontuacao) { return $this->tps_pontuacao = $tps_pontuacao; }
	public function get_tps_resposta_pergunta_15() { return $this->tps_resposta_pergunta_15; }
	public function set_tps_resposta_pergunta_15($tps_resposta_pergunta_15) { return $this->tps_resposta_pergunta_15 = $tps_resposta_pergunta_15; }
	public function get_tps_resposta_pergunta_1() { return $this->tps_resposta_pergunta_1; }
	public function set_tps_resposta_pergunta_1($tps_resposta_pergunta_1) { return $this->tps_resposta_pergunta_1 = $tps_resposta_pergunta_1; }
	public function get_tps_codigo() { return $this->tps_codigo; }
	public function set_tps_codigo($tps_codigo) { return $this->tps_codigo = $tps_codigo; }
	public function get_tps_resposta_pergunta_10() { return $this->tps_resposta_pergunta_10; }
	public function set_tps_resposta_pergunta_10($tps_resposta_pergunta_10) { return $this->tps_resposta_pergunta_10 = $tps_resposta_pergunta_10; }
	public function get_tps_resposta_pergunta_12() { return $this->tps_resposta_pergunta_12; }
	public function set_tps_resposta_pergunta_12($tps_resposta_pergunta_12) { return $this->tps_resposta_pergunta_12 = $tps_resposta_pergunta_12; }
	public function get_tps_resposta_pergunta_9() { return $this->tps_resposta_pergunta_9; }
	public function set_tps_resposta_pergunta_9($tps_resposta_pergunta_9) { return $this->tps_resposta_pergunta_9 = $tps_resposta_pergunta_9; }
	public function get_tps_resposta_pergunta_4() { return $this->tps_resposta_pergunta_4; }
	public function set_tps_resposta_pergunta_4($tps_resposta_pergunta_4) { return $this->tps_resposta_pergunta_4 = $tps_resposta_pergunta_4; }
	public function get_fk_usuarios_usu_codigo() { return $this->fk_usuarios_usu_codigo; }
	public function set_fk_usuarios_usu_codigo($fk_usuarios_usu_codigo) { return $this->fk_usuarios_usu_codigo = $fk_usuarios_usu_codigo; }
}