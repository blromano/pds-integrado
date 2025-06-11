<?php

    namespace App\Model;

    class Alunos_Inscritos_EventosModel{
        private $AIE_ID;
        private $AIE_COPIA_RG;
        private $AIE_ATIVO;
        private $AIE_FOTO_PESSOAL;
        private $AIE_AUTORIZACAO_PAIS;
        private $AIE_HOMOLOGA;
        private $AIE_JUSTIFICATIVA;
        private $AIE_BOLETIM_ESCOLAR;
        private $FK_ALUNOS_ALU_ID;
        private $FK_EVENTOS_EVO_ID;


        //Relação de atributos com a entidade ALUNOS
        private $ALU_NOME;
        private $ALU_PRONTUARIO;
        private $AIM_COMPROVANTE_FAIXA;
        private $ALU_CPF;
        private $ALU_DATA_NASCIMENTO;
        private $ALU_SEXO;

        //Relação tabela cursos
        private $CUR_NOME;

        //Relação tabela campus
        private $CAM_NOME;

        //Relação tabela modalidade
        private $MDE_NOME;

        //Relação tabela eventos
        private $EVO_ID;
        private $EVO_NOME;
        private $EVO_STATUS;
        private $EVO_DATA_INICIO;
        private $CID_NOME;
        private $EST_SIGLA;
        private $ORE_NOME;
        
        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }