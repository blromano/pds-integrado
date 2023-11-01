<?php

    namespace App\Model;

    class Produto {
    
        private $id;
        private $descricao;
        private $preco;
        
        public function getId() {
            return $this->id;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }


        
    }
    
?>
