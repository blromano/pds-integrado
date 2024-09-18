<?php
class OrgaosColab {
	private $id;
	private $nome;
	private $contato;
	private $email;


	public function __construct($id, $nome, $contato, $email)
	{
        $this->id = $id;
		$this->nome = $nome;
		$this->contato = $contato;
		$this->email = $email;
	}

	
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function setContato($contato)
    {
        $this->contato = $contato;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function jsonSerialize() {
        return
                array(
                    "id" => "$this->id",
                    "nome" => "$this->nome",
                    "email" => "$this->email", 
                    "contato" => "$this->contato"
        );
    }
}