<?php
    namespace App\Model; 

    class ViolacoesModel{

        private $VIO_ID;
        private $DEN_TITULO;
        private $USU_NOME;
        private $VIO_DESCRICAO;
        private $VIO_IMAGEM;
        private $DEN_DESCRICAO;
       
        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        

    }
?>