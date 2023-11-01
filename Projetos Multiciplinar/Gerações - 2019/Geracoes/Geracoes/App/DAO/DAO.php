<?php

    namespace App\DAO;
    
    use App\Connection;

    abstract class DAO extends Connection{
        
        public abstract function inserir($obj);
        public abstract function excluir($obj);
        public abstract function alterar($obj);
        public abstract function buscarPorId($obj);
        public abstract function listar();
        
    }
