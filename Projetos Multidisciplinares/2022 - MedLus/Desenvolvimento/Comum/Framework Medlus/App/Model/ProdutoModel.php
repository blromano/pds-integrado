<?php
    namespace App\Model;
    class ProdutoModel{
        private $PRO_VALOR;
        private $PRO_NOME;
        private $PRO_ID;
        private $PRO_QUANTIDADE;
        private $FK_FORNECEDORES_FOR_ID;
        private $FK_TIPOS_PRODUTOS_TPP_ID;

        public function __get($name)
        {
            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

    }
?>