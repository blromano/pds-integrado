<?php

    namespace App\Model;

    class Respostas_Duvidas_FeedbacksModel{
        private $RES_TEXTO;	
        private $RES_ID;	
        private $RES_ANEXO;	
        private $RES_DATA_HORA;	
        private $FK_DUVIDAS_FEEDBACKS_DEF_ID;	
        private $FK_GESTORES_USU_ID;	

        

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }
?>