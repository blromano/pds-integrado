<?php

    namespace App\Model;

    class Post{
        
        private $idPost;
        private $nomePost;
        private $comentario;    
        
        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        
        
    }
    
?>
