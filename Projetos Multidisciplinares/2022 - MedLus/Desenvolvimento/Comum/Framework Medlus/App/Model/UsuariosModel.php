<?php

    namespace App\Model;

    class UsuariosModel{

        private $USU_ID;
        private $USU_CPF;
        private $USU_RG;
        private $USU_EMAIL;
        private $USU_SENHA;
        private $USU_NUMERO_CELULAR;
        private $USU_TELEFONE;
        private $USU_DATA_DE_NASCIMENTO;
        private $USU_NOME;
        private $USU_NUMERO_RESIDENCIA;
        private $USU_SEXO;
        private $USU_CEP;
        private $USU_COMPLEMENTO;
        private $USU_FOTO;
        private $USU_NOME_SOCIAL;
        private $USU_TIPO;


        public function __get($name){
            return $this->$name;
        }
        public function __set($name, $value){
            $this->$name = $value;
        }
       
    }
/* 
    $paciente = new PacienteModel;
    $paciente->setPAC_ID('123');
    $paciente->setPAC_PRONTUARIO('Everton');
    $paciente->setFK_USUARIOS_USU_ID('1');
    $paciente->setFK_PLANOS_PLA_ID('1');

    echo "ID: ".$paciente->getPAC_ID()." Prontuario: ".$paciente->getPAC_PRONTUARIO()." Usuário: ".$paciente->getFK_USUARIOS_USU_ID()." Plano: ".$paciente->getFK_PLANOS_PLA_ID();
 */