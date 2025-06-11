<?php

    namespace App\Model;

    class Secretarios_EventosModel{

        private $SCE_ID;
        private $SCE_NOME;
        private $SCE_NOME_SOCIAL;
        private $SCE_CPF;
        private $SCE_RG;
        private $SCE_TELEFONE;
        private $SCE_ETNIA;
        private $SCE_PRONTUARIO;
        private $SCE_SEXO;
        private $SCE_FOTO;
        private $SCE_DATA_NASCIMENTO;
        private $SCE_RUA;
        private $SCE_BAIRRO;
        private $SCE_COMPLEMENTO;
        private $SCE_CEP;
        private $FK_LOGIN_LGN_ID;
        private $FK_CAMPUS_CAM_ID;
        private $FK_CIDADES_CID_ID;
        private $CID_ID;

        //Relação de atributos com a entidade campus e secretarios_eventos
        private $CAM_ID;
        private $CAM_NOME;
        private $LGN_NOME;
        private $CID_NOME;


        //Relação de atributos com a entidade login e secretarios_eventos
        private $LGN_SENHA;
        private $LGN_EMAIL;
        private $LGN_ATIVO;
        private $LGN_TIPO;
        private $LGN_JUSTIFICATIVA_RESTRICAO;

        public function __set($name, $value) {

            $this-> $name = $value;
        }

        public function __get($name) {

            return $this-> $name;
        }

    }




?>