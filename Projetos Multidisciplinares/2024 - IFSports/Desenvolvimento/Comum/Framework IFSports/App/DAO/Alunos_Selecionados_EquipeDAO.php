<?php

namespace App\DAO;

use App\DAO;
use App\Model\Alunos_Selecionados_EquipeModel; //Linkando o model ao DAO
use App\Model\ResponsavelEventoModalidadeModel;

class Alunos_Selecionados_EquipeDAO extends DAO{
    

    /*public function selecionarAlunos(){
        try{
            $alunos_selecionados_equipe = array();
            $sql = "";

            $stmt = $this->getConn()->prepare($sql);
            //$stmt->bindParam(':', $);

            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach($result as $row){
                $aluno_selecionado = new Alunos_Selecionados_EquipeModel();
                
                //1° variável model 2° variável do banco
                $aluno_selecionado->__set('ALU_ID', $row['ALU_ID']);
                $aluno_selecionado->__set('ALU_CPF', $row['ALU_CPF']);
                $aluno_selecionado->__set('ALU_NOME', $row['ALU_NOME']);
                $aluno_selecionado->__set('ALU_PRONTUARIO', $row['ALU_PRONTUARIO']);
                $aluno_selecionado->__set('MDE_NOME', $row['MDE_NOME']);

                array_push($alunos_selecionados_equipe, $aluno_selecionado);
            }
            
            return $alunos_selecionados_equipe;
        }

        catch(\PDOException $ex){
            header('Location:/error103');
            die();
        }  
    }*/
	public function listarEquipesResponsavel($idResponsavel){
            try{
                $equipes_responsavel_evento_modalidade = array();
                
                $sql = "SELECT 
                            REM.REM_ID,
                            EVM.EVM_ID,
                            EVM.FK_EVENTOS_EVO_ID,
                            E.EVO_NOME,
                            E.EVO_DATA_INICIO,
                            EVM.FK_MODALIDADES_MDE_ID,
                            M.MDE_NOME
                        FROM 
                            responsavel_evento_modalidade REM,
                            eventos_modalidades EVM,
                            eventos E,
                            modalidades M
                        WHERE 
                            REM.FK_RESPONSAVEIS_EQUIPE_RES_ID = :idResponsavel AND
                            REM.FK_EVENTOS_MODALIDADES_EVM_ID = EVM.EVM_ID AND
                            EVM.FK_EVENTOS_EVO_ID = E.EVO_ID AND
                            EVM.FK_MODALIDADES_MDE_ID = M.MDE_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':idResponsavel', $idResponsavel);

                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                foreach($result as $row){
                    $equipe_responsavel_evento_modalidade = new ResponsavelEventoModalidadeModel();
                    
                    //1° variável model 2° variável do banco
                    $equipe_responsavel_evento_modalidade->__set('REM_ID', $row['REM_ID']);
                    $equipe_responsavel_evento_modalidade->__set('EVO_NOME', $row['EVO_NOME']);
                    $equipe_responsavel_evento_modalidade->__set('EVO_DATA_INICIO', $row['EVO_DATA_INICIO']);
                    $equipe_responsavel_evento_modalidade->__set('MDE_NOME', $row['MDE_NOME']);
                    $equipe_responsavel_evento_modalidade->__set('FK_EVENTOS_MODALIDADES_EVM_ID', $row['EVM_ID']);

                    array_push($equipes_responsavel_evento_modalidade, $equipe_responsavel_evento_modalidade);
                }
                
                return $equipes_responsavel_evento_modalidade;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }
	
    public function listar(){
            try{
                $alunos_selecionados_equipes = array();
                $sql = "SELECT * FROM alunos_selecionados_equipe ORDER BY RES_ID DESC"; 

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    $alunos_selecionados_equipeModel = new Alunos_Selecionados_EquipeModel();
                    
                    //1° variável model 2° variável do banco
                    $alunos_selecionados_equipeModel->__set('ALS_ID',$row['ALS_ID']);
                    $alunos_selecionados_equipeModel->__set('FK_EVENTOS_MODALIDADES_EVM_ID',$row['FK_EVENTOS_MODALIDADES_EVM_ID']);
                    $alunos_selecionados_equipeModel->__set('FK_ALUNOS_ALU_ID',$row['FK_ALUNOS_ALU_ID']);
                    $alunos_selecionados_equipeModel->__set('ALS_SELECIONADO',$row['ALS_SELECIONADO']);
                    $alunos_selecionados_equipeModel->__set('ALS_DATA_HORA',$row['ALS_DATA_HORA']);
                    //$alunos_selecionados_equipeModel->__set('ALS_JUSTIFICATIVA',$row['$ALS_JUSTIFICATIVA']);

                    array_push($alunos_selecionados_equipes,$alunos_selecionados_equipeModel);
                }
                return $alunos_selecionados_equipes;
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }


    public function inserir($obj){
        /*$justificativas = array();

        $ALS_ID = $obj-> __get('ALS_ID');
        $ALS_JUSTIFICATIVA = $obj-> __get('ALS_JUSTIFICATIVA');

        $sql = "insert into alunos_selecionados_equipe (ALS_ID, ALS_JUSTIFICATIVA) values (:ALS_ID, :ALS_JUSTIFICATIVA)";
        $stmt = $this->getConn()->prepare($sql);

        $stmt->bindParam(':ALS_ID', $ALS_ID);
        $stmt->bindParam(':ALS_JUSTIFICATIVA', $ALS_JUSTIFICATIVA); */

        //$stmt->execute();
    } 
   
    public function excluir($obj){

    }
    public function alterar($obj){
        try{
            //colocar o código aqui

        }
        catch(\PDOException $ex){
            header('Location: /error101');
            die();
        }
    }
    public function buscarPorId($id){
        try{
            
            //colocar o código aqui
        }
        catch(\PDOException $ex){
            header('Location:/error103');
            die();
        } 
    }

    public function vincularEquipeAEvento($equipeId, $eventoId) {
        try {
            $sql = "INSERT INTO equipes_eventos (equipe_id, evento_id) VALUES (:equipeId, :eventoId)";
            $stmt = $this->getConn()->prepare($sql); 
    
            $stmt->bindParam(':equipeId', $equipeId, \PDO::PARAM_INT);
            $stmt->bindParam(':eventoId', $eventoId, \PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return ['sucesso' => true, 'mensagem' => 'Vinculação realizada com sucesso'];
            } else {
                return ['sucesso' => false, 'mensagem' => 'Erro ao vincular equipe e evento'];
            }
        } catch (\PDOException $ex) {
            
            error_log("Erro ao vincular equipe e evento: " . $ex->getMessage());
            header('Location:/error103');
            die();
        }
    }
}