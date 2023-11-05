<?php
class Usuario
{
	
	private $id;
	private $nome;
	private $sobrenome; 
	private $email; 
	private $data_nascimento; 
	private $complemento; 
	private $cpf; 
	private $numero; 
	private $foto_perfil; 
	private $telefone1; 
	private $telefone2; 
	private $senha; 
	private $confirmar_senha; 
	private $estado; 
	private $rua; 
	private $bairro; 
	private $cep; 
	private $cidade;
	
	
	public function __construct()
    {
        
    }
		
	public function getId() {
        return $this->id;
    }
	
	public function setId($id) {
        $this->id = $id;
    }
    
	public function getNome() {
        return $this->nome;
    }
	
	public function setNome($nome) {
        $this->nome = $nome;
    }
	
	public function getSobrenome() {
        return $this->sobrenome;
    }
	
	public function setSobrenome($sobrenome) {
        $this->sobrenome= $sobrenome;
    }
	
	public function getEmail() {
        return $this->email;
    }
	
	public function setEmail($email) {
        $this->email = $email;
    }
	
	public function getData_Nascimento() {
        return $this->data_nascimento;
    }
	
	public function setdata_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }
	
	public function getCpf() {
        return $this->cpf;
    }
	
	public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
	
	public function getComplemento() {
        return $this->complemento;
    }
	
	public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }
	
	public function getNumero() {
        return $this->numero;
    }
	
	public function setNumero($numero) {
        $this->numero = $numero;
    }
	
	public function getFoto_Perfil() {
        return $this->foto_perfil;
    }
	
	public function setFoto_Perfil($foto_perfil) {
        $this->foto_perfil = $foto_perfil;
    }
	
	public function getTelefone1 () {
        return $this->telefone1 ;
    }
	
	public function setTelefone1 ($telefone1) {
        $this->telefone1  = $telefone1 ;
    }
	
	public function getTelefone2 () {
        return $this->telefone2 ;
    }
	
	public function setTelefone2 ($telefone2) {
        $this->telefone2  = $telefone2 ;
    }
	
	public function getSenha() {
        return $this->senha;
    }
	
	public function setsenha($senha) {
        $this->senha = $senha;
    }
	
	public function getConfirmar_Senha() {
        return $this->confirmar_senha;
    }
	
	public function setconfirmar_senha($confirmar_senha) {
        $this->confirmar_senha = $confirmar_senha;
    }
	
	public function getEstado() {
        return $this->estado;
    }
	
	public function setEstado($estado) {
        $this->estado = $estado;
    }
	
	public function getRua() {
        return $this->rua;
    }
	
	public function setRua($rua) {
        $this->rua = $rua;
    }
	
	public function getBairro() {
        return $this->bairro;
    }
	
    public function setBairro($bairro) {
        $this->bairro= $bairro;
    }
	
	public function getCep() {
        return $this->cep;
    }
	
	public function setCep($cep) {
        $this->cep = $cep;
    }
	
	public function getCidade() {
        return $this->cidade;
    }
	
	public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
	   
}
  
?>

