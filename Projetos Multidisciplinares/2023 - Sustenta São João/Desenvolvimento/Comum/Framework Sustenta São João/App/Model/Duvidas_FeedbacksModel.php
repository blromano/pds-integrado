<?php

    namespace App\Model;

    class Duvidas_FeedbacksModel{
        private $DEF_DESCRICAO;	
        private $DEF_URGENCIA;	
        private $DEF_TEMA;	
        private $DEF_STATUS;	
        private $DEF_DATA_HORA;	
        private $DEF_ID;	
        private $DEF_ANEXO;	
        private $FK_CIDADAOS_USU_ID;
        private $FK_SETORES_SET_ID;
        

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }
?>