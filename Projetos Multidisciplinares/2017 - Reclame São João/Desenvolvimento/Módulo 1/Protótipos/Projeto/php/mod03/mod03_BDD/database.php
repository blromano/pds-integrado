<?php
class Database {
    
    var $servername = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "estabelecimentos";
    
    
    function createDatabase() {
        //1 Create connection
        $conn = new mysqli($this->servername, 
                           $this->username, 
                           $this->password);

        //2 Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
       
        
        //3 Create database
        $sql = "CREATE DATABASE IF NOT EXISTS ".
                $this->dbname;
        if ($conn->query($sql) === TRUE) {
            //echo "Database created successfully or already exists.";
        } else {
            echo "Error creating database: " . $conn->error;
        }
        
        $conn->close();
    }
    
    function createTable(){
        
        // Create connection
        $conn = new mysqli($this->servername, 
                        $this->username, 
                        $this->password, 
                        $this->dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        

        if (mysqli_query($conn, $sql))
		{
            //echo "Table created successfully or already exists.";
        } else 
		{
            echo "Error creating table: " . mysqli_error($conn);
        }
        
         $conn->close();
        
    }
    
    function insert($EST_CNPJ, $EST_FOTO_PERFIL, $EST_NOME_FANTASIA, $EST_ENDERECO, $EST_CEP, $EST_NOME_RESPONSAVEL, $EST_NOME_EMPRESA, $EST_PUBLICO_ALVO, $EST_SITE_EMPRESA, $EST_EMAIL, $TIP_ID) 
	{
        // Create connection
        $conn = new mysqli($this->servername, 
                           $this->username, 
                           $this->password, 
                           $this->dbname);
        // Check connection
        if ($conn->connect_error) 
		{
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO estabelecimentos 
                 (EST_CNPJ, EST_FOTO_PERFIL, EST_NOME_FANTASIA, EST_ENDERECO, EST_CEP, EST_NOME_RESPONSAVEL, EST_NOME_EMPRESA, EST_PUBLICO_ALVO, EST_SITE_EMPRESA, EST_EMAIL, TIP_ID)
                 VALUES ('".$EST_CNPJ."',
                         '".$EST_FOTO_PERFIL."',"
						 . "'".$EST_NOME_FANTASIA."',"
						 . "'".$EST_ENDERECO."',"
						 . "'".$EST_CEP."',"
						 . "'".$EST_NOME_RESPONSAVEL."',"
                         . "'".$EST_NOME_EMPRESA."',"
					     . "'".$EST_PUBLICO_ALVO."',"
						 . "'".$EST_SITE_EMPRESA."',"
						 . "'".$EST_EMAIL."',"
                         . "'".$TIP_ID."');";
						 
        if ($conn->query($sql) === TRUE) 
		{
            //id da ultima insercao no banco
            $last_id = $conn->insert_id;
            //echo "Um novo registro foi criado. "
            //   . "Last inserted ID is: " . $last_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }        
        $conn->close();
    }
	
	function insert_produtos($PRO_NOME_PRODUTO, $PRO_DESCRICAO_PRODUTO) 
	{
        // Create connection
        $conn = new mysqli($this->servername, 
                           $this->username, 
                           $this->password, 
                           $this->dbname);
        // Check connection
        if ($conn->connect_error) 
		{
            die("Connection failed: " . $conn->connect_error);
        }


						 
		$sql = "INSERT INTO produtos 
                 (NOME_PRODUTO)
                 VALUES ('".$PRO_NOME_PRODUTO."',
                         .'".$PRO_DESCRICAO_PRODUTO"');";
       
        if ($conn->query($sql) === TRUE) 
		{
            //id da ultima insercao no banco
            $last_id = $conn->insert_id;
            //echo "Um novo registro foi criado. "
            //   . "Last inserted ID is: " . $last_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }        
        $conn->close();
    }
    
    function select() 
	{
        // 1. Create connection
        $conn = new mysqli($this->servername, 
                           $this->username, 
                           $this->password, 
                           $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM produto;";
        $result = $conn->query($sql);
        //$conn->close();
        return $result;        
    }
    
    function delete() 
	{
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // sql to delete a record
        $sql = "DELETE FROM MyGuests WHERE id=3";

        if ($conn->query($sql) === TRUE) {
            //echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();       
    }
    
    function update(){
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "UPDATE MyGuests SET lastname='Joe Joe' WHERE id=2";

        if ($conn->query($sql) === TRUE) {
            //echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();
    }
}
?>
