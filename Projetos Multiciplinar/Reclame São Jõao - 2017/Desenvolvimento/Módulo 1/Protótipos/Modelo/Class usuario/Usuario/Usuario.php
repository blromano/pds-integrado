<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        class Usuario {

            private $id;
            private $nome;
            private $sobrenome;
            private $CPF;
            private $CEP;
            private $senha;
            private $confirmarSenha;
            private $email;
            private $dataNascimento;
            private $rua;
            private $bairro;
            private $numero;
            private $complemento;
            private $estado;
            private $cidade;
            private $telefone1;
            private $telefone2;
            private $nivelAcesso;

            function __construct($id, $nome, $sobrenome, $CPF, $CEP, $senha, $confirmarSenha, $email, $dataNascimento, $rua, $bairro, $numero, $complemento, $estado, $cidade, $telefone1, $telefone2, $nivelAcesso) {
                $this->id = $id;
                $this->nome = $nome;
                $this->sobrenome = $sobrenome;
                $this->CPF = $CPF;
                $this->CEP = $CEP;
                $this->senha = $senha;
                $this->confirmarSenha = $confirmarSenha;
                $this->email = $email;
                $this->dataNascimento = $dataNascimento;
                $this->rua = $rua;
                $this->bairro = $bairro;
                $this->numero = $numero;
                $this->complemento = $complemento;
                $this->estado = $estado;
                $this->cidade = $cidade;
                $this->telefone1 = $telefone1;
                $this->telefone2 = $telefone2;
                $this->nivelAcesso = $nivelAcesso;
            }

            function getId() {
                return $this->id;
            }

            function getNome() {
                return $this->nome;
            }

            function getSobrenome() {
                return $this->sobrenome;
            }

            function getCPF() {
                return $this->CPF;
            }

            function getCEP() {
                return $this->CEP;
            }

            function getSenha() {
                return $this->senha;
            }

            function getConfirmarSenha() {
                return $this->confirmarSenha;
            }

            function getEmail() {
                return $this->email;
            }

            function getDataNascimento() {
                return $this->dataNascimento;
            }

            function getRua() {
                return $this->rua;
            }

            function getBairro() {
                return $this->bairro;
            }

            function getNumero() {
                return $this->numero;
            }

            function getComplemento() {
                return $this->complemento;
            }

            function getEstado() {
                return $this->estado;
            }

            function getCidade() {
                return $this->cidade;
            }

            function getTelefone1() {
                return $this->telefone1;
            }

            function getTelefone2() {
                return $this->telefone2;
            }

            function getNivelAcesso() {
                return $this->nivelAcesso;
            }

            function setId($id) {
                $this->id = $id;
            }

            function setNome($nome) {
                $this->nome = $nome;
            }

            function setSobrenome($sobrenome) {
                $this->sobrenome = $sobrenome;
            }

            function setCPF($CPF) {
                $this->CPF = $CPF;
            }

            function setCEP($CEP) {
                $this->CEP = $CEP;
            }

            function setSenha($senha) {
                $this->senha = $senha;
            }

            function setConfirmarSenha($confirmarSenha) {
                $this->confirmarSenha = $confirmarSenha;
            }

            function setEmail($email) {
                $this->email = $email;
            }

            function setDataNascimento($dataNascimento) {
                $this->dataNascimento = $dataNascimento;
            }

            function setRua($rua) {
                $this->rua = $rua;
            }

            function setBairro($bairro) {
                $this->bairro = $bairro;
            }

            function setNumero($numero) {
                $this->numero = $numero;
            }

            function setComplemento($complemento) {
                $this->complemento = $complemento;
            }

            function setEstado($estado) {
                $this->estado = $estado;
            }

            function setCidade($cidade) {
                $this->cidade = $cidade;
            }

            function setTelefone1($telefone1) {
                $this->telefone1 = $telefone1;
            }

            function setTelefone2($telefone2) {
                $this->telefone2 = $telefone2;
            }

            function setNivelAcesso($nivelAcesso) {
                $this->nivelAcesso = $nivelAcesso;
            }

        }
        ?>
    </body>
</html>
