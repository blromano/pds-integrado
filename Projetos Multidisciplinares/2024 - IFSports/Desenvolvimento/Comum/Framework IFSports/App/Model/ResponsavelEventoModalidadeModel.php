<?php

    namespace App\Model;

    class ResponsavelEventoModalidadeModel{

        private $REM_ID;
        private $FK_EVENTOS_MODALIDADES_EVM_ID;
        private $FK_RESPONSAVEIS_EQUIPE_RES_ID;

        // Para vincular a outros DAOs
        private $EVO_ID;
        private $EVO_NOME;
        private $EVO_DATA_INICIO;
        private $FK_MODALIDADES_MDE_ID;
        private $MDE_NOME;
    
        public function __set($name, $value) {

            $this-> $name = $value;
        }

        public function __get($name) {

            return $this-> $name;
        }

    }




?>