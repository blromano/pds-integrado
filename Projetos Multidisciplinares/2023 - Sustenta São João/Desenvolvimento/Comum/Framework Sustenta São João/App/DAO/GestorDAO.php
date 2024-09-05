<?php

namespace App\DAO;

    use App\DAO;
    use App\Model\GestorModel;

        class GestorDAO extends DAO {

            public function inserir($gestor){

                $prontuario = $gestor->__get("GES_PRONTUARIO"); 
                $ramal = $gestor->__get("GES_RAMAL"); 
                $cpf = $gestor->__get("USU_CPF"); 
                $rg = $gestor->__get("USU_RG");  
                $data_nascimento = $gestor->__get("USU_DATA_NASCIMENTO"); 
                $email = $gestor->__get("USU_EMAIL");
                $senha = $gestor->__get("USU_SENHA");
                $senha = MD5($senha);
                $celular = $gestor->__get("USU_CELULAR"); 
                $estado = $gestor->__get("USU_ESTADO"); 
                $cidade = $gestor->__get("USU_CIDADE"); 
                $rua = $gestor->__get("USU_RUA"); 
                $numero_residencia = $gestor->__get("USU_NUMERO_RESIDENCIA"); 
                $bairro = $gestor->__get("USU_BAIRRO"); 
                $cep = $gestor->__get("USU_CEP"); 
                $sexo = $gestor->__get("USU_SEXO"); 
                $foto_perfil = $gestor->__get("USU_FOTO_PERFIL"); 
                $nome = $gestor->__get("USU_NOME");
                $setores_set_id = $gestor->__get("FK_SETORES_SET_ID"); 


                $sql = "INSERT INTO GESTORES(            
                                                GES_PRONTUARIO, 
                                                GES_RAMAL,
                                                USU_CPF,
                                                USU_RG, 
                                                USU_DATA_NASCIMENTO, 
                                                USU_EMAIL, 
                                                USU_SENHA, 
                                                USU_CELULAR, 
                                                USU_ESTADO, 
                                                USU_CIDADE, 
                                                USU_RUA, 
                                                USU_NUMERO_RESIDENCIA, 
                                                USU_BAIRRO, 
                                                USU_CEP, 
                                                USU_SEXO, 
                                                USU_FOTO_PERFIL,
                                                USU_NOME,
                                                FK_SETORES_SET_ID

                                                ) VALUES (
                                                                                    
                                                :ges_GES_PRONTUARIO, 
                                                :ges_GES_RAMAL,
                                                :ges_USU_CPF,
                                                :ges_USU_RG, 
                                                :ges_USU_DATA_NASCIMENTO, 
                                                :ges_USU_EMAIL, 
                                                :ges_USU_SENHA, 
                                                :ges_USU_CELULAR, 
                                                :ges_USU_ESTADO, 
                                                :ges_USU_CIDADE, 
                                                :ges_USU_RUA, 
                                                :ges_USU_NUMERO_RESIDENCIA, 
                                                :ges_USU_BAIRRO, 
                                                :ges_USU_CEP, 
                                                :ges_USU_SEXO, 
                                                :ges_USU_FOTO_PERFIL,
                                                :ges_USU_NOME,
                                                :ges_FK_SETORES_SET_ID
                )";


                $stmt = $this->getConn()->prepare($sql);
                

                $stmt->bindParam(':ges_GES_PRONTUARIO', $prontuario); 
                $stmt->bindParam(':ges_GES_RAMAL', $ramal);
                $stmt->bindParam(':ges_USU_CPF',$cpf);
                $stmt->bindParam(':ges_USU_RG', $rg); 
                $stmt->bindParam(':ges_USU_DATA_NASCIMENTO', $data_nascimento); 
                $stmt->bindParam(':ges_USU_EMAIL', $email); 
                $stmt->bindParam(':ges_USU_SENHA', $senha); 
                $stmt->bindParam(':ges_USU_CELULAR', $celular); 
                $stmt->bindParam(':ges_USU_ESTADO', $estado); 
                $stmt->bindParam(':ges_USU_CIDADE', $cidade); 
                $stmt->bindParam(':ges_USU_RUA', $rua); 
                $stmt->bindParam(':ges_USU_NUMERO_RESIDENCIA', $numero_residencia); 
                $stmt->bindParam(':ges_USU_BAIRRO', $bairro); 
                $stmt->bindParam(':ges_USU_CEP', $cep); 
                $stmt->bindParam(':ges_USU_SEXO', $sexo); 
                $stmt->bindParam(':ges_USU_FOTO_PERFIL', $foto_perfil); 
                $stmt->bindParam(':ges_USU_NOME', $nome);
                $stmt->bindParam(':ges_FK_SETORES_SET_ID', $setores_set_id);

     
                $stmt->execute();                   

            }


            public function alterar($gestor){
                try {
                    $sql = "UPDATE GESTORES SET USU_EMAIL=:email, USU_CELULAR=:celular, USU_ESTADO=:estado, USU_CIDADE=:cidade, 
                    USU_RUA=:rua, USU_NUMERO_RESIDENCIA=:numero_residencia, USU_BAIRRO=:bairro,
                    USU_CEP=:cep, USU_FOTO_PERFIL=:foto_perfil WHERE USU_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(':id', $gestor->__get('USU_ID'));
                    $stmt->bindParam(':email', $gestor->__get('USU_EMAIL'));
                    $stmt->bindParam(':celular', $gestor->__get('USU_CELULAR'));
                    $stmt->bindParam(':estado', $gestor->__get('USU_ESTADO'));            
                    $stmt->bindParam(':cidade', $gestor->__get('USU_CIDADE'));
                    $stmt->bindParam(':rua', $gestor->__get('USU_RUA'));
                    $stmt->bindParam(':numero_residencia', $gestor->__get('USU_NUMERO_RESIDENCIA'));
                    $stmt->bindParam(':bairro', $gestor->__get('USU_BAIRRO'));            
                    $stmt->bindParam(':cep', $gestor->__get('USU_CEP'));
                    /*$stmt->bindParam(':sexo', $gestor->__get('USU_SEXO'));*/
                    $stmt->bindParam(':foto_perfil', $gestor->__get('USU_FOTO_PERFIL'));


                    $stmt->execute();
                } catch (\PDOException $ex) {
                    header('Location: /error101');
                    die();
                }
            }



            public function excluir($id){
                try {
                    $sql = "delete from gestores where USU_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);
                    
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                } catch (\PDOException $ex) {
                    header('Location: /error102');
                    die();
                }
            }

            public function buscarPorID($id){
                try {
                    $sql = "SELECT * FROM GESTORES WHERE USU_ID=:id";

                    $stmt = $this->getConn()->prepare($sql);

                    $stmt->bindParam(":id", $id);
                    $stmt->execute();

                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                    if ($result > 0) {
                        $gestor = new GestorModel();
                        $gestor->__set('GES_PRONTUARIO', $result['GES_PRONTUARIO']);
                        $gestor->__set('GES_RAMAL', $result['GES_RAMAL']);
                        $gestor->__set('USU_ID', $result['USU_ID']);
                        $gestor->__set('USU_CPF', $result['USU_CPF']);
                        $gestor->__set('USU_RG', $result['USU_RG']);
                        $gestor->__set('USU_DATA_NASCIMENTO', $result['USU_DATA_NASCIMENTO']);
                        $gestor->__set('USU_EMAIL', $result['USU_EMAIL']);
                        $gestor->__set('USU_SENHA', $result['USU_SENHA']);
                        $gestor->__set('USU_CELULAR', $result['USU_CELULAR']);
                        $gestor->__set('USU_ESTADO', $result['USU_ESTADO']);
                        $gestor->__set('USU_CIDADE', $result['USU_CIDADE']);
                        $gestor->__set('USU_RUA', $result['USU_RUA']);
                        $gestor->__set('USU_NUMERO_RESIDENCIA', $result['USU_NUMERO_RESIDENCIA']);
                        $gestor->__set('USU_BAIRRO', $result['USU_BAIRRO']);
                        $gestor->__set('USU_CEP', $result['USU_CEP']);
                        $gestor->__set('USU_SEXO', $result['USU_SEXO']);
                        $gestor->__set('USU_FOTO_PERFIL', $result['USU_FOTO_PERFIL']);
                        $gestor->__set('FK_SETORES_SET_ID', $result['FK_SETORES_SET_ID']); //retorna todos os campos relacionados ao ID selecionado
                        

                        return $gestor;
                    } else {
                        return null;
                    }
                } catch (\PDOException $ex) {
                    header('Location: /error103');
                    die();
                }
            }

            public function listar(){
                try {
                    $gestores = array();
                    $sql = "SELECT * FROM GESTORES ORDER BY USU_ID ASC";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->execute();

                    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($results as $row) {
                        $gestor = new GestorModel();
                        $gestor->__set('GES_PRONTUARIO', $row['GES_PRONTUARIO']);
                        /*$gestor->__set('GES_RAMAL', $row['GES_RAMAL']);*/
                        $gestor->__set('USU_ID', $row['USU_ID']);
                        $gestor->__set('USU_CPF', $row['USU_CPF']);
                        $gestor->__set('USU_RG', $row['USU_RG']);
                        $gestor->__set('USU_DATA_NASCIMENTO', $row['USU_DATA_NASCIMENTO']);
                        $gestor->__set('USU_EMAIL', $row['USU_EMAIL']);
                        $gestor->__set('USU_SENHA', $row['USU_SENHA']);
                        $gestor->__set('USU_CELULAR', $row['USU_CELULAR']);
                        $gestor->__set('USU_ESTADO', $row['USU_ESTADO']);
                        $gestor->__set('USU_CIDADE', $row['USU_CIDADE']);
                        $gestor->__set('USU_RUA', $row['USU_RUA']);
                        $gestor->__set('USU_NUMERO_RESIDENCIA', $row['USU_NUMERO_RESIDENCIA']);
                        $gestor->__set('USU_BAIRRO', $row['USU_BAIRRO']);
                        $gestor->__set('USU_CEP', $row['USU_CEP']);
                        $gestor->__set('USU_SEXO', $row['USU_SEXO']);
                        $gestor->__set('USU_FOTO_PERFIL', $row['USU_FOTO_PERFIL']);
                        $gestor->__set('FK_SETORES_SET_ID', $row['FK_SETORES_SET_ID']);
                        $gestor->__set('USU_NOME', $row['USU_NOME']);



                        array_push($gestores, $gestor); //Inserindo os dados persistidos da tabela em um array
                    }

                    return $gestores; //retornando o array para mostagem da view
                } catch (\PDOException $ex) {
                    header('Location: /error103');
                    die();
                }
            }

            //Will 24/10 - Inicio
            public function listarGestoresComSetores() {
                try {
                    $gestoresComSetores = array();
                    $sql = "SELECT g.USU_ID, g.USU_NOME, s.SET_NOME 
                            FROM gestores g
                            INNER JOIN setores s ON g.FK_SETORES_SET_ID = s.SET_ID
                            ORDER BY g.USU_ID ASC";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->execute();

                    $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    foreach ($results as $row) {
                        $gestorComSetor = array(
                            'USU_ID' => $row['USU_ID'],
                            'USU_NOME' => $row['USU_NOME'],
                            'SET_NOME' => $row['SET_NOME']
                        );
                        array_push($gestoresComSetores, $gestorComSetor);
                    }

                    return $gestoresComSetores;
                } catch (\PDOException $ex) {
                    header('Location: /error103');
                    die();
            }
        }

        public function inserirResponsavel($novoGestor) {
            $nome = $novoGestor->__get("USU_NOME");
            $idSetor = $novoGestor->__get("FK_SETORES_SET_ID");
        
            // SQL para inserção na tabela gestores
            $sqlGestor = "INSERT INTO gestores(USU_NOME, FK_SETORES_SET_ID) VALUES (:usu_nome, :fk_setores_set_id)";
            
            // Prepara a declaração SQL para a tabela gestores
            $stmtGestor = $this->getConn()->prepare($sqlGestor);
            
            // Associa os parâmetros
            $stmtGestor->bindParam(':usu_nome', $nome);
            $stmtGestor->bindParam(':fk_setores_set_id', $idSetor);
        
            // Executa a inserção na tabela gestores
            $stmtGestor->execute();
        }


        public function excluirResponsavel($identificador) {
            try {
                $sql = "DELETE FROM gestores WHERE USU_ID=:identificador";
        
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":identificador", $identificador);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102'); // Redirecionamento em caso de erro
                die();
            }
        }

      
        
    
    }
      