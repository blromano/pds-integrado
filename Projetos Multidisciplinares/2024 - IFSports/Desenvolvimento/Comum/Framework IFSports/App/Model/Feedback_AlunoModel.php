<?php

    namespace App\Model;

    class Feedback_AlunoModel{
        private $FDB_ID;
        private $FK_ALUNOS_ALU_ID;
        private $FK_EVENTOS_EVO_ID;
        private $FDB_NOTA_HIGIENE;
        private $FDB_NOTA_COMPLEXOS;
        private $FDB_NOTA_ORGANIZACAO;
        private $FDB_NOTA_LOCOMOCAO;
        private $FDB_NOTA_COMODIDADE;
        private $FDB_NOTA_ARBITRAGEM;
        private $FDB_NOTA_SEGURANCA;
        private $FDB_NOTA_ALIMENTACAO;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }