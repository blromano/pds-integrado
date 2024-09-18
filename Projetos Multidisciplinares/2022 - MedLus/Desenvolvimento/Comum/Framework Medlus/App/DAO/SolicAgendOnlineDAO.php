<?php

namespace App\DAO;

use App\DAO;
use App\Model\SolicAgendOnlineModel;
use App\DAO\UsuarioDAO;
use App\Model\UsuariosModel;

    
    class SolicAgendOnlineDAO extends DAO{

        //Listando todos os dados da tabela solicitacoes em ordem crescente de SOL_ID
        public function listar(){
            try {
                $solicitacoes = array();
                $sql = "SELECT 
                    u.USU_NOME,
                    s.SOL_ID,
                    s.SOL_DATA,
                    s.SOL_HORARIO,
                    e.ESP_NOME, 
                    s.SOL_STATUS
                    
                    FROM 
                    solicitacao_agend_con_online s,
                    pacientes p,
                    usuarios u,
                    especialidades e
                    
                    WHERE 
                    p.PAC_ID = s.FK_PACIENTES_PAC_ID AND
                    u.USU_ID = p.FK_USUARIOS_USU_ID AND
                    e.ESP_ID = s.FK_ESPECIALIDADES_ESP_ID
                    
                ORDER BY s.SOL_ID;";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $solicitacao = new SolicAgendOnlineModel();
                    $solicitacao->__set('SOL_HORARIO', $row['SOL_HORARIO']);
                    $solicitacao->__set('SOL_DATA', $row['SOL_DATA']);
                    $solicitacao->__set('SOL_ID', $row['SOL_ID']);
                    $solicitacao->__set('USU_NOME', $row['USU_NOME']);
                    $solicitacao->__set('ESP_NOME', $row['ESP_NOME']);
                    $solicitacao->__set('SOL_STATUS', $row['SOL_STATUS']);

                    array_push($solicitacoes, $solicitacao); //Inserindo os dados persistidos da tabela em um array
                }
                
                

                return $solicitacoes; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        public function listarEsp(){
            try {
                $res = array();
                $sql = "SELECT * FROM especialidades ORDER BY ESP_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $solicitacao = new SolicAgendOnlineModel();
                    $solicitacao->__set('ESP_ID', $row['ESP_ID']);
                    $solicitacao->__set('ESP_NOME', $row['ESP_NOME']);

                    array_push($res, $solicitacao); //Inserindo os dados persistidos da tabela em um array
                }

                return $res; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        //Método de alteração de uma solicitacao (este método recebe o Objeto $solicitacao vindo do Método Atualizar (linha 93) do SolicAgendOnlineController)
        public function alterar($solicitacao){
            try {
                $sql = "UPDATE solicitacao_agend_con_online SET 
                            SOL_HORARIO=:sol_horario, 
                            SOL_DATA=:sol_data
                        WHERE SOL_ID=:sol_id";
               
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':sol_id', $solicitacao->__get('SOL_ID'));
                $stmt->bindParam(':sol_horario', $solicitacao->__get('SOL_HORARIO'));            
                $stmt->bindParam(':sol_data', $solicitacao->__get('SOL_DATA'));
               
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
                $sql = "delete from solicitacao_agend_con_online where SOL_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($solicitacao){
            try {
                $sql = "insert into solicitacao_agend_con_online (
                    
                            SOL_HORARIO, 
                            SOL_DATA, 
                            FK_ESPECIALIDADES_ESP_ID
                        ) 
                        values (
                            :sol_horario,
                            :sol_data,
                            :fk_especialidades_esp_id
                        )";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':sol_horario', $solicitacao->__get('SOL_HORARIO'));
                $stmt->bindParam(':sol_data', $solicitacao->__get('SOL_DATA'));
                $stmt->bindParam(':fk_especialidades_esp_id', $solicitacao->__get('FK_ESPECIALIDADES_ESP_ID'));
                
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            
            try {
                $sql = "SELECT * FROM solicitacao_agend_con_online WHERE SOL_ID=:id";
                
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $solicitacao = new SolicAgendOnlineModel();
                    // $solicitacao->__set('SOL_STATUS', $result['SOL_STATUS']);
                    $solicitacao->__set('SOL_HORARIO', $result['SOL_HORARIO']);
                    $solicitacao->__set('SOL_DATA', $result['SOL_DATA']);
                    $solicitacao->__set('SOL_ID', $result['SOL_ID']);
                    $solicitacao->__set('FK_SECRETARIAS_SEC_ID', $result['FK_SECRETARIAS_SEC_ID']);
                    $solicitacao->__set('FK_ESPECIALIDADES_ESP_ID', $result['FK_ESPECIALIDADES_ESP_ID']);
                    $solicitacao->__set('FK_PACIENTES_PAC_ID', $result['FK_PACIENTES_PAC_ID']);
                    // $solicitacao->__set('SOL_JUSTIFICATIVARECUSAO', $result['SOL_JUSTIFICATIVARECUSAO']); //retorna todos os campos relacionados ao ID selecionado
                    
                    return $solicitacao;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
       
        public function confirmarAgend($id){
            
            try {
                $sql = "UPDATE solicitacao_agend_con_online SET 
                            SOL_STATUS=:sol_status
                        WHERE SOL_ID=:sol_id";
                
                $stmt = $this->getConn()->prepare($sql);
                
                $status = '1';
                $stmt->bindParam(':sol_id', $id);
                $stmt->bindParam(':sol_status', $status);
               
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error104');
                die();
            }

        }

        public function inserirMed($solicitacao){
            try {
                $res = array();
                $sql = "SELECT 
                        u.USU_NOME,
                        e.ESP_NOME
                        
                        FROM 
                        usuarios u,
                        medicos m,
                        especialidades e,
                        especialidades_medicos em
                        
                        WHERE 
                        m.MED_ID = em.FK_MEDICOS_MED_ID AND
                        u.USU_ID = m.FK_USUARIOS_USU_ID AND
                        e.ESP_ID = em.FK_ESPECIALIDADES_ESP_ID
                        
                    ORDER BY em.EPM_ID;";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $solicitacao = new SolicAgendOnlineModel();
                    $solicitacao->__set('FK_ESPECIALIDADES_ESP_ID', $row['FK_ESPECIALIDADES_ESP_ID']);
                    $solicitacao->__set('USU_NOME', $row['USU_NOME']);

                    array_push($res, $solicitacao); //Inserindo os dados persistidos da tabela em um array
                }

                return $res; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
    }

    ?>