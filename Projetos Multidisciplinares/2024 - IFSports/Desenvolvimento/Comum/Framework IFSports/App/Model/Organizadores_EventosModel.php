<?php

    namespace App\Model;

    class Organizadores_EventosModel{

        private $ORE_ID;
        private $ORE_CPF;
        private $ORE_TELEFONE;
        private $ORE_SEXO;
        private $ORE_ETNIA;
        private $ORE_PRONTUARIO;
        private $ORE_NOME;
        private $ORE_FOTO;
        private $ORE_RG;
        private $ORE_NOME_SOCIAL;
        private $ORE_DATA_NASCIMENTO;
        private $ORE_CEP;
        private $ORE_BAIRRO;
        private $ORE_RUA;
        private $ORE_COMPLEMENTO;
        private $FK_LOGIN_LGN_ID;
        private $FK_CAMPUS_CAM_ID;
        private $FK_CIDADES_CID_ID;



        //Relação de atributos com a entidade campus e organizadores_eventos
        private $CAM_NOME;
        private $LGN_NOME;
        private $CID_NOME;

        //Relação de atributos com a entidade login e secretarios_eventos
        private $LGN_SENHA;
        private $LGN_EMAIL;
        private $LGN_ATIVO;
        private $LGN_TIPO;

        //nome dos eventos
        private $EVO_NOME;

        public function __set($name, $value) {

            $this-> $name = $value;
        }

        public function __get($name) {

            return $this-> $name;
        }

    }




?>