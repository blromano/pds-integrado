<?php

namespace App\DAO;

use App\DAO;
use App\Model\EnfermeirosModel;
use App\Model\UsuariosModel;
use App\DAO\UsuarioDAO;
use FW\Controller;
    
    class EnfermeiroDAO extends DAO{


        //Método para adicionar um enfermeiro na tabelam enfermeiros
        public function adicionarEnfermiero($enfermeiro) {

            $email = $enfermeiro->getENF_EMAIL_PROFISSIONAL();
            $pront = $enfermeiro->getENF_PRONTUARIO();
            $coren = $enfermeiro->getENF_COREN();
            $telp = $enfermeiro->getENF_TELEFONE_PROFISSIONAL();
            $usu = $enfermeiro->getFK_USUARIO_USU_ID();
            
            $this->sql = "INSERT INTO $this->tabela (

                ENF_EMAIL_PROFISSIONAL, 
                ENF_PRONTUARIO,
                ENF_COREN,
                ENF_TELEFONE_PROFISSIONAL,
                FK_USUARIO_USU_ID

                                        
            ) VALUES (
                :enf_email_profissional,
                :enf_prontuario,
                :enf_coren,
                :enf_telefone_profissional,
                :fk_usuario_usu_id

            )";
            $this->resultado = $this->conexao->prepare($this->sql);

            

            $this->resultado->bindParam('enf_email_profissional', $email);
            $this->resultado->bindParam(':enf_prontuario', $pront);
            $this->resultado->bindParam(':enf_coren', $coren);
            $this->resultado->bindParam(':enf_telefone_profissional', $telp);
            $this->resultado->bindParam(':fk_usuario_usu_id', $usu);

        
            $this->resultado->execute();

        }

        //Listando todos os dados da tabela enfermeiros em ordem crescente de PAC_ID
        public function listar(){
            try {
                $enfermeiros = array();
                $sql = "SELECT * FROM enfermeiros ORDER BY ENF_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $enfermeiro = new EnfermeirosModel();
                    $enfermeiro->__set('ENF_ID', $row['ENF_ID']);
                    $enfermeiro->__set('ENF_EMAIL_PROFISSIONAL', $row['ENF_EMAIL_PROFISSIONAL']);
                    $enfermeiro->__set('ENF_PRONTUARIO', $row['ENF_PRONTUARIO']);
                    $enfermeiro->__set('ENF_COREN', $row['ENF_COREN']);
                    $enfermeiro->__set('ENF_TELEFONE_PROFISSIONAL', $row['ENF_TELEFONE_PROFISSIONAL']);
                    $enfermeiro->__set('FK_USUARIO_USU_ID', $row['FK_USUARIO_USU_ID']);

                    array_push($enfermeiros, $enfermeiro); //Inserindo os dados persistidos da tabela em um array
                }

                return $enfermeiros; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        //Método de alteração de um enfermeiro (este método recebe o Objeto $enfermeiro vindo do Método Atualizar (linha 93) do enfermeiroController)
        public function alterar($enfermeiro){
            try {
                $usuario = new UsuariosModel();
                
                $usuario->__set('USU_CPF', $_POST['USU_CPF']);
                $usuario->__set('USU_RG', $_POST['USU_RG']);
                $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
                $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
                $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);
                $usuario->__set('USU_TELEFONE', $_POST['USU_TELEFONE']);
                $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
                $usuario->__set('USU_NOME', $_POST['USU_NOME']);
                $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
                $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
                $usuario->__set('USU_CEP', $_POST['USU_CEP']);
                $usuario->__set('USU_COMPLEMENTO', $_POST['USU_COMPLEMENTO']);
                $usuario->__set('USU_FOTO', $_POST['USU_FOTO']);
                $usuario->__set('USU_NOME_SOCIAL', $_POST['USU_NOME_SOCIAL']);

                $usuarioDAO = new UsuarioDAO();
                $usuarioDAO->inserir($usuario);
                $usuarioDAO->db->lastInsertId();

                $sql = "UPDATE enfermeiros SET ENF_PRONTUARIO=:prontuario, ENF_COREN=:coren, ENF_TELEFONE_PROFISSIONAL=:planos FK_USUARIO_USU_ID=:usuarios WHERE ENF_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $enfermeiro->__get('ENF_ID'));
                $stmt->bindParam(':email', $enfermeiro->__get('ENF_EMAIL_PROFISSIONAL'));
                $stmt->bindParam(':prontuario', $enfermeiro->__get('ENF_PRONTUARIO'));
                $stmt->bindParam(':coren', $enfermeiro->__get('ENF_COREN'));            
                $stmt->bindParam(':telefone', $enfermeiro->__get('ENF_TELEFONE_PROFISSIONAL'));
                $stmt->bindParam(':usuario', $enfermeiro->__get('FK_USUARIO_USU_ID'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        //Método para excluir um enfermeiro (recebe o $id do enfermeiro a ser excluído)
        public function excluir($id)
        {
            try {
                $sql = "delete from enfermeiros where ENF_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        //Método para inserir um novo enfermeiro (recebe um Objeto como parâmetro)
        public function inserir($enfermeiro){
            try {
                $usuario = new UsuariosModel();
                
                $usuario->__set('USU_CPF', $_POST['USU_CPF']);
                $usuario->__set('USU_RG', $_POST['USU_RG']);
                $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
                $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
                $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);
                $usuario->__set('USU_TELEFONE', $_POST['USU_TELEFONE']);
                $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
                $usuario->__set('USU_NOME', $_POST['USU_NOME']);
                $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
                $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
                $usuario->__set('USU_CEP', $_POST['USU_CEP']);
                $usuario->__set('USU_COMPLEMENTO', $_POST['USU_COMPLEMENTO']);
                $usuario->__set('USU_FOTO', $_POST['USU_FOTO']);
                $usuario->__set('USU_NOME_SOCIAL', $_POST['USU_NOME_SOCIAL']);

                $usuarioDAO = new UsuarioDAO();
                $usuarioDAO->inserir($usuario);
                $usuarioDAO->db->lastInsertId();



                $sql = "insert into enfermeiros (ENF_PRONTUARIO, ENF_COREN, ENF_TELEFONE_PROFISSIONAL, ENF_EMAIL_PROFISSIONAL, FK_USUARIO_USU_ID) values (:prontuario, :coren, :telefone, :usuarios)";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':prontuario',  $enfermeiro->__get('ENF_PRONTUARIO'));
                $stmt->bindParam(':coren', $enfermeiro->__get('ENF_COREN'));
                $stmt->bindParam(':telefone', $enfermeiro->__get('ENF_TELEFONE_PROFISSIONAL'));
                $stmt->bindParam(':email', $enfermeiro->__get('ENF_EMAIL_PROFISSIONAL'));
                $stmt->bindParam(':usuarios', $enfermeiro->__get('FK_USUARIO_USU_ID'));
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM enfermeiros  WHERE PAC_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $enfermeiro = new EnfermeirosModel();
                    $enfermeiro->__set('PAC_ID', $result['PAC_ID']);
                    $enfermeiro->__set('PAC_PRONTUARIO', $result['PAC_PRONTUARIO']);
                    $enfermeiro->__set('FK_USUARIOS_USU_ID', $result['FK_USUARIOS_USU_ID']);
                    $enfermeiro->__set('FK_PLANOS_PLA_ID', $result['FK_PLANOS_PLA_ID']); //retorna todos os campos relacionados ao ID selecionado
                    

                    return $enfermeiro;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }