<?php
class Estabelecimentos{
	private $EST_NOME_FANTASIA;
	private $EST_CNPJ;
	private $EST_NOME_RESPONSAVEL;
	private $EST_FACEBOOK_EMPRESA;
	private $EST_SITE_EMPRESA;
	private $EST_ID;
	private $EST_NUMERO_ENDERECO;
	private $EST_TOTAL_RECLAMACAO;
	private $EST_MEDIA_RECLAMACAO;
	private $EST_PUBLICO_ALVO;
	private $EST_LATITUDE;
	private $EST_LONGITUDE;
	private $EST_STATUS_BLOQUEIO;
	private $EST_COMPLEMENTO;
	private $EST_MEDIA_AVALIACAO_CONSUMIDORES;
	private $USU_ID;
	private $NOT_ID;
	private $TES_ID;


	public function __construct()
    {

    }

	public function getEST_NOME_FANTASIA() {
        return $this->EST_NOME_FANTASIA;
    }

	public function setEST_NOME_FANTASIA($EST_NOME_FANTASIA) {
        $this->EST_NOME_FANTASIA = $EST_NOME_FANTASIA;
    }

	public function getEST_CNPJ() {
        return $this->EST_CNPJ;
    }

	public function setEST_CNPJ($EST_CNPJ) {
        $this->EST_CNPJ = $EST_CNPJ;
    }

	public function getEST_NOME_RESPONSAVEL() {
        return $this->EST_NOME_RESPONSAVEL;
    }

	public function setEST_NOME_RESPONSAVEL($EST_NOME_RESPONSAVEL) {
        $this->EST_NOME_RESPONSAVEL = $EST_NOME_RESPONSAVEL;
    }

	public function getEST_FACEBOOK_EMPRESA() {
        return $this->EST_FACEBOOK_EMPRESA;
    }

	public function setPontuacao($EST_FACEBOOK_EMPRESA) {
        $this->EST_FACEBOOK_EMPRESA = $EST_FACEBOOK_EMPRESA;
    }

		public function getEST_SITE_EMPRESA() {
	        return $this->EST_SITE_EMPRESA;
	    }

		public function setEST_SITE_EMPRESA($EST_SITE_EMPRESA) {
	        $this->EST_SITE_EMPRESA = $EST_SITE_EMPRESA;
	    }

			public function getEST_ID() {
						return $this->EST_ID;
				}

			public function setEST_ID($EST_ID) {
						$this->EST_ID = $EST_ID;
				}


				public function getEST_NUMERO_ENDERECO() {
							return $this->EST_NUMERO_ENDERECO;
					}

				public function setEST_NUMERO_ENDERECO($EST_NUMERO_ENDERECO) {
							$this->EST_NUMERO_ENDERECO = $EST_NUMERO_ENDERECO;
					}

public function getEST_TOTAL_RECLAMACAO() {
			return $this->EST_TOTAL_RECLAMACAO;
	}

public function setEST_TOTAL_RECLAMACAO($EST_TOTAL_RECLAMACAOO) {
			$this->EST_TOTAL_RECLAMACAO = $EST_TOTAL_RECLAMACAO;
	}

	public function getEST_MEDIA_RECLAMACAO() {
				return $this->EST_MEDIA_RECLAMACAO;
		}

	public function setEST_MEDIA_RECLAMACAO($EST_MEDIA_RECLAMACAO) {
				$this->EST_MEDIA_RECLAMACAO = $EST_MEDIA_RECLAMACAO;
		}


		public function getEST_PUBLICO_ALVO() {
					return $this->EST_PUBLICO_ALVO;
			}

		public function setEST_PUBLICO_ALVO($EST_PUBLICO_ALVO) {
					$this->EST_PUBLICO_ALVO = $EST_PUBLICO_ALVO;
			}



			public function getEST_LATITUDE() {
						return $this->EST_LATITUDE;
				}

			public function setEST_LATITUDE($EST_LATITUDE) {
						$this->EST_LATITUDE = $EST_LATITUDE;
				}


				public function getEST_LONGITUDE() {
							return $this->EST_LONGITUDE;
					}

				public function setEST_LONGITUDE($EST_LONGITUDE) {
							$this->EST_LONGITUDE = $EST_LONGITUDE;
					}


					public function getEST_STATUS_BLOQUEIO() {
								return $this->EST_STATUS_BLOQUEIO;
						}

					public function setEST_STATUS_BLOQUEIO($EST_STATUS_BLOQUEIO) {
								$this->EST_STATUS_BLOQUEIO = $EST_STATUS_BLOQUEIO;
						}


						public function getEST_COMPLEMENTO() {
									return $this->EST_COMPLEMENTO;
							}

						public function setEST_COMPLEMENTO($EST_COMPLEMENTO) {
									$this->EST_COMPLEMENTO = $EST_COMPLEMENTO;
							}

public function getEST_MEDIA_AVALIACAO_CONSUMIDORES() {
			return $this->EST_MEDIA_AVALIACAO_CONSUMIDORES;
	}

public function setEST_MEDIA_AVALIACAO_CONSUMIDORES($EST_MEDIA_AVALIACAO_CONSUMIDORES) {
			$this->EST_MEDIA_AVALIACAO_CONSUMIDORES = $EST_MEDIA_AVALIACAO_CONSUMIDORES;
}


			public function getUSU_ID() {
						return $this->USU_ID;
				}

			public function setUSU_ID($USU_ID) {
						$this->USU_ID = $USU_ID;
			}

			public function getNOT_ID() {
						return $this->NOT_ID;
				}

			public function setNOT_ID($NOT_ID) {
						$this->NOT_ID = $NOT_ID;
			}

			public function getTES_ID() {
						return $this->TES_ID;
				}

			public function setTES_ID($TES_ID) {
						$this->TES_ID = $TES_ID;
			}




}
?>
