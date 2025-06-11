<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\AlunosModel; //Linkando o model ao DAO

    class AlunosDAO extends DAO{

        public function listar(){
        }
        
        public function inserir($obj){

        try {
            $ALU_NOME = $obj->__get('ALU_NOME');
            $ALU_NOME_SOCIAL = $obj->__get('ALU_NOME_SOCIAL');
            $ALU_DATA_NASCIMENTO = $obj->__get('ALU_DATA_NASCIMENTO');
            $ALU_SEXO = $obj->__get('ALU_SEXO');
            $ALU_ETNIA = $obj->__get('ALU_ETNIA');
            $ALU_CPF = $obj->__get('ALU_CPF');
            $ALU_RG = $obj->__get('ALU_RG');
            $ALU_FOTO = $obj->__get('ALU_FOTO');
            $ALU_TELEFONE = $obj->__get('ALU_TELEFONE');
            $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');
            $ALU_NUMERO = $obj->__get('ALU_NUMERO');
            $ALU_RUA = $obj->__get('ALU_RUA');
            $ALU_BAIRRO = $obj->__get('ALU_BAIRRO');
            $ALU_CEP = $obj->__get('ALU_CEP');
            $ALU_COMPLEMENTO = $obj->__get('ALU_COMPLEMENTO');
            $ALU_PRONTUARIO = $obj->__get('ALU_PRONTUARIO');
            $FK_CURSOS_CUR_ID = $obj->__get('FK_CURSOS_CUR_ID');
            $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');

            $sql = "INSERT INTO alunos(
                        ALU_NOME,
                        ALU_NOME_SOCIAL,
                        ALU_DATA_NASCIMENTO,
                        ALU_SEXO,
                        ALU_ETNIA,
                        ALU_CPF,
                        ALU_RG,
                        ALU_FOTO,
                        ALU_TELEFONE,
                        FK_CIDADES_CID_ID,
                        ALU_RUA,
                        ALU_NUMERO,
                        ALU_BAIRRO,
                        ALU_CEP,
                        ALU_COMPLEMENTO,
                        ALU_PRONTUARIO,
                        FK_CURSOS_CUR_ID,
                        FK_LOGIN_LGN_ID
                        ) VALUES (
                        :ALU_NOME,
                        :ALU_NOME_SOCIAL,
                        :ALU_DATA_NASCIMENTO,
                        :ALU_SEXO,
                        :ALU_ETNIA,
                        :ALU_CPF,
                        :ALU_RG,
                        :ALU_FOTO,
                        :ALU_TELEFONE,
                        :FK_CIDADES_CID_ID,
                        :ALU_RUA,
                        :ALU_NUMERO,
                        :ALU_BAIRRO,
                        :ALU_CEP,
                        :ALU_COMPLEMENTO,
                        :ALU_PRONTUARIO,
                        :FK_CURSOS_CUR_ID,
                        :FK_LOGIN_LGN_ID
                    )";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':ALU_NOME', $ALU_NOME);
            $stmt->bindParam(':ALU_NOME_SOCIAL', $ALU_NOME_SOCIAL);
            $stmt->bindParam(':ALU_DATA_NASCIMENTO', $ALU_DATA_NASCIMENTO);
            $stmt->bindParam(':ALU_SEXO', $ALU_SEXO);
            $stmt->bindParam(':ALU_ETNIA', $ALU_ETNIA);
            $stmt->bindParam(':ALU_CPF', $ALU_CPF);
            $stmt->bindParam(':ALU_RG', $ALU_RG);
            $stmt->bindParam(':ALU_FOTO', $ALU_FOTO);
            $stmt->bindParam(':ALU_TELEFONE', $ALU_TELEFONE);
            $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
            $stmt->bindParam(':ALU_RUA', $ALU_RUA);
            $stmt->bindParam(':ALU_NUMERO', $ALU_NUMERO);
            $stmt->bindParam(':ALU_BAIRRO', $ALU_BAIRRO);
            $stmt->bindParam(':ALU_CEP', $ALU_CEP);
            $stmt->bindParam(':ALU_COMPLEMENTO', $ALU_COMPLEMENTO);
            $stmt->bindParam(':ALU_PRONTUARIO', $ALU_PRONTUARIO);
            $stmt->bindParam(':FK_CURSOS_CUR_ID', $FK_CURSOS_CUR_ID);
            $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);

            
            $stmt->execute();  
            }
            catch(\PDOException $ex) {
                if($ALU_NOME==NULL) {
                    header('Location:/cadastrar/aluno?erro=1');
                    die();
                }
            }
        }
        public function excluir($obj){

        }

        public function alterar($obj){

            try {
                $ALU_NOME = $obj->__get('ALU_NOME');
                $ALU_NOME_SOCIAL = $obj->__get('ALU_NOME_SOCIAL');
                $ALU_DATA_NASCIMENTO = $obj->__get('ALU_DATA_NASCIMENTO');
                $ALU_SEXO = $obj->__get('ALU_SEXO');
                $ALU_ETNIA = $obj->__get('ALU_ETNIA');
                $ALU_CPF = $obj->__get('ALU_CPF');
                $ALU_RG = $obj->__get('ALU_RG');
                $ALU_FOTO = $obj->__get('ALU_FOTO');
                $ALU_TELEFONE = $obj->__get('ALU_TELEFONE');
                $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');
                $ALU_NUMERO = $obj->__get('ALU_NUMERO');
                $ALU_RUA = $obj->__get('ALU_RUA');
                $ALU_BAIRRO = $obj->__get('ALU_BAIRRO');
                $ALU_CEP = $obj->__get('ALU_CEP');
                $ALU_COMPLEMENTO = $obj->__get('ALU_COMPLEMENTO');
                $ALU_PRONTUARIO = $obj->__get('ALU_PRONTUARIO');
                $FK_CURSOS_CUR_ID = $obj->__get('FK_CURSOS_CUR_ID');
                $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');
        
                
                $sql = "UPDATE alunos SET 
                ALU_NOME = :ALU_NOME,
                ALU_NOME_SOCIAL = :ALU_NOME_SOCIAL,
                ALU_DATA_NASCIMENTO = :ALU_DATA_NASCIMENTO,
                ALU_SEXO = :ALU_SEXO,
                ALU_ETNIA = :ALU_ETNIA,
                ALU_CPF = :ALU_CPF,
                ALU_RG = :ALU_RG,
                ALU_FOTO = :ALU_FOTO,
                ALU_TELEFONE = :ALU_TELEFONE,
                FK_CIDADES_CID_ID = :FK_CIDADES_CID_ID,
                ALU_RUA = :ALU_RUA,
                ALU_NUMERO = :ALU_NUMERO,
                ALU_BAIRRO = :ALU_BAIRRO,
                ALU_CEP = :ALU_CEP,
                ALU_COMPLEMENTO = :ALU_COMPLEMENTO,
                ALU_PRONTUARIO = :ALU_PRONTUARIO,
                FK_CURSOS_CUR_ID = :FK_CURSOS_CUR_ID
            WHERE FK_LOGIN_LGN_ID = :FK_LOGIN_LGN_ID";

            
                $stmt = $this->getConn()->prepare($sql);
        
                $stmt->bindParam(':ALU_NOME', $ALU_NOME);
                $stmt->bindParam(':ALU_NOME_SOCIAL', $ALU_NOME_SOCIAL);
                $stmt->bindParam(':ALU_DATA_NASCIMENTO', $ALU_DATA_NASCIMENTO);
                $stmt->bindParam(':ALU_SEXO', $ALU_SEXO);
                $stmt->bindParam(':ALU_ETNIA', $ALU_ETNIA);
                $stmt->bindParam(':ALU_CPF', $ALU_CPF);
                $stmt->bindParam(':ALU_RG', $ALU_RG);
                $stmt->bindParam(':ALU_FOTO', $ALU_FOTO);
                $stmt->bindParam(':ALU_TELEFONE', $ALU_TELEFONE);
                $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
                $stmt->bindParam(':ALU_RUA', $ALU_RUA);
                $stmt->bindParam(':ALU_NUMERO', $ALU_NUMERO);
                $stmt->bindParam(':ALU_BAIRRO', $ALU_BAIRRO);
                $stmt->bindParam(':ALU_CEP', $ALU_CEP);
                $stmt->bindParam(':ALU_COMPLEMENTO', $ALU_COMPLEMENTO);
                $stmt->bindParam(':ALU_PRONTUARIO', $ALU_PRONTUARIO);
                $stmt->bindParam(':FK_CURSOS_CUR_ID', $FK_CURSOS_CUR_ID);
                $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
                $stmt->execute();
        
            } catch (\PDOException $ex) {
                 echo "Erro ao executar a atualização: " . $ex->getMessage();
                die();
            }
        
        }
        
        public function buscarPorId($id){
            try{
                
                $sql = "SELECT * FROM alunos WHERE id=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $alunoModel = new AlunosModel();
                    $alunoModel->__set('ALU_ID',$result['ALU_ID']);
                    $alunoModel->__set('ALU_NOME',$result['ALU_NOME']);
                    $alunoModel->__set('ALU_NOME_SOCIAL',$result['ALU_NOME_SOCIAL']);
                    $alunoModel->__set('ALU_DATA_NASCIMENTO',$result['ALU_DATA_NASCIMENTO']);
                    $alunoModel->__set('ALU_SEXO',$result['ALU_SEXO']);
                    $alunoModel->__set('ALU_ETNIA',$result['ALU_ETNIA']);
                    $alunoModel->__set('ALU_CPF',$result['ALU_CPF']);
                    $alunoModel->__set('ALU_RG',$result['ALU_RG']);
                    $alunoModel->__set('ALU_FOTO',$result['ALU_FOTO']);
                    $alunoModel->__set('ALU_TELEFONE',$result['ALU_TELEFONE']);
                    $alunoModel->__set('FK_CIDADES_CID_ID',$result['FK_CIDADES_CID_ID']);
                    $alunoModel->__set('ALU_RUA',$result['ALU_RUA']);
                    $alunoModel->__set('ALU_BAIRRO',$result['ALU_BAIRRO']);
                    $alunoModel->__set('ALU_CEP',$result['ALU_CEP']);
                    $alunoModel->__set('ALU_COMPLEMENTO',$result['ALU_COMPLEMENTO']);
                    $alunoModel->__set('ALU_PRONTUARIO',$result['ALU_PRONTUARIO']);
                    $alunoModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                    $alunoModel->__set('ALU_CAMPUS',$result['ALU_CAMPUS']);
                    $alunoModel->__set('FK_CURSOS_CUR_ID',$result['FK_CURSOS_CUR_ID']);
                    

                    return $alunoModel;
                } else{
                    return null;
                }
                
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }

        }

        public function BuscarAlunoLogado($id){
            try{
                $sql = "SELECT 
                a.*,
                l.LGN_EMAIL, 
                c.CAM_NOME,
                ci.CID_NOME
                
                FROM 
                alunos a,
                login l,
                campus c,
                cidades ci
                
                WHERE
                a.FK_LOGIN_LGN_ID=l.LGN_ID AND
                a.FK_CIDADES_CID_ID=c.FK_CIDADES_CID_ID AND
                ci.CID_ID=a.FK_CIDADES_CID_ID AND
                a.FK_LOGIN_LGN_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $alunoModel = new AlunosModel();
                    $alunoModel->__set('ALU_ID', $result['ALU_ID']);
                    $alunoModel->__set('ALU_NOME', $result['ALU_NOME']);
                    $alunoModel->__set('ALU_NOME_SOCIAL', $result['ALU_NOME_SOCIAL']);
                    $alunoModel->__set('ALU_DATA_NASCIMENTO', $result['ALU_DATA_NASCIMENTO']);
                    $alunoModel->__set('ALU_SEXO', $result['ALU_SEXO']);
                    $alunoModel->__set('ALU_ETNIA', $result['ALU_ETNIA']);
                    $alunoModel->__set('ALU_CPF', $result['ALU_CPF']);
                    $alunoModel->__set('ALU_RG', $result['ALU_RG']);
                    $alunoModel->__set('ALU_FOTO', $result['ALU_FOTO']);
                    $alunoModel->__set('ALU_TELEFONE', $result['ALU_TELEFONE']);
                    $alunoModel->__set('FK_CIDADES_CID_ID', $result['FK_CIDADES_CID_ID']);
                    $alunoModel->__set('ALU_RUA',$result['ALU_RUA']);
                    $alunoModel->__set('ALU_NUMERO', $result['ALU_NUMERO']);
                    $alunoModel->__set('ALU_BAIRRO', $result['ALU_BAIRRO']);
                    $alunoModel->__set('ALU_CEP', $result['ALU_CEP']);
                    $alunoModel->__set('ALU_COMPLEMENTO', $result['ALU_COMPLEMENTO']);
                    $alunoModel->__set('ALU_PRONTUARIO', $result['ALU_PRONTUARIO']);
                    $alunoModel->__set('FK_CURSOS_CUR_ID', $result['FK_CURSOS_CUR_ID']);
                    $alunoModel->__set('FK_LOGIN_LGN_ID',$result[ 'FK_LOGIN_LGN_ID']);
                    $alunoModel->__set('CAM_NOME', $result['CAM_NOME']);
                    $alunoModel->__set('LGN_EMAIL', $result['LGN_EMAIL']);
                    $alunoModel->__set('CID_NOME', $result['CID_NOME']);


                            
                    return $alunoModel;
                } else{
                    return null;
                }
                
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }

        }
        
        public function alterarinfoaluno($obj){

            try {
               
                $ALU_NOME_SOCIAL = $obj->__get('ALU_NOME_SOCIAL');
                $ALU_DATA_NASCIMENTO = $obj->__get('ALU_DATA_NASCIMENTO');
                $ALU_FOTO = $obj->__get('ALU_FOTO');
                $ALU_TELEFONE = $obj->__get('ALU_TELEFONE');
                $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');
                $ALU_NUMERO = $obj->__get('ALU_NUMERO');
                $ALU_RUA = $obj->__get('ALU_RUA');
                $ALU_CEP = $obj->__get('ALU_CEP');
                $ALU_COMPLEMENTO = $obj->__get('ALU_COMPLEMENTO');
                $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');
        
                
                $sql = "UPDATE alunos SET 
                
                ALU_NOME_SOCIAL = :ALU_NOME_SOCIAL,
                ALU_DATA_NASCIMENTO = :ALU_DATA_NASCIMENTO,
                ALU_FOTO = :ALU_FOTO,
                ALU_TELEFONE = :ALU_TELEFONE,
                FK_CIDADES_CID_ID = :FK_CIDADES_CID_ID,
                ALU_RUA = :ALU_RUA,
                ALU_NUMERO = :ALU_NUMERO,
                ALU_CEP = :ALU_CEP,
                ALU_COMPLEMENTO = :ALU_COMPLEMENTO
            WHERE FK_LOGIN_LGN_ID = :FK_LOGIN_LGN_ID";

            
                $stmt = $this->getConn()->prepare($sql);
        
                
                $stmt->bindParam(':ALU_NOME_SOCIAL', $ALU_NOME_SOCIAL);
                $stmt->bindParam(':ALU_DATA_NASCIMENTO', $ALU_DATA_NASCIMENTO);
                $stmt->bindParam(':ALU_FOTO', $ALU_FOTO);
                $stmt->bindParam(':ALU_TELEFONE', $ALU_TELEFONE);
                $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
                $stmt->bindParam(':ALU_RUA', $ALU_RUA);
                $stmt->bindParam(':ALU_NUMERO', $ALU_NUMERO);
                $stmt->bindParam(':ALU_CEP', $ALU_CEP);
                $stmt->bindParam(':ALU_COMPLEMENTO', $ALU_COMPLEMENTO);
                $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
                $stmt->execute();
        
            } catch (\PDOException $ex) {
                 echo "Erro ao executar a atualização: " . $ex->getMessage();
                die();
            
        }
        
        }
        
    }