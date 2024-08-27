<?php
class Email{
	private $email;
	private $nome;

	  public function getNome() {
        return $this->nome;
    }

     public function getEmail() {
        return $this->email;
    }

     public function setNome($nome) {
        $this->nome = $nome;
    }

     public function setEmail($email) {
        $this->email = $email;
    }



}

?>