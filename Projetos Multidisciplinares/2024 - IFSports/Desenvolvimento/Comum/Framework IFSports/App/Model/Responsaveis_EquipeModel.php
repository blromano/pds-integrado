<?php

    namespace App\Model;

    class Responsaveis_EquipeModel{

        private $RES_ID;
        private $RES_NOME;
        private $RES_NOME_SOCIAL;
        private $RES_CPF;
        private $RES_RG;
        private $RES_DATA_NASCIMENTO;
        private $RES_TELEFONE;
        private $RES_SEXO;
        private $RES_ETNIA;
        private $RES_FOTO;
        private $RES_COMPLEMENTO;
        private $RES_CEP;
        private $RES_RUA;
        private $RES_BAIRRO;
        private $RES_PRONTUARIO;
        private $FK_CIDADES_CID_ID;
        private $FK_LOGIN_LGN_ID;
        private $FK_CAMPUS_CAM_ID;

        private $FK_EVENTOS_EVO_ID;
        private $CAM_NOME;
        private $EVO_NOME;
        private $EVO_ID;
        private $LGN_EMAIL;
        private $CID_NOME;

        public function __set($name, $value) {

            $this-> $name = $value;
        }

        public function __get($name) {

            return $this-> $name;
        }

    }




?>