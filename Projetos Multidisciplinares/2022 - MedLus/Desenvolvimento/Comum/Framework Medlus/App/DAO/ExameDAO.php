<?php

namespace App\DAO;

use App\DAO;
use App\Model\ExameModel;
    
    class ExameDAO extends DAO {

        public function listar(){
            try {
                $exames = array();
                $sql = "SELECT * FROM exames ORDER BY EXA_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $exame = new ExameModel();
                    $exame->__set('EXA_DATA_CRIACAO', $row['EXA_DATA_CRIACAO']);
                    $exame->__set('EXA_STATUS', $row['EXA_STATUS']);
                    $exame->__set('EXA_NOME', $row['EXA_NOME']);
                    $exame->__set('EXA_DATA_MARCADA', $row['EXA_DATA_MARCADA']);
                    $exame->__set('EXA_URL_GUIA_MEDICA', $row['EXA_URL_GUIA_MEDICA']);
                    $exame->__set('EXA_SETOR_ATENDIMENTO', $row['EXA_SETOR_ATENDIMENTO']);
                    $exame->__set('EXA_RESULTADO_EXAME', $row['EXA_RESULTADO_EXAME']);
                    $exame->__set('EXA_HORARIO', $row['EXA_HORARIO']);
                    $exame->__set('EXA_ID', $row['EXA_ID']);
                    $exame->__set('EXA_JUSTIFICATIVA_RECUSAO', $row['EXA_JUSTIFICATIVA_RECUSAO']);
                    $exame->__set('FK_SECRETARIAS_SEC_ID', $row['FK_SECRETARIAS_SEC_ID']);      
                    $exame->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);           
                    $exame->__set('FK_CONSULTAS_PRESENCIAIS_COP_ID', $row['FK_CONSULTAS_PRESENCIAIS_COP_ID']);


                    array_push($exames, $exame); //Inserindo os dados persistidos da tabela em um array
                }

                return $exames; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        public function listarMeusExames(){
            try {
                $exames = array();
                $sql = "SELECT * FROM exames ORDER BY EXA_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $exame = new ExameModel();
                    $exame->__set('EXA_STATUS', $row['EXA_STATUS']);
                    $exame->__set('EXA_NOME', $row['EXA_NOME']);
                    $exame->__set('EXA_DATA_MARCADA', $row['EXA_DATA_MARCADA']);
                    $exame->__set('EXA_URL_GUIA_MEDICA', $row['EXA_URL_GUIA_MEDICA']);
                    $exame->__set('EXA_HORARIO', $row['EXA_HORARIO']);
                    $exame->__set('EXA_ID', $row['EXA_ID']);
                    $exame->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);
                    $exame->__set('FK_PACIENTES_FK_USUARIOS_USU_ID', $row['FK_PACIENTES_FK_USUARIOS_USU_ID']);

                    array_push($exames, $exame); //Inserindo os dados persistidos da tabela em um array
                }

                return $exames; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }


        public function listarTodosExames(){
            try {
                $exames = array();
                $sql = "SELECT 
                e.EXA_ID,
                e.EXA_NOME,
                e.EXA_STATUS,
                e.EXA_DATA_MARCADA,
                u.USU_NOME,
                u.USU_CPF
                FROM 
                exames e,
                pacientes p,
                usuarios u
                
                WHERE 
                p.PAC_ID = e.FK_PACIENTES_PAC_ID AND
                u.USU_ID = p.FK_USUARIOS_USU_ID
                
                ORDER BY EXA_ID ASC ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $exame = new ExameModel();
                    $exame->__set('EXA_STATUS', $row['EXA_STATUS']);
                    $exame->__set('EXA_NOME', $row['EXA_NOME']);
                    $exame->__set('EXA_DATA_MARCADA', $row['EXA_DATA_MARCADA']);
                    //$exame->__set('EXA_URL_GUIA_MEDICA', $row['EXA_URL_GUIA_MEDICA']);
                    //$exame->__set('EXA_HORARIO', $row['EXA_HORARIO']);
                    $exame->__set('EXA_ID', $row['EXA_ID']);
                    //$exame->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);
                    //$exame->__set('FK_PACIENTES_FK_USUARIOS_USU_ID', $row['FK_PACIENTES_FK_USUARIOS_USU_ID']);
                    $exame->__set('USU_NOME', $row['USU_NOME']);
                    $exame->__set('USU_CPF', $row['USU_CPF']);

                    array_push($exames, $exame); //Inserindo os dados persistidos da tabela em um array
                }

                return $exames; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        // FUNÇÃO DE BUSCAR POR ID
        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM exames WHERE EXA_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $exame = new ExameModel();

                    $exame->__set('EXA_DATA_CRIACAO', $result['EXA_DATA_CRIACAO']);
                    $exame->__set('EXA_STATUS', $result['EXA_STATUS']);
                    $exame->__set('EXA_NOME', $result['EXA_NOME']);
                    $exame->__set('EXA_DATA_MARCADA', $result['EXA_DATA_MARCADA']);
                    $exame->__set('EXA_URL_GUIA_MEDICA', $result['EXA_URL_GUIA_MEDICA']);
                    $exame->__set('EXA_SETOR_ATENDIMENTO', $result['EXA_SETOR_ATENDIMENTO']);
                    $exame->__set('EXA_RESULTADO_EXAME', $result['EXA_RESULTADO_EXAME']);
                    $exame->__set('EXA_HORARIO', $result['EXA_HORARIO']);
                    $exame->__set('EXA_ID', $result['EXA_ID']);
                    $exame->__set('EXA_JUSTIFICATIVA_RECUSAO', $result['EXA_JUSTIFICATIVA_RECUSAO']);
                    $exame->__set('FK_SECRETARIAS_SEC_ID', $result['FK_SECRETARIAS_SEC_ID']);
                    //$exame->__set('FK_SECRETARIAS_FK_USUARIOS_USU_ID', $result['FK_SECRETARIAS_FK_USUARIOS_USU_ID']);
                    $exame->__set('FK_PACIENTES_PAC_ID', $result['FK_PACIENTES_PAC_ID']);
                    //$exame->__set('FK_PACIENTES_FK_USUARIOS_USU_ID', $result['FK_PACIENTES_FK_USUARIOS_USU_ID']);
                    $exame->__set('FK_CONSULTAS_PRESENCIAIS_COP_ID', $result['FK_CONSULTAS_PRESENCIAIS_COP_ID']);
                    
                
                    return $exame;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function buscarPorIdNome($id){
            try {
                $sql = "SELECT 
                e.EXA_ID,
                e.EXA_NOME,
                e.EXA_STATUS,
                e.EXA_DATA_MARCADA,
                e.EXA_SETOR_ATENDIMENTO,
                e.EXA_RESULTADO_EXAME,
                e.EXA_HORARIO,
                u.USU_NOME,
                u.USU_CPF
                FROM 
                exames e,
                pacientes p,
                usuarios u
                
                WHERE 
                p.PAC_ID = e.FK_PACIENTES_PAC_ID AND
                u.USU_ID = p.FK_USUARIOS_USU_ID AND
                e.EXA_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $exame = new ExameModel();

                    //$exame->__set('EXA_DATA_CRIACAO', $result['EXA_DATA_CRIACAO']);
                    $exame->__set('EXA_STATUS', $result['EXA_STATUS']);
                    $exame->__set('EXA_NOME', $result['EXA_NOME']);
                    $exame->__set('EXA_DATA_MARCADA', $result['EXA_DATA_MARCADA']);
                    //$exame->__set('EXA_URL_GUIA_MEDICA', $result['EXA_URL_GUIA_MEDICA']);
                    $exame->__set('EXA_SETOR_ATENDIMENTO', $result['EXA_SETOR_ATENDIMENTO']);
                    //$exame->__set('EXA_RESULTADO_EXAME', $result['EXA_RESULTADO_EXAME']);
                    $exame->__set('EXA_HORARIO', $result['EXA_HORARIO']);
                    $exame->__set('EXA_ID', $result['EXA_ID']);
                   // $exame->__set('EXA_JUSTIFICATIVA_RECUSAO', $result['EXA_JUSTIFICATIVA_RECUSAO']);
                    //$exame->__set('FK_SECRETARIAS_SEC_ID', $result['FK_SECRETARIAS_SEC_ID']);
                    //$exame->__set('FK_CONSULTAS_PRESENCIAIS_COP_ID', $result['FK_CONSULTAS_PRESENCIAIS_COP_ID']);
                    $exame->__set('USU_NOME', $result['USU_NOME']);
                    $exame->__set('USU_CPF', $result['USU_CPF']);

                    return $exame;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        // Altera o Status do Exame
        public function alt($exame){
            try{
                $status =  $exame->__get('EXA_STATUS');
                $id =  $exame->__get('EXA_ID');
                $sql = "UPDATE exames SET EXA_STATUS=:sts WHERE EXA_ID=:id";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':sts', $status);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

            }catch(\PDOException $ex){

            }
        }
        
        // Altera o resultado do Exame
        public function result($exame){
            try{
                $result =  $exame->__get('EXA_RESULTADO_EXAME');
                $id =  $exame->__get('EXA_ID');
                $sql = "UPDATE exames SET EXA_RESULTADO_EXAME=:sts WHERE EXA_ID=:id";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':sts', $result);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

            }catch(\PDOException $ex){

            }
        }

        // // ALTERAR O EXAME
        public function alterar($exame){
            
            $id = $exame->__get('EXA_ID');
            $dataCriacao = $exame->__get('EXA_DATA_CRIACAO');
            $status = $exame->__get('EXA_STATUS');
            $nome = $exame->__get('EXA_NOME');
            $dataMarcada = $exame->__get('EXA_DATA_MARCADA');
            $guia = $exame->__get('EXA_URL_GUIA_MEDICA');
            $setor = $exame->__get('EXA_SETOR_ATENDIMENTO');
            $resultado = $exame->__get("EXA_RESULTADO_EXAME");
            $horario = $exame->__get('EXA_HORARIO');
            $justificativa_recusao = $exame->__get("EXA_JUSTIFICATIVA_RECUSAO");
            $secretaria = $exame->__get("FK_SECRETARIAS_SEC_ID");
            $id_sec_usu = $exame->__get("FK_SECRETARIAS_FK_USUARIO_USU_ID");
            $paciente = $exame->__get('FK_PACIENTES_PAC_ID');
            $pac_usu_id = $exame->__get("FK_PACIENTES_FK_USUARIOS_USU_ID");
            $con_pre_id = $exame->__get("FK_CONSULTAS_PRESENCIAIS_COP_ID");

            try {
                $sql = "UPDATE exames SET 
                EXA_DATA_CRIACAO=:exa_data_criacao, 
                EXA_STATUS=:exa_status,
                EXA_NOME=:exa_nome,
                EXA_DATA_MARCADA=:exa_data_marcada,
                EXA_URL_GUIA_MEDICA=:exa_url_guia_medica,
                EXA_SETOR_ATENDIMENTO=:exa_setor_atendimento,
                EXA_RESULTADO_EXAME=:exa_resultado_exame,
                EXA_HORARIO=:EXA_HORARIO,
                EXA_JUSTIFICATIVA_RECUSAO=:exa_justificativa_recusao,
                FK_SECRETARIAS_SEC_ID=:fk_secretarias_sec_id,
                FK_SECRETARIAS_FK_USUARIO_USU_ID=:fk_secretarias_fk_usuario_usu_id,
                FK_PACIENTES_PAC_ID=:fk_pacientes_pac_id,
                FK_PACIENTES_FK_USUARIOS_USU_ID=:fk_pacientes_fk_usuarios_usu_id,
                FK_CONSULTAS_PRESENCIAIS_COP_ID=:fk_consultas_presenciais_cop_id
                WHERE EXA_ID=:exa_id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':exa_data_criacao', $dataCriacao);
                $stmt->bindParam(':exa_status', $status);
                $stmt->bindParam(':exa_nome', $nome);
                $stmt->bindParam(':exa_data_marcada', $dataMarcada);
                $stmt->bindParam(':exa_url_guia_medica', $guia);
                $stmt->bindParam(':exa_setor_atendimento', $setor);
                $stmt->bindParam(':exa_resultado_exame', $resultado);
                $stmt->bindParam(':EXA_HORARIO', $horario);
                $stmt->bindParam(':exa_justificativa_recusao', $justificativa_recusao);
                $stmt->bindParam(':fk_secretarias', $secretaria);
                $stmt->bindParam(':fk_secretatias_fk_usuario_usu_id', $id_sec_usu);
                $stmt->bindParam(':fk_pacientes_pac_id', $paciente);
                $stmt->bindParam(':fk_pacientes_fkusuarios_usu_id', $pac_usu_id);
                $stmt->bindParam(':fk_consultas_presenciais_cop_id', $con_pre_id);
                $stmt->bindParam(':exa_id', $id);
                $stmt->execute();

            }catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

    // // ALTERAR O EXAME
    public function editarSolicitacao($exame)
    {
        $id = $exame->__get('EXA_ID');
        $status = $exame->__get('EXA_STATUS');
        $dataMarcada = $exame->__get('EXA_DATA_MARCADA');
        $dataCriacao = $exame->__get('EXA_DATA_CRIACAO');
        $nome = $exame->__get('EXA_NOME');
        $guia = $exame->__get('EXA_URL_GUIA_MEDICA');
        $setor = $exame->__get('EXA_SETOR_ATENDIMENTO');
        $horario = $exame->__get('EXA_HORARIO');

        try {
            $sql = "UPDATE exames SET 
                EXA_DATA_CRIACAO=:exa_data_criacao, 
                EXA_STATUS=:exa_status,
                EXA_NOME=:exa_nome,
                EXA_DATA_MARCADA=:exa_data_marcada,
                EXA_SETOR_ATENDIMENTO=:exa_setor_atendimento,
                EXA_HORARIO=:exa_horario
                WHERE EXA_ID=:exa_id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':exa_data_criacao', $dataCriacao);
            $stmt->bindParam(':exa_status', $status);
            $stmt->bindParam(':exa_nome', $nome);
            $stmt->bindParam(':exa_data_marcada', $dataMarcada);
            $stmt->bindParam(':exa_setor_atendimento', $setor);;
            $stmt->bindParam(':exa_horario', $horario);
            $stmt->bindParam(':exa_id', $id);
            $stmt->execute();

            if($guia) {
                $sql = "UPDATE exames SET
                    EXA_URL_GUIA_MEDICA=:exa_url_guia_medica
                    WHERE EXA_ID=:exa_id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':exa_url_guia_medica', $guia);
                $stmt->bindParam(':exa_id', $id);
                $stmt->execute();
            }

        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }


        //Método para inserir uma nova solicitação de exame
        public function inserir($exame) {
            $dataCriacao = $exame->__get('EXA_DATA_CRIACAO');
            $status = $exame->__get('EXA_STATUS');
            $nome = $exame->__get('EXA_NOME');
            $dataMarcada = $exame->__get('EXA_DATA_MARCADA');
            $guia = $exame->__get('EXA_URL_GUIA_MEDICA');
            $setor = $exame->__get('EXA_SETOR_ATENDIMENTO');
            $horario = $exame->__get('EXA_HORARIO');
            $paciente = $exame->__get('FK_PACIENTES_PAC_ID');

            try {
                // COLOCAR FK PACIENTE DPS
                $sql = "INSERT INTO EXAMES (
                                    EXA_DATA_CRIACAO,
                                    EXA_STATUS, 
                                    EXA_NOME, 
                                    EXA_DATA_MARCADA, 
                                    EXA_URL_GUIA_MEDICA, 
                                    EXA_SETOR_ATENDIMENTO, 
                                    EXA_HORARIO, 
                                    FK_PACIENTES_PAC_ID
                                ) values (
                                    :datacriacao, 
                                    :stts, 
                                    :nome, 
                                    :datamarcada, 
                                    :guia, 
                                    :setor, 
                                    :horario, 
                                    :paciente
                                )";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":datacriacao", $dataCriacao);
                $stmt->bindParam(":stts", $status);
                $stmt->bindParam(":nome", $nome);
                $stmt->bindParam(":datamarcada", $dataMarcada);
                $stmt->bindParam(":guia", $guia);
                $stmt->bindParam(":setor", $setor);
                $stmt->bindParam(":horario", $horario);
                $stmt->bindParam(":paciente", $paciente);
                $stmt->execute();
                
            } catch (\PDOException $ex) {
                
                header('Location: /error100');
                die();
            }
        }
        
        public function listarPorIdPaciente($idPaciente) {
            try {
                $exames = array();
                $sql = "SELECT * FROM EXAMES WHERE FK_PACIENTES_PAC_ID=:paciente";
                $stmt = $this->getConn()->prepare($sql);        
                
                $stmt->bindParam(':paciente', $idPaciente);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                foreach ($results as $row) {
                    $exame = new ExameModel();
                    $exame->__set('EXA_DATA_CRIACAO', $row['EXA_DATA_CRIACAO']);
                    $exame->__set('EXA_STATUS', $row['EXA_STATUS']);
                    $exame->__set('EXA_NOME', $row['EXA_NOME']);
                    $exame->__set('EXA_DATA_MARCADA', $row['EXA_DATA_MARCADA']);
                    $exame->__set('EXA_URL_GUIA_MEDICA', $row['EXA_URL_GUIA_MEDICA']);
                    $exame->__set('EXA_SETOR_ATENDIMENTO', $row['EXA_SETOR_ATENDIMENTO']);
                    $exame->__set('EXA_RESULTADO_EXAME', $row['EXA_RESULTADO_EXAME']);
                    $exame->__set('EXA_HORARIO', $row['EXA_HORARIO']);
                    $exame->__set('EXA_ID', $row['EXA_ID']);
                    $exame->__set('EXA_JUSTIFICATIVA_RECUSAO', $row['EXA_JUSTIFICATIVA_RECUSAO']);
                    $exame->__set('FK_SECRETARIAS_SEC_ID', $row['FK_SECRETARIAS_SEC_ID']);
                    $exame->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);
                    $exame->__set('FK_CONSULTAS_PRESENCIAIS_COP_ID', $row['FK_CONSULTAS_PRESENCIAIS_COP_ID']);

                    array_push($exames, $exame); //Inserindo os dados persistidos da tabela em um array
                }

                return $exames; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        } 

        public function excluir($id)
        {
            try {
                $sql = "DELETE FROM EXAMES WHERE EXA_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

    }


