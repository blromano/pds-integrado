<?php

namespace App\DAO;

use App\DAO;
use App\Model\EspecialidadesMedicosModel;
use App\Model\UsuariosModel;
use App\DAO\UsuarioDao;
use FW\Controller;
    
    class EspecialidadesMedicosDAO extends DAO{


        //Método para adicionar um especialidadeMedico na tabelam especialidades_medicos
        public function adicionarEspecialidadeMedico($especialidadeMedico) {

            $usu = $especialidadeMedico->getFK_USUARIOS_USU_ID();
            $esp = $especialidadeMedico->getFK_ESPECIALIDADES_ESP_ID();
            $med = $especialidadeMedico->getFK_MEDICOS_MED_ID(); 
            
            $this->sql = "INSERT INTO $this->tabela (

                    FK_USUARIOS_USU_ID, 
                    FK_ESPECIALIDADES_ESP_ID,
                    FK_MEDICOS_MED_ID 
                                        
            ) VALUES (
                :fk_usuarios_usu_id,
                :fk_especialidades_esp_id,
                :fk_medicos_med_id
            )";
            $this->resultado = $this->conexao->prepare($this->sql);

            

            $this->resultado->bindParam(':fk_usuarios_usu_id', $usu);
            $this->resultado->bindParam(':fk_especialidades_esp_id', $esp);
            $this->resultado->bindParam(':fk_medicos_med_id', $med);
        
            $this->resultado->execute();

        }

        //Listando todos os dados da tabela especialidades_medicos em ordem crescente de EPM_ID
        public function listarMedico($id){
            try {
                $especialidades_medicos = array();
                $sql = "SELECT 
                epm.EPM_ID, 
                epm.FK_ESPECIALIDADES_ESP_ID, 
                epm.FK_MEDICOS_MED_ID, 
                usu.USU_ID,
                usu.USU_NOME, 
                usu.USU_NUMERO_CELULAR, 
                usu.USU_NUMERO_RESIDENCIA,
                esp.ESP_NOME, 
                esp.ESP_ID,
                med.MED_FORMACAO,
                med.MED_ID,
                med.MED_EMAIL_PROFISSIONAL, 
                med.MED_TELEFONE_PROFISSIONAL 

                FROM especialidades_medicos as epm 
                INNER JOIN medicos as med on (med.MED_ID = epm.FK_MEDICOS_MED_ID)
                INNER JOIN usuarios as usu on (usu.USU_ID = med.FK_USUARIOS_USU_ID)
                INNER JOIN especialidades as esp on (esp.ESP_ID  = epm.FK_ESPECIALIDADES_ESP_ID)
                WHERE epm.FK_ESPECIALIDADES_ESP_ID =:id";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":id", $id);

                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $especialidadeMedico = new EspecialidadesMedicosModel();     
                    $especialidadeMedico->__set('EPM_ID', $row['EPM_ID']);                                          //especialidades_medicos
                    $especialidadeMedico->__set('FK_ESPECIALIDADES_ESP_ID', $row['FK_ESPECIALIDADES_ESP_ID']);      //especialidades_medicos
                    $especialidadeMedico->__set('FK_MEDICOS_MED_ID', $row['FK_MEDICOS_MED_ID']);                    //especialidades_medicos
                    $especialidadeMedico->__set('USU_NOME', $row['USU_NOME']);                                      //usuarios
                    $especialidadeMedico->__set('USU_NUMERO_CELULAR', $row['USU_NUMERO_CELULAR']);                  //usuarios (Whatsapp)
                    $especialidadeMedico->__set('USU_NUMERO_RESIDENCIA', $row['USU_NUMERO_RESIDENCIA']);            //usuarios
                    $especialidadeMedico->__set('ESP_NOME', $row['ESP_NOME']);
                    $especialidadeMedico->__set('MED_FORMACAO', $row['MED_FORMACAO']);                                                                            //especialidades
                    $especialidadeMedico->__set('MED_EMAIL_PROFISSIONAL', $row['MED_EMAIL_PROFISSIONAL']);          //medicos
                    $especialidadeMedico->__set('MED_TELEFONE_PROFISSIONAL', $row['MED_TELEFONE_PROFISSIONAL']);    //medicos

                    array_push($especialidades_medicos, $especialidadeMedico); //Inserindo os dados persistidos da tabela em um array
                }

                return $especialidades_medicos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function listar(){
            try {
                $especialidades_medicos = array();
                $sql = "SELECT 
                epm.EPM_ID, 
                epm.FK_ESPECIALIDADES_ESP_ID, 
                epm.FK_MEDICOS_MED_ID, 
                usu.USU_ID,
                usu.USU_NOME, 
                usu.USU_NUMERO_CELULAR, 
                usu.USU_NUMERO_RESIDENCIA,
                esp.ESP_NOME, 
                esp.ESP_ID,
                med.MED_FORMACAO,
                med.MED_ID,
                med.MED_EMAIL_PROFISSIONAL, 
                med.MED_TELEFONE_PROFISSIONAL 

                FROM especialidades_medicos as epm 
                INNER JOIN medicos as med on (med.MED_ID = epm.FK_MEDICOS_MED_ID)
                INNER JOIN usuarios as usu on (usu.USU_ID = med.FK_USUARIOS_USU_ID)
                INNER JOIN especialidades as esp on (esp.ESP_ID  = epm.FK_ESPECIALIDADES_ESP_ID)
                WHERE epm.FK_ESPECIALIDADES_ESP_ID =:id";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":id", $id);

                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $especialidadeMedico = new EspecialidadesMedicosModel();     
                    $especialidadeMedico->__set('EPM_ID', $row['EPM_ID']);                                          //especialidades_medicos
                    $especialidadeMedico->__set('FK_ESPECIALIDADES_ESP_ID', $row['FK_ESPECIALIDADES_ESP_ID']);      //especialidades_medicos
                    $especialidadeMedico->__set('FK_MEDICOS_MED_ID', $row['FK_MEDICOS_MED_ID']);                    //especialidades_medicos
                    $especialidadeMedico->__set('USU_NOME', $row['USU_NOME']);                                      //usuarios
                    $especialidadeMedico->__set('USU_NUMERO_CELULAR', $row['USU_NUMERO_CELULAR']);                  //usuarios (Whatsapp)
                    $especialidadeMedico->__set('USU_NUMERO_RESIDENCIA', $row['USU_NUMERO_RESIDENCIA']);            //usuarios
                    $especialidadeMedico->__set('ESP_NOME', $row['ESP_NOME']);
                    $especialidadeMedico->__set('MED_FORMACAO', $row['MED_FORMACAO']);                                                                            //especialidades
                    $especialidadeMedico->__set('MED_EMAIL_PROFISSIONAL', $row['MED_EMAIL_PROFISSIONAL']);          //medicos
                    $especialidadeMedico->__set('MED_TELEFONE_PROFISSIONAL', $row['MED_TELEFONE_PROFISSIONAL']);    //medicos

                    array_push($especialidades_medicos, $especialidadeMedico); //Inserindo os dados persistidos da tabela em um array
                }

                return $especialidades_medicos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }


        //Método de alteração de um especialidadeMedico (este método recebe o Objeto $especialidadeMedico vindo do Método Atualizar (linha 93) do controler)
        public function alterar($EspecialidadesMedico){
            try {
                $sql = "UPDATE especialidades_medicos SET 
                FK_ESPECIALIDADES_ESP_ID=:especialidades
                WHERE EPM_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $EspecialidadesMedico->__get('EPM_ID'));
                $stmt->bindParam(':especialidades', $EspecialidadesMedico->__get('FK_ESPECIALIDADES_ESP_ID'));


                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        //Método para excluir um especialidadeMedico (recebe o $id do especialidadeMedico a ser excluído)
        public function excluir($id)
        {
            try {
                $sql = "delete from especialidades_medicos where EPM_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        //Método para inserir um novo especialidadeMedico (recebe um Objeto como parâmetro)
        public function inserir($EspecialidadesMedico){
            try {

                $sql = "insert into especialidades_medicos 
                (
                FK_ESPECIALIDADES_ESP_ID, 
                FK_MEDICOS_MED_ID
                ) values (
                :especialidades,
                :medicos)";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':especialidades',  $EspecialidadesMedico->__get('FK_ESPECIALIDADES_ESP_ID'));
                $stmt->bindParam(':medicos', $EspecialidadesMedico->__get('FK_MEDICOS_MED_ID'));
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

      
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM especialidades_medicos WHERE EPM_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $especialidadeMedico = new EspecialidadesMedicosModel();
                    $especialidadeMedico->__set('EPM_ID', $result['EPM_ID']);
                    $especialidadeMedico->__set('FK_ESPECIALIDADES_ESP_ID', $result['FK_ESPECIALIDADES_ESP_ID']);
                    $especialidadeMedico->__set('FK_MEDICOS_MED_ID', $result['FK_MEDICOS_MED_ID']); //retorna todos os campos relacionados ao ID selecionado
                    

                    return $especialidadeMedico;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }


       
        
    }