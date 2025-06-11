<?php

    namespace App\Model;

    class EventosModel{
        private $EVO_ID;
        private $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MIN;
        private $EVO_DATA_INICIO;
        private $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MAX;
        private $EVO_RESTRICAO_QTD_INSCRICOES_COLETIVA_MIN;
        private $EVO_MATRICULA_ALUNO;
        private $EVO_DATA_FIM;
        private $EVO_RESTRICAO_IDADE_MIN;
        private $EVO_STATUS_INSCRICAO;
        private $EVO_RESTRICAO_IDADE_MAX;
        private $EVO_RESTRICAO_GENERO;
        private $EVO_NOME;
        private $EVO_STATUS;
        private $EVO_RESTRICAO_OUTRAS;
        private $EVO_RESTRICAO_QTD_INSCRICOES_INDIVIDUAIS_MAX;
        private $EVO_LOGO;
        private $FK_ORGANIZADORES_EVENTOS_ORE_ID;
        private $FK_CAMPUS_CAM_ID;

        //Relação de atributos com a entidade campus e organizadores_eventos
        private $CAM_NOME;
        private $ORE_NOME;
        
        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }