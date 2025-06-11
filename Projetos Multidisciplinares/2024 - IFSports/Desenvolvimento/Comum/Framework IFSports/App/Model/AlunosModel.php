<?php

    namespace App\Model;

    class AlunosModel{
        private $ALU_ID;
        private $ALU_NOME;
        private $ALU_NOME_SOCIAL;
        private $ALU_DATA_NASCIMENTO;
        private $ALU_SEXO;
        private $ALU_ETNIA;
        private $ALU_CPF;
        private $ALU_RG;
        private $ALU_FOTO;
        private $ALU_TELEFONE;
        private $ALU_NUMERO;
        private $ALU_RUA;
        private $ALU_BAIRRO;
        private $ALU_CEP;
        private $ALU_COMPLEMENTO;
        private $ALU_PRONTUARIO;
        private $FK_LOGIN_LGN_ID;
        private $FK_CURSOS_CUR_ID;
        private $FK_CIDADES_CID_ID;
        
        //campus necessários para atualização de usuário
        private $CAM_NOME;
        private $LGN_EMAIL;
        
        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }