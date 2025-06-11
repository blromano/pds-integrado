<?php

    namespace App\Model;

    class Alunos_Inscritos_ModalidadesModel{

        //TABELA DE ALUNOS INSCRITOS NA MODALIDADE
        private $AIM_ID;
        private $AIM_DEFERIDO;
        private $AIM_JUSTIFICATIVA;
        private $AIM_COMPROVANTE_FAIXA;
        private $FK_ALUNOS_ALU_ID;
        private $FK_EVENTOS_MODALIDADES_EVM_ID;

        //TABELA DE ALUNOS
        private $ALU_ID;
        private $ALU_NOME;
        private $ALU_PRONTUARIO;
        private $ALU_CPF;
        private $FK_CURSOS_CUR_ID;

        //TABELA DE CURSOS
        private $CUR_NOME;

        //TABELA DE MODALIDADES
        private $MDE_NOME;

        //TABELA EVENTOS/MODALIDADES
        private $EVM_ID;
        
        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }
?>