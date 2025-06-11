<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\Alunos_Inscritos_ModalidadesModel; //Linkando o model ao DAO

    class Alunos_Inscritos_ModalidadesDAO extends DAO{
        
        public function listar(){
        }

// ===================================================================================================================================================
// ===================================================================================================================================================
        public function listarAlunosInscritosModalidades_mod02($EVM_ID){
            try{
                $alunos_inscritos_modalidades = array();
                $sql= "SELECT 
                    ALU.*,
                    AIM.AIM_ID AS AIM_ID,
                    MDE.MDE_NOME AS MDE_NOME
                FROM 
                    alunos_inscritos_modalidades AS AIM, 
                    alunos AS ALU,
                    eventos_modalidades AS EVM,
                    modalidades AS MDE
               
                WHERE 

                    AIM.FK_ALUNOS_ALU_ID = ALU.ALU_ID AND
                    AIM.FK_EVENTOS_MODALIDADES_EVM_ID = EVM.EVM_ID AND
                    EVM.FK_MODALIDADES_MDE_ID = MDE.MDE_ID AND
                    AIM.FK_EVENTOS_MODALIDADES_EVM_ID = :EVM_ID AND
                    (AIM.AIM_DEFERIDO <> 1 OR AIM.AIM_DEFERIDO IS NULL)";
            
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':EVM_ID', $EVM_ID);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach($result as $row){
                $alunos_inscritos_modalidadesModel = new Alunos_Inscritos_ModalidadesModel();
                
                $alunos_inscritos_modalidadesModel->__set('AIM_ID', $row['AIM_ID']);
                $alunos_inscritos_modalidadesModel->__set('ALU_ID', $row['ALU_ID']);
                $alunos_inscritos_modalidadesModel->__set('ALU_CPF', $row['ALU_CPF']);
                $alunos_inscritos_modalidadesModel->__set('ALU_NOME', $row['ALU_NOME']);
                $alunos_inscritos_modalidadesModel->__set('ALU_PRONTUARIO', $row['ALU_PRONTUARIO']);
                $alunos_inscritos_modalidadesModel->__set('MDE_NOME', $row['MDE_NOME']);
            
                array_push($alunos_inscritos_modalidades, $alunos_inscritos_modalidadesModel);
                }
                return $alunos_inscritos_modalidades;
            }
            
            catch (\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }
// ===================================================================================================================================================
// ===================================================================================================================================================


        public function listarAlunosInscritosModalidades($EVM_ID){
            try{
                $alunos_inscritos_modalidades = array();
                $sql= "SELECT 
                    ALU.*,
                    AIM.AIM_ID AS AIM_ID,
                    MDE.MDE_NOME AS MDE_NOME
                FROM 
                    alunos_inscritos_modalidades AS AIM, 
                    alunos AS ALU,
                    eventos_modalidades AS EVM,
                    modalidades AS MDE
               
                WHERE 

                    AIM.FK_ALUNOS_ALU_ID = ALU.ALU_ID AND
                    AIM.FK_EVENTOS_MODALIDADES_EVM_ID = EVM.EVM_ID AND
                    EVM.FK_MODALIDADES_MDE_ID = MDE.MDE_ID AND
                    AIM.FK_EVENTOS_MODALIDADES_EVM_ID = :EVM_ID";
            
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':EVM_ID', $EVM_ID);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach($result as $row){
                $alunos_inscritos_modalidadesModel = new Alunos_Inscritos_ModalidadesModel();
                
                $alunos_inscritos_modalidadesModel->__set('ALU_CPF', $row['ALU_CPF']);
                $alunos_inscritos_modalidadesModel->__set('ALU_NOME', $row['ALU_NOME']);
                $alunos_inscritos_modalidadesModel->__set('ALU_PRONTUARIO', $row['ALU_PRONTUARIO']);
                $alunos_inscritos_modalidadesModel->__set('MDE_NOME', $row['MDE_NOME']);
            
                array_push($alunos_inscritos_modalidades, $alunos_inscritos_modalidadesModel);
                }
                return $alunos_inscritos_modalidades;
            }
            
            catch (\PDOException $ex){
                header('Location:/error103');
                die();
            }    
        }

        public function inserir($obj) {
            $AIM_DEFERIDO = $obj->__get('AIM_DEFERIDO');
            $AIM_JUSTIFICATIVA = $obj->__get('AIM_JUSTIFICATIVA');
            $AIM_COMPROVANTE_FAIXA = $obj->__get('AIM_COMPROVANTE_FAIXA');
            $FK_EVENTOS_MODALIDADES_EVM_ID = $obj->__get('FK_EVENTOS_MODALIDADES_EVM_ID');
            $FK_ALUNOS_ALU_ID = $obj->__get('FK_ALUNOS_ALU_ID');
        
            // Remover vírgula extra no final da lista de campos
            $sql = "INSERT INTO alunos_inscritos_modalidades(
                        AIM_DEFERIDO,
                        AIM_JUSTIFICATIVA,
                        AIM_COMPROVANTE_FAIXA,
                        FK_EVENTOS_MODALIDADES_EVM_ID,
                        FK_ALUNOS_ALU_ID
                    ) VALUES (
                        :AIM_DEFERIDO,
                        :AIM_JUSTIFICATIVA,
                        :AIM_COMPROVANTE_FAIXA,
                        :FK_EVENTOS_MODALIDADES_EVM_ID,
                        :FK_ALUNOS_ALU_ID
                    )";
                    
            $stmt = $this->getConn()->prepare($sql);
        
            $stmt->bindParam(':AIM_DEFERIDO', $AIM_DEFERIDO);
            $stmt->bindParam(':AIM_JUSTIFICATIVA', $AIM_JUSTIFICATIVA);
            $stmt->bindParam(':AIM_COMPROVANTE_FAIXA', $AIM_COMPROVANTE_FAIXA);
            $stmt->bindParam(':FK_EVENTOS_MODALIDADES_EVM_ID', $FK_EVENTOS_MODALIDADES_EVM_ID);
            $stmt->bindParam(':FK_ALUNOS_ALU_ID', $FK_ALUNOS_ALU_ID);
        
            $stmt->execute();
        }
        

        public function excluir($obj) {
            try {
                // Extraindo valores do objeto
                $AIM_ID = $obj->__get('AIM_ID');
                $AIM_JUSTIFICATIVA = $obj->__get('AIM_JUSTIFICATIVA');
        
                // Atualizando a justificativa e alterando o status de AIM_DEFERIDO para 2
                $sql = "UPDATE alunos_inscritos_modalidades SET 
                            AIM_DEFERIDO = 2, 
                            AIM_JUSTIFICATIVA = :AIM_JUSTIFICATIVA
                        WHERE AIM_ID = :AIM_ID";
        
                $stmt = $this->getConn()->prepare($sql);
        
                $stmt->bindParam(':AIM_JUSTIFICATIVA', $AIM_JUSTIFICATIVA);
                $stmt->bindParam(':AIM_ID', $AIM_ID);
        
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location:/error101');
                die();
            }
        }
        
            public function buscarNomeModalidadePorEVMID($FK_EVENTOS_MODALIDADES_EVM_ID) {
                try {
                    // Consultar o nome da modalidade com base no ID do evento/modaidade
                    $sql = "SELECT MDE_NOME 
                            FROM MODALIDADES 
                            INNER JOIN EVENTOS_MODALIDADES ON MODALIDADES.MDE_ID = EVENTOS_MODALIDADES.FK_MODALIDADES_MDE_ID 
                            WHERE EVENTOS_MODALIDADES.EVM_ID = :EVM_ID";
                    
                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->bindParam(':EVM_ID', $FK_EVENTOS_MODALIDADES_EVM_ID);
                    $stmt->execute();

                    // Buscar o nome da modalidade
                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                    // Retorna o nome da modalidade ou null se não encontrado
                    return $result ? $result['MDE_NOME'] : null; 
                } catch (\PDOException $ex) {
                    // Tratar erro de consulta
                    header('Location:/error');
                    die();
                }
            }

           public function buscarNomeEventoPorEVMID($EVM_ID) {
                try {
                    // Consultar o nome do evento com base no ID do evento/modaidade
                    $sql = "SELECT EVO_NOME
                            FROM EVENTOS 
                            INNER JOIN EVENTOS_MODALIDADES ON EVENTOS.EVO_ID = EVENTOS_MODALIDADES.FK_EVENTOS_EVO_ID 
                            WHERE EVENTOS_MODALIDADES.EVM_ID = :EVM_ID";
            
                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->bindParam(':EVM_ID', $EVM_ID);
                    $stmt->execute();
            
                    // Buscar o nome do evento
                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            
                    // Retorna o nome do evento ou null se não encontrado
                    return $result['EVO_NOME']; 
                } catch (\PDOException $ex) {
                    // Tratar erro de consulta
                    header('Location:/error');
                    die();
                }
            } 

            public function alterar($obj) {
                try {
                    $AIM_ID = $obj->__get('AIM_ID');
                    $AIM_NOME = $obj->__get('AIM_NOME');
                    $AIM_PRONTUARIO = $obj->__get('AIM_PRONTUARIO');
                    $AIM_EMAIL = $obj->__get('AIM_EMAIL');
            
                    $sql = "UPDATE alunos_inscritos_modalidades SET 
                                AIM_NOME = :AIM_NOME, 
                                AIM_PRONTUARIO = :AIM_PRONTUARIO,
                                AIM_EMAIL = :AIM_EMAIL
                            WHERE AIM_ID = :AIM_ID";
            
                    $stmt = $this->getConn()->prepare($sql);
            
                    $stmt->bindParam(':AIM_ID', $AIM_ID);
                    $stmt->bindParam(':AIM_NOME', $AIM_NOME);
                    $stmt->bindParam(':AIM_PRONTUARIO', $AIM_PRONTUARIO);
                    $stmt->bindParam(':AIM_EMAIL', $AIM_EMAIL);
            
                    $stmt->execute();
                } catch (\PDOException $ex) {
                    header('Location:/error101');
                    die();
                }
            }

            public function buscarPorId($AIM_ID) {
                try {
                    $sql = "
                        SELECT 
                            aim.*,
                            a.ALU_NOME,
                            a.ALU_CPF,
                            a.ALU_PRONTUARIO
                        FROM 
                            alunos_inscritos_modalidades aim
                        INNER JOIN 
                            alunos a 
                            ON aim.FK_ALUNOS_ALU_ID = a.ALU_ID
                        WHERE 
                            aim.AIM_ID = :AIM_ID
                    ";
            
                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->bindParam(':AIM_ID', $AIM_ID);
                    $stmt->execute();
            
                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if ($result) {
                        $Alunos_Inscritos_ModalidadesModel = new Alunos_Inscritos_ModalidadesModel();
                        $Alunos_Inscritos_ModalidadesModel->__set('AIM_ID', $result['AIM_ID']);
                        $Alunos_Inscritos_ModalidadesModel->__set('AIM_DEFERIDO', $result['AIM_DEFERIDO']);
                        $Alunos_Inscritos_ModalidadesModel->__set('AIM_JUSTIFICATIVA', $result['AIM_JUSTIFICATIVA']);
                        $Alunos_Inscritos_ModalidadesModel->__set('AIM_COMPROVANTE_FAIXA', $result['AIM_COMPROVANTE_FAIXA']);
                        $Alunos_Inscritos_ModalidadesModel->__set('FK_ALUNOS_ALU_ID', $result['FK_ALUNOS_ALU_ID']);
                        $Alunos_Inscritos_ModalidadesModel->__set('FK_EVENTOS_MODALIDADES_EVM_ID', $result['FK_EVENTOS_MODALIDADES_EVM_ID']);
                        
                        // Campos da tabela `alunos`
                        $Alunos_Inscritos_ModalidadesModel->__set('AIM_NOME', $result['ALU_NOME']);
                        $Alunos_Inscritos_ModalidadesModel->__set('AIM_CPF', $result['ALU_CPF']);
                        $Alunos_Inscritos_ModalidadesModel->__set('AIM_PRONTUARIO', $result['ALU_PRONTUARIO']);
            
                        return $Alunos_Inscritos_ModalidadesModel;
                    } else {
                        return null;
                    }
                } catch (\PDOException $ex) {
                    header('Location:/error103');
                    die();
                }
            }
            

            public function buscarInscricoesPorAlunoEEvento($AIE_ID) {
                try {
                    $sql = "
                        SELECT 
                                aim.*,
                                em.FK_EVENTOS_EVO_ID,
                                em.EVM_ID,
                                e.EVO_NOME,
                                a.ALU_NOME,
                                a.ALU_PRONTUARIO,
                                m.MDE_NOME,
                                aie.*
                            FROM 
                                alunos_inscritos_modalidades aim
                            INNER JOIN 
                                eventos_modalidades em 
                                ON aim.FK_EVENTOS_MODALIDADES_EVM_ID = em.EVM_ID
                            INNER JOIN 
                                eventos e 
                                ON em.FK_EVENTOS_EVO_ID = e.EVO_ID
                            INNER JOIN 
                                alunos a 
                                ON aim.FK_ALUNOS_ALU_ID = a.ALU_ID
                            INNER JOIN 
                                modalidades m
                                ON em.FK_MODALIDADES_MDE_ID = m.MDE_ID
                            INNER JOIN 
                                alunos_inscritos_eventos aie
                                ON aie.FK_ALUNOS_ALU_ID = a.ALU_ID AND aie.FK_EVENTOS_EVO_ID = e.EVO_ID
                            WHERE 
                                aie.AIE_ID = :AIE_ID
                                AND aim.AIM_DEFERIDO = 0
                    ";

                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->bindParam(':AIE_ID', $AIE_ID);
                    $stmt->execute();
                    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);;
                    // Retorna o resultado como um array associativo
                    if ($result) {
                    return $result;}
                    else {
                        return null;
                    }

                } catch (\PDOException $ex) {
                    // Redireciona para a página de erro em caso de falha
                    header('Location:/error103');
                    die();
                }
            }

            public function buscarAIEPorAIMID($AIM_ID) {
                try {
                    // Consulta SQL que junta a tabela alunos_inscritos_modalidades (AIM) com alunos_inscritos_eventos (AIE)
                    $sql = "
                        SELECT 
                            aie.*
                        FROM 
                            alunos_inscritos_modalidades aim
                        INNER JOIN 
                            alunos_inscritos_eventos aie 
                            ON aim.FK_ALUNOS_ALU_ID = aie.FK_ALUNOS_ALU_ID 
                            AND aim.FK_EVENTOS_MODALIDADES_EVM_ID = aie.FK_EVENTOS_EVO_ID
                        WHERE 
                            aim.AIM_ID = :AIM_ID
                    ";
            
                    // Preparando a consulta
                    $stmt = $this->getConn()->prepare($sql);
                    $stmt->bindParam(':AIM_ID', $AIM_ID);
                    $stmt->execute();
            
                    // Recupera o resultado da consulta
                    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            
                    // Verifica se o resultado foi encontrado
                    if ($result) {
                        return $result;  // Retorna o array associativo com os dados de AIE
                    } else {
                        return null;  // Retorna null caso não encontre
                    }
                } catch (\PDOException $ex) {
                    // Redireciona para página de erro em caso de falha
                    header('Location:/error103');
                    die();
                }
            }

            public function atualizarDeferidoComJustificativa($AIM_ID, $deferido, $justificativa) {
                // Cria a consulta SQL para atualizar o campo AIM_DEFERIDO e AIM_JUSTIFICATIVA
                $sql = "UPDATE alunos_inscritos_modalidades SET AIM_DEFERIDO = :deferido, AIM_JUSTIFICATIVA = :justificativa WHERE AIM_ID = :AIM_ID";
            
                // Prepara a consulta
                $stmt = $this->getConn()->prepare($sql);
            
                // Vincula os parâmetros
                $stmt->bindParam(':deferido', $deferido);
                $stmt->bindParam(':justificativa', $justificativa);
                $stmt->bindParam(':AIM_ID', $AIM_ID);
            
                // Executa a consulta
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
            
            



public function verificarInscricaoAluno($idModalidade){
    try{
        $alunos_inscritos_modalidades = array();
        $sql = "SELECT 
                    AIM.*,
                    AL.*
                FROM alunos_inscritos_modalidades AIM, alunos AL
                WHERE 
                    AI.FK_ALUNOS_ALU_ID = AL.ALU_ID AND
                    AI.FK_EVENTOS_EVO_ID=:idModalidade
                ";

        $stmt = $this->getConn()->prepare($sql);

        $stmt->bindParam(':idModalidade', $idModalidade);

        $stmt->execute();

        $result = $stmt->fetchALL(\PDO::FETCH_ASSOC);

        
        foreach($result as $row){
            $Alunos_Inscritos_ModalidadesModel = new Alunos_Inscritos_ModalidadesModel();
            $Alunos_Inscritos_ModalidadesModel->__set('AIE_ID',$row['AIE_ID']);
            $Alunos_Inscritos_ModalidadesModel->__set('ALU_NOME',$row['ALU_NOME']);
            $Alunos_Inscritos_ModalidadesModel->__set('ALU_PRONTUARIO',$row['ALU_PRONTUARIO']);
            $Alunos_Inscritos_ModalidadesModel->__set('AIE_COPIA_RG',$row['AIE_COPIA_RG']);
            $Alunos_Inscritos_ModalidadesModel->__set('AIE_AUTORIZACAO_PAIS',$row['AIE_AUTORIZACAO_PAIS']);
            $Alunos_Inscritos_ModalidadesModel->__set('AIE_BOLETIM_ESCOLAR',$row['AIE_BOLETIM_ESCOLAR']);
            $Alunos_Inscritos_ModalidadesModel->__set('AIE_FOTO_PESSOAL',$row['AIE_FOTO_PESSOAL']);
            
            array_push($alunos_inscritos_eventos, $Alunos_Inscritos_ModalidadesModel);
        }
        return $alunos_inscritos_eventos;
        
    }
    catch(\PDOException $ex){
        header('Location:/error103');
        die();
    }
}
        
    }