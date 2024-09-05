<?php 

    namespace App\Model;

    class ReclamacoesModel{

        private $REC_ID;
        private $REC_TITULO_RECLAMACAO;
        private $REC_NOTA_AVALIACAO;
        private $REC_STATUS;
        private $REC_DESCRICAO;
        private $REC_DATAHORA;
        private $REC_ANEXO;
        private $REC_RESPOSTA_RECLAMACAO;
        private $FK_CIDADAOS_USU_ID;
        private $FK_SETORES_SET_ID;
        private $FK_GESTORES_USU_ID;


        public function __set($nome, $valor) {
           $this->$nome = $valor;
        }

        public function __get($nome) {
            return $this->$nome;
        }
    }

?>