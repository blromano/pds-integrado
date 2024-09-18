<?php

namespace App\DAO;

use App\DAO;
use App\Model\MedicoModel;
use App\Model\UsuariosModel;
use App\DAO\UsuarioDAO;
    
    class MedicoDAO extends DAO{


        //Método para adicionar um Paciente na tabelam pacientes
        // public function adicionarMedico($medico) {

        //     $crm = $medico->getMED_CRM();
        //     $telep = $medico->getMED_TELEFONE_PROFISSIONAL();
        //     $emailp = $medico->getMED_EMAIL_PROFISSIONAL();
        //     $pront = $medico->getMED_PRONTUARIO();
        //     $valconsul = $medico->getMED_VALOR_CONSULTA();
        //     $obs = $medico->getMED_OBSERVACAO();
        //     $formacao = $medico->getMED_FORMACAO();
        //     $usu = $medico->getFK_USUARIOS_USU_ID();
            
        //     $this->sql = "INSERT INTO $this->tabela (

        //             MED_CRM, 
        //             MED_TELEFONE_PROFISSIONAL,
        //             MED_EMAIL_PROFISSIONAL,
        //             MED_PRONTUARIO ,
        //             MED_VALOR_CONSULTA,
        //             MED_OBSERVACAO,
        //             MED_FORMACAO,
        //             FK_USUARIOS_USU_ID
                                        
        //     ) VALUES (

        //             :med_crm,
        //             :med_telefone_profissional,
        //             :med_email_profissional,
        //             :med_prontuario,
        //             :med_valor_consulta,
        //             :med_observacao,
        //             :med_formacao,
        //             :fk_usuarios_usu_id

        //     )";
        //     $this->resultado = $this->conexao->prepare($this->sql);

            

        //     $this->resultado->bindParam(':med_crm', $crm);
        //     $this->resultado->bindParam(':med_telefone_profissional', $telep);
        //     $this->resultado->bindParam(':med_email_profissional' , $emailp);
        //     $this->resultado->bindParam(':med_prontuario', $pront);
        //     $this->resultado->bindParam(':med_valor_consulta', $valconsul);
        //     $this->resultado->bindParam(':med_observacao', $obs);
        //     $this->resultado->bindParam(':med_formacao', $formacao);
        //     $this->resultado->bindParam(':fk_usuarios_usu_id', $usu);
        
        //     $this->resultado->execute();

        // }

        //Listando todos os dados da tabela medicos em ordem crescente de PAC_ID
        public function listar(){
            try {
                // $usuario = new UsuariosModel();

                // $usuario->__set('USU_CPF', $_POST['USU_CPF']);
                // $usuario->__set('USU_RG', $_POST['USU_RG']);
                // $usuario->__set('USU_EMAIL', $_POST['USU_EMAIL']);
                // $usuario->__set('USU_SENHA', $_POST['USU_SENHA']);
                // $usuario->__set('USU_NUMERO_CELULAR', $_POST['USU_NUMERO_CELULAR']);
                // $usuario->__set('USU_TELEFONE', $_POST['USU_TELEFONE']);
                // $usuario->__set('USU_DATA_DE_NASCIMENTO', $_POST['USU_DATA_DE_NASCIMENTO']);
                // $usuario->__set('USU_NOME', $_POST['USU_NOME']);
                // $usuario->__set('USU_NUMERO_RESIDENCIA', $_POST['USU_NUMERO_RESIDENCIA']);
                // $usuario->__set('USU_SEXO', $_POST['USU_SEXO']);
                // $usuario->__set('USU_CEP', $_POST['USU_CEP']);
                // $usuario->__set('USU_COMPLEMENTO', $_POST['USU_COMPLEMENTO']);
                // $usuario->__set('USU_FOTO', $_POST['USU_FOTO']);
                // $usuario->__set('USU_NOME_SOCIAL', $_POST['USU_NOME_SOCIAL']);

                // $usuarioDAO = new UsuarioDAO();
                // $usuarioDAO->inserir($usuario);
                // $usuarioDAO->db->lastInsertID();

                $medicos = array();
                $sql = "SELECT * FROM medicos ORDER BY MED_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $medico = new MedicoModel();
                    $medico->__set('MED_ID', $row['MED_ID']);
                    $medico->__set('MED_CRM', $row['MED_CRM']);
                    $medico->__set('MED_TELEFONE_PROFISSIONAL', $row['MED_TELEFONE_PROFISSIONAL']);
                    $medico->__set('MED_EMAIL_PROFISSIONAL', $row['MED_EMAIL_PROFISSIONAL']);
                    $medico->__set('MED_PRONTUARIO', $row['MED_PRONTUARIO']);
                    $medico->__set('MED_VALOR_CONSULTA', $row['MED_VALOR_CONSULTA']);
                    $medico->__set('MED_OBSERVACAO', $row['MED_OBSERVACAO']);
                    $medico->__set('MED_FORMACAO', $row['MED_FORMACAO']);
                    $medico->__set('FK_USUARIOS_USU_ID', $row['FK_USUARIOS_USU_ID']);

                    array_push($medicos, $medico); //Inserindo os dados persistidos da tabela em um array
                }

                return $medicos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($medico){
            try {
                $sql = "UPDATE medicos SET MED_CRM=:crm, MED_TELEFONE_PROFISSIONAL=:telefone_profissional, MED_EMAIL_PROFISSIONAL=:email_profissional, MED_PRONTUARIO=:prontuario, MED_VALOR_CONSULTA=:valor_consulta, MED_OBSERVACAO=:observacao, MED_FORMACAO=:formacao, FK_USUARIOS_USU_ID=:usuario WHERE MED_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $medico->__get('MED_ID'));
                $stmt->bindParam(':crm', $medico->__get('MED_CRM'));
                $stmt->bindParam(':telefone_profissional', $medico->__get('MED_TELEFONE_PROFISSIONAL'));
                $stmt->bindParam(':email_profissional', $medico->__get('MED_EMAIL_PROFISSIONAL'));
                $stmt->bindParam(':prontuario', $medico->__get('MED_PRONTUARIO'));
                $stmt->bindParam(':valor_consulta', $medico->__get('MED_VALOR_CONSULTA'));
                $stmt->bindParam(':observacao', $medico->__get('MED_OBSERVACAO'));
                $stmt->bindParam(':formacao', $medico->__get('MED_FORMACAO'));
                $stmt->bindParam(':usuario', $medico->__get('FK_USUARIOS_USU_ID'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        //Método para excluir um paciente (recebe o $id do Paciente a ser excluído)
        public function excluir($id)
        {
            try {
                $sql = "delete from medicos where MED_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($medico){
            try {
                $sql = "INSERT INTO medicos 
                    ( 	
                        FK_USUARIOS_USU_ID,
                        MED_CRM,
                        MED_TELEFONE_PROFISSIONAL, 
                        MED_EMAIL_PROFISSIONAL, 
                        MED_PRONTUARIO,
                        MED_FORMACAO
                    ) values (
                        :usu_id,
                        :crm, 
                        :telefone_profissional, 
                        :email_profissional
                        :prontuario, 
                        :formacao
                    )";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam('usu_id',  $medico->__get('FK_USUARIOS_USU_ID'));
                $stmt->bindParam(':crm',  $medico->__get('MED_CRM'));
                $stmt->bindParam(':telefone_profissional', $medico->__get('MED_TELEFONE_PROFISSIONAL'));
                $stmt->bindParam(':email_profissional', $medico->__get('MED_EMAIL_PROFISSIONAL'));
                //$stmt->bindParam(':valor_consulta', $medico->__get('MED_VALOR_CONSULTA'));
                //$stmt->bindParam(':observacoes', $medico->__get('MED_OBSERVACOES'));
                $stmt->bindParam(':formacao', $medico->__get('MED_FORMACAO'));
                $stmt->bindParam(':prontuario', $medico->__get('MED_PRONTUARIO'));

                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM medicos WHERE MED_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $medico = new MedicoModel;
                    $medico->__set('MED_ID', $result['MED_ID']);
                    $medico->__set('MED_CRM', $result['MED_CRM']);
                    $medico->__set('MED_TELEFONE_PROFISSIONAL', $result['MED_TELEFONE_PROFISSIONAL']);
                    $medico->__set('MED_EMAIL_PROFISSIONAL', $result['MED_EMAIL_PROFISSIONAL']);
                    $medico->__set('MED_PRONTUARIO', $result['MED_PRONTUARIO']);
                    $medico->__set('MED_VALOR_CONSULTA', $result['MED_VALOR_CONSULTA']);
                    $medico->__set('MED_OBSERVACAO', $result['MED_OBSERVACAO']);
                    $medico->__set('MED_FORMACAO', $result['MED_FORMACAO']);
                    $medico->__set('FK_USUARIOS_USU_ID', $result['FK_USUARIOS_USU_ID']);
                    

                    return $medico;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }