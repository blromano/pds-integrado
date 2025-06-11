<?php

    namespace App\Model;

    class Alunos_Selecionados_EquipeModel{
        private $ALS_ID;
        private $FK_EVENTOS_MODALIDADES_EVM_ID;
        private $FK_ALUNOS_ALU_ID;
        private $ALS_SELECIONADO;
        private $ALS_DATA_HORA;

        //TABELA ALUNOS
        private $ALU_NOME;
        private $ALU_PRONTUARIO;
        private $ALU_CPF;
        private $FK_CURSOS_CUR_ID;

        /* $ALS_JUSTIFICATIVA;*/
        
        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }