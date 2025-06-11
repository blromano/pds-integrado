<?php

    namespace App\Model;

    class DenunciasModel{
        private $DNC_ID;
        private $DNC_TITULO;
        private $DNC_DESCRICAO;
        private $DNC_STATUS;
        private $DNC_DATA;
        private $FK_EVENTOS_EVO_ID;
        private $FK_SECRETARIO_EVENTOS_SCE_ID;
        private $FK_ORGANIZADORES_EVENTOS_ORE_ID;
        private $FK_RESPONSAVEIS_EQUIPE_RES_ID;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }

    }