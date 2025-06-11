<?php

    namespace App\Model;

    class LoginModel{
        private $LGN_ID;
        private $LGN_SENHA;
        private $LGN_TIPO;
        private $LGN_JUSTIFICATIVA_RESTRICAO;
        private $LGN_ATIVO;
        private $LGN_EMAIL;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }