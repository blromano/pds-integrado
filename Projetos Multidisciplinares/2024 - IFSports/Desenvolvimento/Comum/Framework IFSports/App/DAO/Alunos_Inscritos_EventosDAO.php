<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\Alunos_Inscritos_EventosModel; //Linkando o model ao DAO

    class Alunos_Inscritos_EventosDAO extends DAO{
        
        

        public function listar(){

            try{
                $alunos_inscritos_eventos = array();
                $sql = "SELECT 
                ALU.*,
                MDE.MDE_NOME AS MDE_NOME,
                CAM.CAM_NOME AS CAM_NOME,
                CUR.CUR_NOME AS CUR_NOME,
                AIE.AIE_ID AS AIE_ID
            FROM 
                ALUNOS AS ALU, 
                ALUNOS_INSCRITOS_EVENTOS AS AIE,
                EVENTOS AS EVO,
                EVENTOS_MODALIDADES AS EVM,
                MODALIDADES AS MDE,
                CAMPUS AS CAM,
                CURSOS AS CUR
            WHERE 
                ALU.ALU_ID = AIE.FK_ALUNOS_ALU_ID
                AND AIE.FK_EVENTOS_EVO_ID = EVO.EVO_ID
                AND EVM.FK_EVENTOS_EVO_ID = EVO.EVO_ID
                AND EVM.FK_MODALIDADES_MDE_ID = MDE.MDE_ID
                AND EVO.FK_CAMPUS_CAM_ID = CAM.CAM_ID
                AND ALU.FK_CURSOS_CUR_ID = CUR.CUR_ID
                AND AIE.FK_EVENTOS_EVO_ID = :EVO_ID";
                
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':EVO_ID', $EVO_ID);
                $stmt->execute();
                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                
                foreach($result as $row){
                    $alunos_inscritos_eventoModel = new Alunos_Inscritos_EventosModel();
                    $alunos_inscritos_eventoModel->__set('AIE_ID', $row['AIE_ID']);
                    $alunos_inscritos_eventoModel->__set('ALU_NOME', $row['ALU_NOME']);
                    $alunos_inscritos_eventoModel->__set('ALU_PRONTUARIO', $row['ALU_PRONTUARIO']);
                    $alunos_inscritos_eventoModel->__set('ALU_CPF', $row['ALU_CPF']);
                    $alunos_inscritos_eventoModel->__set('ALU_DATA_NASCIMENTO', $row['ALU_DATA_NASCIMENTO']);
                    $alunos_inscritos_eventoModel->__set('ALU_SEXO', $row['ALU_SEXO']);
                    $alunos_inscritos_eventoModel->__set('CUR_NOME', $row['CUR_NOME']);
                    $alunos_inscritos_eventoModel->__set('CAM_NOME', $row['CAM_NOME']);
                    $alunos_inscritos_eventoModel->__set('MDE_NOME', $row['MDE_NOME']);
                    
                    array_push($alunos_inscritos_eventos, $alunos_inscritos_eventoModel);
                }
                return $alunos_inscritos_eventos;
            }
                catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }  
     }    

     public function AlunosInscritosEventos($EVO_ID){

        try{
            $alunos_inscritos_eventos = array();
            $sql = "SELECT ALUNOS.*, CAM_NOME, CUR_NOME, MDE_NOME, AIE_ID
            FROM ALUNOS
            INNER JOIN ALUNOS_INSCRITOS_EVENTOS ON ALUNOS_INSCRITOS_EVENTOS.FK_ALUNOS_ALU_ID = ALU_ID
            INNER JOIN EVENTOS ON EVO_ID = FK_EVENTOS_EVO_ID
            INNER JOIN CAMPUS ON FK_CAMPUS_CAM_ID = CAM_ID
            INNER JOIN CURSOS ON CUR_ID = FK_CURSOS_CUR_ID
            INNER JOIN EVENTOS_MODALIDADES ON EVENTOS_MODALIDADES.FK_EVENTOS_EVO_ID = EVO_ID
            INNER JOIN MODALIDADES ON MDE_ID = FK_MODALIDADES_MDE_ID
            WHERE EVO_ID = :EVO_ID";
            
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':EVO_ID', $EVO_ID);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
            foreach($result as $row){
                $alunos_inscritos_eventoModel = new Alunos_Inscritos_EventosModel();
                $alunos_inscritos_eventoModel->__set('AIE_ID', $row['AIE_ID']);
                $alunos_inscritos_eventoModel->__set('ALU_NOME', $row['ALU_NOME']);
                $alunos_inscritos_eventoModel->__set('ALU_PRONTUARIO', $row['ALU_PRONTUARIO']);
                $alunos_inscritos_eventoModel->__set('ALU_CPF', $row['ALU_CPF']);
                $alunos_inscritos_eventoModel->__set('ALU_DATA_NASCIMENTO', $row['ALU_DATA_NASCIMENTO']);
                $alunos_inscritos_eventoModel->__set('ALU_SEXO', $row['ALU_SEXO']);
                $alunos_inscritos_eventoModel->__set('CUR_NOME', $row['CUR_NOME']);
                $alunos_inscritos_eventoModel->__set('CAM_NOME', $row['CAM_NOME']);
                $alunos_inscritos_eventoModel->__set('MDE_NOME', $row['MDE_NOME']);
                
                array_push($alunos_inscritos_eventos, $alunos_inscritos_eventoModel);
            }
            return $alunos_inscritos_eventos;
        }
            catch(\PDOException $ex){
            header('Location:/error103');
            die();
        }  
 }    


 public function AlunoInscritoEvento($EVO_ID){

    try{
        $aluno_inscrito_evento = array();
        $sql = "SELECT ALUNOS.*, CAM_NOME, CUR_NOME, MDE_NOME, AIE_ID
        FROM ALUNOS
        INNER JOIN ALUNOS_INSCRITOS_EVENTOS ON ALUNOS_INSCRITOS_EVENTOS.FK_ALUNOS_ALU_ID = ALU_ID
        INNER JOIN EVENTOS ON EVO_ID = FK_EVENTOS_EVO_ID
        INNER JOIN CAMPUS ON FK_CAMPUS_CAM_ID = CAM_ID
        INNER JOIN CURSOS ON CUR_ID = FK_CURSOS_CUR_ID
        INNER JOIN EVENTOS_MODALIDADES ON EVENTOS_MODALIDADES.FK_EVENTOS_EVO_ID = EVO_ID
        INNER JOIN MODALIDADES ON MDE_ID = FK_MODALIDADES_MDE_ID
        WHERE EVO_ID = :EVO_ID";
        
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindParam(':EVO_ID', $EVO_ID);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($result as $row){
            $aluno_inscrito_eventoModel = new Aluno_Inscrito_EventosModelS();
            $aluno_inscrito_eventoModel->__set('AIE_ID', $row['AIE_ID']);
            $aluno_inscrito_eventoModel->__set('ALU_NOME', $row['ALU_NOME']);
            $aluno_inscrito_eventoModel->__set('ALU_PRONTUARIO', $row['ALU_PRONTUARIO']);
            $aluno_inscrito_eventoModel->__set('ALU_CPF', $row['ALU_CPF']);
            $aluno_inscrito_eventoModel->__set('ALU_DATA_NASCIMENTO', $row['ALU_DATA_NASCIMENTO']);
            $aluno_inscrito_eventoModel->__set('ALU_SEXO', $row['ALU_SEXO']);
            $aluno_inscrito_eventoModel->__set('CUR_NOME', $row['CUR_NOME']);
            $aluno_inscrito_eventoModel->__set('CAM_NOME', $row['CAM_NOME']);
            $aluno_inscrito_eventoModel->__set('MDE_NOME', $row['MDE_NOME']);
            
            array_push($aluno_inscrito_evento, $aluno_inscrito_eventoModel);
        }
        return $aluno_inscrito_evento;
    }
        catch(\PDOException $ex){
        header('Location:/error103');
        die();
    }  
}    

     public function listarmeuseventos($idAluno){
        try{
            $alunos_inscritos_eventos = array();
            $sql = "SELECT 
                    AI.*,
                    AL.*,
                    EV.EVO_ID,
                    EV.EVO_NOME,
                    EV.EVO_STATUS,
                    EV.EVO_DATA_INICIO,
                    C.CID_NOME,
                    E.EST_SIGLA,
                    EV.FK_CAMPUS_CAM_ID,
                    CA.FK_CIDADES_CID_ID
                FROM 
                    alunos_inscritos_eventos AI, 
                    alunos AL, 
                    eventos EV,
                    cidades C,
                    estados E,
                    campus CA
                WHERE 
                    AI.FK_ALUNOS_ALU_ID = AL.ALU_ID AND
                    AI.FK_EVENTOS_EVO_ID = EV.EVO_ID AND
                    EV.FK_CAMPUS_CAM_ID = CA.CAM_ID AND
                    CA.FK_CIDADES_CID_ID = C.CID_ID AND
                    C.FK_ESTADOS_EST_ID = E.EST_ID AND
                    AI.AIE_ATIVO='1' AND
                    AL.FK_LOGIN_LGN_ID=:idAluno
                ORDER BY AI.AIE_ID ASC";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':idAluno', $idAluno);

            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                foreach($result as $row){
                    $alunos_inscritos_eventosModel = new Alunos_Inscritos_EventosModel();
                    $alunos_inscritos_eventosModel->__set('AIE_ID',$row['AIE_ID']);
                    $alunos_inscritos_eventosModel->__set('EVO_ID',$row['EVO_ID']);
                    $alunos_inscritos_eventosModel->__set('EVO_NOME',$row['EVO_NOME']);
                    $alunos_inscritos_eventosModel->__set('EVO_STATUS',$row['EVO_STATUS']);
                    $alunos_inscritos_eventosModel->__set('EVO_DATA_INICIO',$row['EVO_DATA_INICIO']);
                    $alunos_inscritos_eventosModel->__set('CID_NOME',$row['CID_NOME']);
                    $alunos_inscritos_eventosModel->__set('EST_SIGLA',$row['EST_SIGLA']);

                    array_push($alunos_inscritos_eventos, $alunos_inscritos_eventosModel);
                }
                return $alunos_inscritos_eventos;
        }
        catch(\PDOException $ex){
            header('Location:/error103');
            die();
        }
    }

    public function meuseventos($id){
        try{
            $alunos_inscritos_eventos = array();
            $sql = "SELECT 
                        EV.*,
                        C.CID_NOME,
                        O.ORE_NOME
                    FROM 
                        eventos EV,
                        cidades C,
                        organizadores_eventos O,
                        campus CA
                    WHERE
                        EV.EVO_ID=:id AND
                        EV.FK_ORGANIZADORES_EVENTOS_ORE_ID=O.ORE_ID AND
                        EV.FK_CAMPUS_CAM_ID=CA.CAM_ID AND
                        CA.FK_CIDADES_CID_ID=C.CID_ID";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0){
                    $alunos_inscritos_eventosModel = new Alunos_Inscritos_EventosModel();
                    $alunos_inscritos_eventosModel->__set('EVO_NOME',$result['EVO_NOME']);
                    $alunos_inscritos_eventosModel->__set('EVO_STATUS',$result['EVO_STATUS']);
                    $alunos_inscritos_eventosModel->__set('EVO_DATA_INICIO',$result['EVO_DATA_INICIO']);
                    $alunos_inscritos_eventosModel->__set('EVO_DATA_FIM',$result['EVO_DATA_FIM']);
                    $alunos_inscritos_eventosModel->__set('CID_NOME',$result['CID_NOME']); 
                    $alunos_inscritos_eventosModel->__set('ORE_NOME',$result['ORE_NOME']);

                    array_push($alunos_inscritos_eventos, $alunos_inscritos_eventosModel);
                }
                return $alunos_inscritos_eventos;
        }
        catch(\PDOException $ex){
            header('Location:/error103');
            die();
        }
    }

     public function justificativa($obj){
        try{
            $sql = "insert into alunos_inscritos_eventos(
                        AIE_JUSTIFICATIVA,
                    
                        ) VALUES (
                        :justificativa,
                        )";
                        
            $stmt = $this->getConn()->prepare($sql);
    
            $stmt->bindParam(':justificativa', $obj->__get($AIE_JUSTIFICATIVA));
            $stmt->execute();
        }catch(\PDOException $ex){
            header('Location: /error101');
            die();
        
     }
    }

    
    public function inserir($obj) {
        try {
            // Diretório para salvar os arquivos
            $uploadDir = __DIR__ . '../../../resources/uploads/documentos'; // Ajuste o caminho conforme necessário
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Cria a pasta se não existir
            }
    
            // Processa os arquivos enviados
            $documentos = [
                'AIE_COPIA_RG', 
                'AIE_FOTO_PESSOAL', 
                'AIE_AUTORIZACAO_PAIS', 
                'AIE_BOLETIM_ESCOLAR'
            ];
            $nomesArquivos = [];
    
            foreach ($documentos as $doc) {
                // Tenta processar cada arquivo
                try {
                    if ($_FILES[$doc]['error'] === UPLOAD_ERR_OK) {
                        $arquivoTemp = $_FILES[$doc]['tmp_name'];
                        $nomeArquivo = uniqid() . '_' . basename($_FILES[$doc]['name']);
                        move_uploaded_file($arquivoTemp, $uploadDir . '/' . $nomeArquivo); // Salva o arquivo no diretório
                        $nomesArquivos[$doc] = $nomeArquivo; // Armazena apenas o nome do arquivo
                    } else {
                        throw new Exception("Erro no upload do arquivo '$doc'. Código de erro: " . $_FILES[$doc]['error']);
                    }
                } catch (Exception $e) {
                    // Trate erros de upload de arquivos individualmente
                    throw new Exception("Erro no upload do arquivo '$doc': " . $e->getMessage());
                }
            }
    
            // Insere no banco de dados com os nomes dos arquivos
            $sql = "INSERT INTO alunos_inscritos_eventos (
                        AIE_COPIA_RG,
                        AIE_ATIVO,
                        AIE_FOTO_PESSOAL,
                        AIE_AUTORIZACAO_PAIS,
                        AIE_HOMOLOGA,
                        AIE_JUSTIFICATIVA,
                        AIE_BOLETIM_ESCOLAR,
                        FK_ALUNOS_ALU_ID,
                        FK_EVENTOS_EVO_ID
                    ) VALUES (
                        :AIE_COPIA_RG,
                        :AIE_ATIVO,
                        :AIE_FOTO_PESSOAL,
                        :AIE_AUTORIZACAO_PAIS,
                        :AIE_HOMOLOGA,
                        :AIE_JUSTIFICATIVA,
                        :AIE_BOLETIM_ESCOLAR,
                        :FK_ALUNOS_ALU_ID,
                        :FK_EVENTOS_EVO_ID
                    )";
    
            $stmt = $this->getConn()->prepare($sql);
    
            // Bind dos valores no SQL
            $stmt->bindValue(':AIE_COPIA_RG', $nomesArquivos['AIE_COPIA_RG']);
            $stmt->bindValue(':AIE_FOTO_PESSOAL', $nomesArquivos['AIE_FOTO_PESSOAL']);
            $stmt->bindValue(':AIE_AUTORIZACAO_PAIS', $nomesArquivos['AIE_AUTORIZACAO_PAIS']);
            $stmt->bindValue(':AIE_BOLETIM_ESCOLAR', $nomesArquivos['AIE_BOLETIM_ESCOLAR']);
            $stmt->bindValue(':AIE_ATIVO', $obj->__get('AIE_ATIVO'));
            $stmt->bindValue(':AIE_HOMOLOGA', $obj->__get('AIE_HOMOLOGA'));
            $stmt->bindValue(':AIE_JUSTIFICATIVA', $obj->__get('AIE_JUSTIFICATIVA'));
            $stmt->bindValue(':FK_ALUNOS_ALU_ID', $obj->__get('FK_ALUNOS_ALU_ID'));
            $stmt->bindValue(':FK_EVENTOS_EVO_ID', $obj->__get('FK_EVENTOS_EVO_ID'));
    
            // Executa a inserção
            $stmt->execute();
        } catch (Exception $e) {
            die("Erro encontrado: " . $e->getMessage());
        }
    }
    
    
        public function desativarInscricao($AIE_ID, $AIE_JUSTIFICATIVA) {
            try {
                $sql = "UPDATE alunos_inscritos_eventos SET 
                    AIE_ATIVO = 0,
                    AIE_JUSTIFICATIVA = :AIE_JUSTIFICATIVA
                    WHERE AIE_ID = :AIE_ID";

                $stmt = $this->getConn()->prepare($sql);
                
                $stmt->bindValue(':AIE_JUSTIFICATIVA', $AIE_JUSTIFICATIVA);
                $stmt->bindValue(':AIE_ID', $AIE_ID);

                // Executa o sql
                $stmt->execute();

            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }
        public function excluir($obj){

        }

        public function getNomeEventoPorAIE($AIE_ID) {
            try {
                // Consulta para buscar o nome do evento com base no AIE_ID
                $sql = "SELECT EVO.EVO_NOME 
                          FROM alunos_inscritos_eventos AIE
                          JOIN eventos EVO ON EVO.EVO_ID = AIE.FK_EVENTOS_EVO_ID
                          WHERE AIE.AIE_ID = :AIE_ID";
                $stmt = $this->getConn()->prepare($sql);
        
                $stmt->bindParam(':AIE_ID', $AIE_ID, \PDO::PARAM_INT);
        
                $stmt->execute();
        
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                return $result['EVO_NOME'];
            } catch (PDOException $e) {
                throw new Exception("Erro ao buscar nome do evento: " . $e->getMessage());
            }
        }
        
        
        
        public function obterNomeArquivo($AIE_ID, $documento) {
            // SQL para recuperar o nome do arquivo
            $sql = "SELECT $documento FROM alunos_inscritos_eventos WHERE AIE_ID = :AIE_ID";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':AIE_ID', $AIE_ID);
            $stmt->execute();
            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($resultado) {
                return $resultado[$documento]; // Retorna o nome do arquivo
            } else {
                return null;
            }
        }

        public function salvarDocumento($file, $AIE_ID, $documento, $nomeArquivo) {
        
            try {
                // Define o caminho completo do arquivo no diretório de destino
                $uploadDir = __DIR__ . '../../../resources/uploads/documentos'; 
                $nomeModificado = uniqid() . '_' . $nomeArquivo;
                $caminhoDestino = $uploadDir . '/' . $nomeModificado;
                
                // Move o arquivo do diretório temporário para o diretório de destino
                if (move_uploaded_file($file['tmp_name'], $caminhoDestino)) {
                    // Se o arquivo for movido com sucesso, atualiza o banco de dados com o nome do arquivo
                    $this->atualizarDocumento($AIE_ID, $documento, $nomeModificado); // Salva o nome do arquivo no banco
                } else {
                    throw new Exception("Erro ao mover o arquivo para o diretório.");
                }
            } catch (Exception $e) {
                // Exibe erro caso ocorra
                die('Erro: ' . $e->getMessage());
            }
        }        

        public function listarDocumentosPorAIE_ID($AIE_ID) {
            try {
                // Preparando a consulta SQL
                $sql = "SELECT 
                            AIE_COPIA_RG,
                            AIE_FOTO_PESSOAL,
                            AIE_AUTORIZACAO_PAIS,
                            AIE_BOLETIM_ESCOLAR
                        FROM alunos_inscritos_eventos
                        WHERE AIE_ID = :AIE_ID";  
        
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':AIE_ID', $AIE_ID, \PDO::PARAM_INT);
                $stmt->execute();
                
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                
                return $result; 
            
            } catch (\PDOException $ex) {
                echo "Erro ao executar consulta: " . $ex->getMessage();
                header('Location:/error103');
                die();
            }
        }
                
        
        public function atualizarDocumento($AIE_ID, $documento, $nomeArquivo) {
            try {
                // Atualiza o banco de dados com o nome do arquivo
                $sql = "UPDATE alunos_inscritos_eventos 
                        SET $documento = :nome_arquivo
                        WHERE AIE_ID = :AIE_ID";
        
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':nome_arquivo', $nomeArquivo);
                $stmt->bindParam(':AIE_ID', $AIE_ID);
                $stmt->execute();
        
            } catch (\PDOException $ex) {
                echo "Erro ao executar consulta: " . $ex->getMessage();
                header('Location:/error103');
                die();
            }
        }
                
        
        
        public function alterar($obj){
        }

        public function buscarPorId($idAluno){
            try{
                $sql = "SELECT 
                            AI.*,
                            AL.*
                        FROM alunos_inscritos_eventos AI, alunos AL
                        WHERE 
                            AI.FK_ALUNOS_ALU_ID = AL.ALU_ID AND
                            AIE_ID=:idAluno
                        ORDER BY AIE_ID ASC";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':idAluno', $idAluno);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $alunos_inscritos_eventosModel = new Alunos_Inscritos_EventosModel();
                    $alunos_inscritos_eventosModel->__set('AIE_ID',$result['AIE_ID']);
                    $alunos_inscritos_eventosModel->__set('ALU_NOME',$result['ALU_NOME']);
                    $alunos_inscritos_eventosModel->__set('ALU_PRONTUARIO',$result['ALU_PRONTUARIO']);
                    $alunos_inscritos_eventosModel->__set('AIE_COPIA_RG',$result['AIE_COPIA_RG']);
                    $alunos_inscritos_eventosModel->__set('AIE_AUTORIZACAO_PAIS',$result['AIE_AUTORIZACAO_PAIS']);
                    $alunos_inscritos_eventosModel->__set('AIE_BOLETIM_ESCOLAR',$result['AIE_BOLETIM_ESCOLAR']);
                    $alunos_inscritos_eventosModel->__set('AIE_FOTO_PESSOAL',$result['AIE_FOTO_PESSOAL']);

                    return $alunos_inscritos_eventosModel;
                } else{
                    return null;
                }
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }
        }

        public function ListarAlunosInscritosEventos($idEvento){
            try{
                $alunos_inscritos_eventos = array();
                $sql = "SELECT 
                            AI.*,
                            AL.*
                        FROM alunos_inscritos_eventos AI, alunos AL
                        WHERE 
                            AI.FK_ALUNOS_ALU_ID = AL.ALU_ID AND
                            AI.FK_EVENTOS_EVO_ID=:idEvento
                        ";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':idEvento', $idEvento);

                $stmt->execute();

                $result = $stmt->fetchALL(\PDO::FETCH_ASSOC);

                foreach($result as $row){
                    $alunos_inscritos_eventoModel = new Alunos_Inscritos_EventosModel();
                    $alunos_inscritos_eventoModel->__set('AIE_ID',$row['AIE_ID']);
                    $alunos_inscritos_eventoModel->__set('ALU_NOME',$row['ALU_NOME']);
                    $alunos_inscritos_eventoModel->__set('ALU_PRONTUARIO',$row['ALU_PRONTUARIO']);
                    $alunos_inscritos_eventoModel->__set('AIE_COPIA_RG',$row['AIE_COPIA_RG']);
                    $alunos_inscritos_eventoModel->__set('AIE_AUTORIZACAO_PAIS',$row['AIE_AUTORIZACAO_PAIS']);
                    $alunos_inscritos_eventoModel->__set('AIE_BOLETIM_ESCOLAR',$row['AIE_BOLETIM_ESCOLAR']);
                    $alunos_inscritos_eventoModel->__set('AIE_FOTO_PESSOAL',$row['AIE_FOTO_PESSOAL']);
                    
                    array_push($alunos_inscritos_eventos, $alunos_inscritos_eventoModel);
                }
                return $alunos_inscritos_eventos;
                
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }
        }
    }
    