<?php

namespace App\DAO;

use App\DAO;
use App\Model\ConsultaPresencialModel;
    
    class ConsultaPresencialDAO extends DAO{
        public function listar(){
            try {
                $consultas_presenciais = array();
                $sql = "SELECT * FROM consultas_presenciais ORDER BY COP_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $consultaPresencial = new ConsultaPresencialModel();
                    $consultaPresencial->__set('COP_ID', $row['COP_ID']);
                    $consultaPresencial->__set('COP_DESCRICAO', $row['COP_DESCRICAO']);
                    $consultaPresencial->__set('COP_LOCAL_CONSULTA_DIRECIONADA', $row['COP_LOCAL_CONSULTA_DIRECIONADA']);
                    $consultaPresencial->__set('COP_NIVEL_PRIORIDADE', $row['COP_NIVEL_PRIORIDADE']);
                    $consultaPresencial->__set('COP_RETORNO', $row['COP_RETORNO']);
                    $consultaPresencial->__set('FK_CONSULTAS_ONLINE_CTO_ID', $row['FK_CONSULTAS_ONLINE_CTO_ID']);
                    $consultaPresencial->__set('FK_MEDICOS_MED_ID', $row['FK_MEDICOS_MED_ID']);
                    $consultaPresencial->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);

                    array_push($consultas_presenciais, $consultaPresencial); //Inserindo os dados persistidos da tabela em um array
                }

                return $consultas_presenciais; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        /* ---MÓDULO 04 INÍCIO--- */
        public function listarConsultaPresencial(){
            try {
                $consultas_presenciais = array();
                $sql = "SELECT 
                            CP.COP_ID,
                            CP.COP_DATA_ATEDIMENTO,
                            CP.COP_HORA_ATENDIMENTO,
                            U.USU_NOME AS NOME_PACIENTE,
                            UM.USU_NOME AS NOME_MEDICO
                        FROM 
                            CONSULTAS_PRESENCIAIS AS CP,
                            PACIENTES AS P,
                            USUARIOS AS U,
                            USUARIOS AS UM,
                            MEDICOS as M
                        WHERE
                            CP.FK_PACIENTES_PAC_ID = P.PAC_ID AND
                            P.FK_USUARIOS_USU_ID = U.USU_ID AND 
                            CP.FK_MEDICOS_MED_ID = M.MED_ID AND
                            M.FK_USUARIOS_USU_ID = UM.USU_ID
                        ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $consultaPresencial = new ConsultaPresencialModel();
                    $consultaPresencial->__set('COP_ID', $row['COP_ID']);
                    $consultaPresencial->__set('COP_DATA_ATEDIMENTO', $row['COP_DATA_ATEDIMENTO']);
                    $consultaPresencial->__set('COP_HORA_ATENDIMENTO', $row['COP_HORA_ATENDIMENTO']);
                    $consultaPresencial->__set('NOME_PACIENTE', $row['NOME_PACIENTE']);
                    $consultaPresencial->__set('NOME_MEDICO', $row['NOME_MEDICO']);

                    array_push($consultas_presenciais, $consultaPresencial); //Inserindo os dados persistidos da tabela em um array
                }

                return $consultas_presenciais; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error105');
                die();
            }
        }

        /* ---MÓDULO 04 FIM--- */

        //Método de alteração de um paciente (este método recebe o Objeto $paciente vindo do Método Atualizar (linha 93) do PacienteController)
        public function alterar($consulta_presencial){
            try {
                $sql = "UPDATE consultas_presenciais 
                SET 
                    COP_DESCRICAO=:descricao, 
                    COP_LOCAL_CONSULTA_DIRECIONADA=:local_consulta, 
                    COP_NIVEL_PRIORIDADE=:nivel_prioridade, 
                    COP_RETORNO=:retorno, 
                    FK_CONSULTAS_ONLINE_CTO_ID=:fkconsultas_online, 
                    FK_MEDICOS_MED_ID=:fkmedicos_id, 
                    FK_PACIENTES_PAC_ID=:fkpacientes_id 
                WHERE COP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $consultaPresencial->__get('COP_ID'));
                $stmt->bindParam(':descricao', $consultaPresencial->__get('COP_DESCRICAO'));
                $stmt->bindParam(':local_consulta', $consultaPresencial->__get('COP_LOCAL_CONSULTA_DIRECIONADA'));   
                $stmt->bindParam(':nivel_prioridade', $consultaPresencial->__get('COP_NIVEL_PRIORIDADE'));
                $stmt->bindParam(':retorno', $consultaPresencial->__get('COP_RETORNO'));
                $stmt->bindParam(':fkconsultas_online', $consultaPresencial->__get('FK_CONSULTAS_ONLINE_CTO_ID'));
                $stmt->bindParam(':fkmedicos_id', $consultaPresencial->__get('FK_MEDICOS_MED_ID'));         
                $stmt->bindParam(':fkpacientes_id', $consultaPresencial->__get('FK_PACIENTES_PAC_ID'));

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
                $sql = "delete from consultas_presenciais where COP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        //Método para inserir um novo paciente (recebe um Objeto como parâmetro)
        public function inserir($consulta_presencial){
            try {
                $sql = "insert into consultas_presenciais (COP_DESCRICAO, COP_LOCAL_CONSULTA_DIRECIONADA, COP_NIVEL_PRIORIDADE, COP_RETORNO) values (:descricao,:local_consulta, :nivel_prioridade, :retorno)";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':descricao', $consultaPresencial->__get('COP_DESCRICAO'));
                $stmt->bindParam(':local_consulta', $consultaPresencial->__get('COP_LOCAL_CONSULTA_DIRECIONADA'));   
                $stmt->bindParam(':nivel_prioridade', $consultaPresencial->__get('COP_NIVEL_PRIORIDADE'));
                $stmt->bindParam(':retorno', $consultaPresencial->__get('COP_RETORNO'));
                /* $stmt->bindParam(':fkconsultas_online', $consultaPresencial->__get('FK_CONSULTAS_ONLINE_CTO_ID'));
                $stmt->bindParam(':fkmedicos_id', $consultaPresencial->__get('FK_MEDICOS_MED_ID'));         
                $stmt->bindParam(':fkpacientes_id', $consultaPresencial->__get('FK_PACIENTES_PAC_ID')); */
                $stmt->execute();
            } catch (\PDOException $ex) {

                header('Location: /error100');
                die();
            }
        }

        //Método para buscar um registro expecífico no Banco (recebe um $id)
        public function buscarPorId($id){
            try {                

                $sql = "SELECT    CP.COP_ID,
                CP.COP_DATA_ATEDIMENTO,
                CP.COP_HORA_ATENDIMENTO,                                
                U.USU_NOME AS NOME_PACIENTE,                
                UM.USU_NOME AS NOME_MEDICO
                FROM 
                CONSULTAS_PRESENCIAIS AS CP,
                PACIENTES AS P,
                USUARIOS AS U, 
                MEDICOS AS M,
                USUARIOS AS UM
                WHERE
                CP.FK_PACIENTES_PAC_ID = P.PAC_ID AND
                P.FK_USUARIOS_USU_ID = U.USU_ID AND
                CP.FK_MEDICOS_MED_ID = M.MED_ID AND
                M.FK_USUARIOS_USU_ID = UM.USU_ID AND
                CP.COP_ID = :id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $consultaPresencial = new ConsultaPresencialModel();
                    $consultaPresencial->__set('COP_ID', $result['COP_ID']);
                    $consultaPresencial->__set('COP_DATA_ATEDIMENTO', $result['COP_DATA_ATEDIMENTO']);
                    $consultaPresencial->__set('COP_HORA_ATENDIMENTO', $result['COP_HORA_ATENDIMENTO']);
                    $consultaPresencial->__set('NOME_PACIENTE', $result['NOME_PACIENTE']);
                    $consultaPresencial->__set('NOME_MEDICO', $result['NOME_MEDICO']);    
                    

                    return $consultaPresencial;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function listarConsultasPresenciaisDirecionadas(){
            try {
                $consultas_presenciais = array();
                $sql = "SELECT 
                            COP.COP_ID,
                            COP.COP_NIVEL_PRIORIDADE,
                            CTO.CTO_DIAGNOSTICO,
                            COP.COP_DATA_ATEDIMENTO,
                            COP.COP_HORA_ATENDIMENTO,
                            COP.COP_LOCAL_CONSULTA_DIRECIONADA,
                            U.USU_NOME AS NOME_PACIENTE,
                            UM.USU_NOME AS NOME_MEDICO
                        FROM 
                            CONSULTAS_PRESENCIAIS AS COP,
                            CONSULTAS_ONLINE AS CTO,
                            PACIENTES AS P,
                            USUARIOS AS U,
                            USUARIOS AS UM,
                            MEDICOS as M
                        WHERE
                            COP.FK_CONSULTAS_ONLINE_CTO_ID = CTO.CTO_ID AND
                            COP.FK_PACIENTES_PAC_ID = P.PAC_ID AND
                            P.FK_USUARIOS_USU_ID = U.USU_ID AND 
                            COP.FK_MEDICOS_MED_ID = M.MED_ID AND
                            M.FK_USUARIOS_USU_ID = UM.USU_ID
                        ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $consultaPresencial = new ConsultaPresencialModel();
                    $consultaPresencial->__set('COP_ID', $row['COP_ID']);
                    $consultaPresencial->__set('COP_NIVEL_PRIORIDADE', $row['COP_NIVEL_PRIORIDADE']);
                    $consultaPresencial->__set('CTO_DIAGNOSTICO', $row['CTO_DIAGNOSTICO']);
                    $consultaPresencial->__set('COP_DATA_ATEDIMENTO', $row['COP_DATA_ATEDIMENTO']);
                    $consultaPresencial->__set('COP_HORA_ATENDIMENTO', $row['COP_HORA_ATENDIMENTO']);
                    $consultaPresencial->__set('COP_LOCAL_CONSULTA_DIRECIONADA', $row['COP_LOCAL_CONSULTA_DIRECIONADA']);
                    $consultaPresencial->__set('NOME_PACIENTE', $row['NOME_PACIENTE']);
                    $consultaPresencial->__set('NOME_MEDICO', $row['NOME_MEDICO']);

                    array_push($consultas_presenciais, $consultaPresencial); //Inserindo os dados persistidos da tabela em um array
                }

                return $consultas_presenciais; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error105');
                die();
            }
        }
        
    }