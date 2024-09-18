<?php
    namespace App\Model;
    
    class ConsultaOnlineModel{

        private $CTO_DATA;
        private $CTO_DIAGNOSTICO;
        private $CTO_HORA_INICIO;
        private $CTO_HORA_TERMINO;
        private $CTO_ID;
        private $CTO_JUSTIFICATIVA;
        private $CTO_LINK_MEET;
        private $CTO_OBSERVACOES;
        private $CTO_PRESCRICAO;
        private $CTO_STATUS;
        private $FK_MEDICOS_MED_ID;
        private $FK_PACIENTES_PAC_ID;
        private $FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID;
        private $PAC_ID;
        private $USU_NOME;
        private $ESP_NOME;

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }