<?php

    namespace App\Model;

    class Usuario{
        
        private $idusuario;
        private $nome;
        private $email;
        private $senha;
        private $nivel;        
        
        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        
        
    }
    
?>
