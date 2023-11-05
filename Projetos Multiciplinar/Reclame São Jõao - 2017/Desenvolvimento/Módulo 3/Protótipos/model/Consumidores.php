<?php
class Consumidores{
	private $CON_NUMERO;
	private $CON_CADASTRO_VALIDADO;
	private $CON_DATA_HORA_EMAIL_VALIDACAO;
	private $CON_ID;
	private $CON_COMPLEMENTO;
	private $CON_STATUS_BLOQUEIO;
	private $CON_TELEFONE2;
	private $CON_DATA_NASCIMENTO;
	private $CON_CPF;
	private $USU_ID;
	private $LOC_ID;
	private $AVA_ID;


	public function __construct()
    {

    }

	public function getCON_NUMERO() {
        return $this->CON_NUMERO;
    }

	public function setCON_NUMERO($CON_NUMERO) {
        $this->CON_NUMERO = $CON_NUMERO;
    }

	public function getCON_CADASTRO_VALIDADO() {
        return $this->CON_CADASTRO_VALIDADO;
    }

	public function setCON_CADASTRO_VALIDADO($CON_CADASTRO_VALIDADO) {
        $this->CON_CADASTRO_VALIDADO = $CON_CADASTRO_VALIDADO;
    }



public function getCON_DATA_HORA_EMAIL_VALIDACAO() {
			return $this->CON_DATA_HORA_EMAIL_VALIDACAO;
	}

public function setCON_DATA_HORA_EMAIL_VALIDACAO($CON_DATA_HORA_EMAIL_VALIDACAO) {
			$this->CON_DATA_HORA_EMAIL_VALIDACAO = $CON_DATA_HORA_EMAIL_VALIDACAO;
	}

public function getCON_ID() {
			return $this->CON_ID;
	}

public function setCON_ID($CON_ID) {
			$this->CON_ID = $CON_ID;
	}

	public function getCON_COMPLEMENTO(){
			return $this->CON_COMPLEMENTO;
	}
	public function setCON_COMPLEMENTO($CON_COMPLEMENTO){
			$this->CON_COMPLEMENTO=$CON_COMPLEMENTO;
	}

	public function getCON_STATUS_BLOQUEIO(){
			return $this->CON_STATUS_BLOQUEIO;
	}
	public function setCON_STATUS_BLOQUEIO($CON_STATUS_BLOQUEIO){
			$this->CON_STATUS_BLOQUEIO=$CON_STATUS_BLOQUEIO;
	}

	public function getCON_TELEFONE2(){
			return $this->CON_TELEFONE2;
	}
	public function setCON_TELEFONE2($CON_TELEFONE2){
			$this->CON_TELEFONE2=$CON_TELEFONE2;
	}

	public function getCON_DATA_NASCIMENTO(){
			return $this->CON_DATA_NASCIMENTO;
	}
	public function setCON_DATA_NASCIMENTO($CON_DATA_NASCIMENTO){
			$this->CON_DATA_NASCIMENTO=$CON_DATA_NASCIMENTO;
	}

	public function getCON_CPF(){
			return $this->CON_CPF;
	}
	public function setCON_CPF($CON_CPF){
			$this->CON_CPF=$CON_CPF;
	}
	public function getUSU_ID(){
			return $this->USU_ID;
	}
	public function setUSU_ID($USU_ID){
			$this->USU_ID=$USU_ID;
	}


	public function getLOC_ID(){
			return $this->LOC_ID;
	}
	public function setLOC_ID($LOC_ID){
			$this->LOC_ID=$LOC_ID;
	}

public function getAVA_ID(){
		return $this->AVA_ID;
}
public function setAVA_ID($AVA_ID){
		$this->AVA_ID=$AVA_ID;
}

}

?>
