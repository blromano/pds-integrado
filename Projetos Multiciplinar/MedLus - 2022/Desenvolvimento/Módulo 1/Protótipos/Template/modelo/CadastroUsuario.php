<?php
    class CadastroUsuario{

        private $id;
        private $nome;
        private $cpf;
        private $rg;
        private $email;
        private $senha;
        private $numero_celular;
        private $telefone;
        private $data_de_nacimento;
        private $numero_residencia;
        private $sexo;
        private $cep;
        private $complemento;
        private $foto;

        function setId($id){
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setNome($nome){
            $this->nome = $nome;
        }

        function getNome(){
            return $this->nome;
        }

        function setCpf($cpf){
            $this->cpf = $cpf;
        }

        function getCpf(){
            return $this->cpf;
        }

        function setRg($rg){
            $this->rg = $rg;
        }

        function getRg(){
            return $this->rg;
        }

        function setEmail($email){
            $this->email = $email;
        }

        function getEmail(){
            return $this->email;
        }

        function setSenha($senha){
            $this->senha = $senha;
        }

        function getSenha(){
            return $this->senha;
        }

        function setNumero_celular($numero_celular){
            $this->numero_celular = $numero_celular;
        }

        function getNumero_celular(){
            return $this->numero_celular;
        }

        function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        function getTelefone(){
            return $this->telefone;
        }

        function setData_de_nacimento($data_de_nacimento){
            $this->data_de_nacimento = $data_de_nacimento;
        }

        function getData_de_nacimento(){
            return $this->data_de_nacimento;
        }

        function setNumero_residencia($numero_residencia){
            $this->numero_residencia = $numero_residencia;
        }

        function getNumero_residencia(){
            return $this->numero_residencia;
        }

        function setSexo($sexo){
            $this->sexo = $sexo;
        }

        function getSexo(){
            return $this->sexo;
        }

        function setCep($cep){
            $this->cep = $cep;
        }

        function getCep(){
            return $this->cep;
        }

        function setComplemento($complemento){
            $this->complemento = $complemento;
        }

        function getComplemento(){
            return $this->complemento;
        }

        function setFoto($foto){
            $this->foto = $foto;
        }

        function getFoto(){
            return $this->foto;
        }

    }

