<?php

    namespace App\DAO;

    use App\DAO;
    use App\Model\Organizadores_EventosModel; //Linkando o model ao DAO

    class Organizadores_EventosDAO extends DAO{
        
        public function listar(){
            //try{
                $organizadores_eventos = array();

                $sql = "SELECT                      
                            OE.*,
                            CA.CAM_NOME,
                            CD.CID_NOME,
                            LG.LGN_ATIVO 
                        FROM 
                            organizadores_eventos OE, 
                            campus CA,
                            cidades CD,
                            login LG
                        WHERE 
                            OE.FK_CAMPUS_CAM_ID = CA.CAM_ID
                        AND
                            OE.FK_CIDADES_CID_ID = CD.CID_ID
                        AND
                            OE.FK_LOGIN_LGN_ID = LG.LGN_ID
                        ORDER BY 
                            OE.ORE_ID ASC";

                //$sql = "SELECT * FROM organizadores_eventos ORDER BY ORE_ID DESC";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($result as $row){
                    $organizador_evento = new Organizadores_EventosModel();
                    $organizador_evento->__set('ORE_ID',$row['ORE_ID']);
                    $organizador_evento->__set('ORE_NOME',$row['ORE_NOME']);
                    $organizador_evento->__set('CAM_NOME',$row['CAM_NOME']);
                    $organizador_evento->__set('LGN_ATIVO', $row['LGN_ATIVO']);

                    array_push($organizadores_eventos,$organizador_evento);
                }
                return $organizadores_eventos;

            /* }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }  */     
        }

        public function inserir($obj){

            $ORE_CPF                = $obj->__get('ORE_CPF');
            $ORE_TELEFONE           = $obj->__get('ORE_TELEFONE');
            $ORE_SEXO               = $obj->__get('ORE_SEXO');
            $ORE_ETNIA              = $obj->__get('ORE_ETNIA');
            $ORE_PRONTUARIO         = $obj->__get('ORE_PRONTUARIO');
            $ORE_NOME               = $obj->__get('ORE_NOME');
            $ORE_FOTO               = $obj->__get('ORE_FOTO');
            $ORE_RG                 = $obj->__get('ORE_RG');
            $ORE_NOME_SOCIAL        = $obj->__get('ORE_NOME_SOCIAL');
            $ORE_DATA_NASCIMENTO    = $obj->__get('ORE_DATA_NASCIMENTO');
            $ORE_CEP                = $obj->__get('ORE_CEP');
            $ORE_BAIRRO             = $obj->__get('ORE_BAIRRO');
            $ORE_RUA                = $obj->__get('ORE_RUA');
            $ORE_COMPLEMENTO        = $obj->__get('ORE_COMPLEMENTO');
            
            $FK_LOGIN_LGN_ID   = $obj->__get('FK_LOGIN_LGN_ID')[0];
            $FK_CAMPUS_CAM_ID  = $obj->__get('FK_CAMPUS_CAM_ID');
            $FK_CIDADES_CID_ID  = $obj->__get('FK_CIDADES_CID_ID');

            /*
            $sql = "INSERT INTO organizadores_eventos(
                FK_LOGIN_LGN_ID,
                FK_CAMPUS_CAM_ID,
                ORE_CPF,
                ORE_TELEFONE,
                ORE_SEXO,
                ORE_ETNIA,
                ORE_PRONTUARIO,
                ORE_NOME,
                ORE_FOTO,
                ORE_RG,
                ORE_NOME_SOCIAL
                )                         
                VALUES (
                '" . $FK_LOGIN_LGN_ID . "',
                '" . $FK_CAMPUS_CAM_ID . "',
                '" . $ORE_CPF . "',
                '" . $ORE_TELEFONE . "',
                '" . $ORE_SEXO . "',
                '" . $ORE_ETNIA . "',
                '" . $ORE_PRONTUARIO . "',
                '" . $ORE_NOME . "',
                '" . $ORE_FOTO . "',
                '" . $ORE_RG . "',
                '" . $ORE_NOME_SOCIAL . "')";

            echo ($sql);
            exit();
            */
            $sql = "INSERT INTO organizadores_eventos(
                FK_LOGIN_LGN_ID,
                FK_CAMPUS_CAM_ID,
                FK_CIDADES_CID_ID,
                ORE_CPF,
                ORE_TELEFONE,
                ORE_SEXO,
                ORE_ETNIA,
                ORE_PRONTUARIO,
                ORE_NOME,
                ORE_FOTO,
                ORE_RG,
                ORE_DATA_NASCIMENTO,
                ORE_CEP,
                ORE_BAIRRO,
                ORE_RUA,
                ORE_COMPLEMENTO,
                ORE_NOME_SOCIAL
                )                         
                VALUES (
                :FK_LOGIN_LGN_ID,
                :FK_CAMPUS_CAM_ID,
                :FK_CIDADES_CID_ID,
                :ORE_CPF,
                :ORE_TELEFONE,
                :ORE_SEXO,
                :ORE_ETNIA,
                :ORE_PRONTUARIO,
                :ORE_NOME,
                :ORE_FOTO,
                :ORE_RG,
                :ORE_DATA_NASCIMENTO,
                :ORE_CEP,
                :ORE_BAIRRO,
                :ORE_RUA,
                :ORE_COMPLEMENTO,
                :ORE_NOME_SOCIAL               
            )";
                    
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
            $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID); 
            $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
            $stmt->bindParam(':ORE_CPF', $ORE_CPF);
            $stmt->bindParam(':ORE_TELEFONE', $ORE_TELEFONE);
            $stmt->bindParam(':ORE_SEXO', $ORE_SEXO);
            $stmt->bindParam(':ORE_ETNIA', $ORE_ETNIA);
            $stmt->bindParam(':ORE_PRONTUARIO', $ORE_PRONTUARIO);
            $stmt->bindParam(':ORE_NOME', $ORE_NOME);
            $stmt->bindParam(':ORE_FOTO', $ORE_FOTO);
            $stmt->bindParam(':ORE_RG', $ORE_RG);
            $stmt->bindParam(':ORE_DATA_NASCIMENTO', $ORE_DATA_NASCIMENTO);
            $stmt->bindParam(':ORE_NOME_SOCIAL', $ORE_NOME_SOCIAL);
            $stmt->bindParam(':ORE_CEP', $ORE_CEP);
            $stmt->bindParam(':ORE_BAIRRO', $ORE_BAIRRO);
            $stmt->bindParam(':ORE_RUA', $ORE_RUA);
            $stmt->bindParam(':ORE_COMPLEMENTO', $ORE_COMPLEMENTO);

            $stmt->execute();
        }

        public function excluir($obj){

        }

        public function alterar($obj){

            try{
                $ORE_ID = $obj->__get('ORE_ID');
                $ORE_NOME = $obj->__get('ORE_NOME');
                $ORE_CPF = $obj->__get('ORE_CPF');
                $ORE_TELEFONE = $obj->__get('ORE_TELEFONE');
                $ORE_SEXO = $obj->__get('ORE_SEXO');
                $ORE_ETNIA = $obj->__get('ORE_ETNIA');
                $ORE_PRONTUARIO = $obj->__get('ORE_PRONTUARIO');
                $ORE_FOTO = $obj->__get('ORE_FOTO');
                $ORE_RG = $obj->__get('ORE_RG');
                $ORE_DATA_NASCIMENTO = $obj->__get('ORE_DATA_NASCIMENTO');
                $ORE_NOME_SOCIAL = $obj->__get('ORE_NOME_SOCIAL');
                $ORE_CEP = $obj->__get('ORE_CEP');
                $ORE_BAIRRO = $obj->__get('ORE_BAIRRO');
                $ORE_RUA = $obj->__get('ORE_RUA');
                $ORE_COMPLEMENTO = $obj->__get('ORE_COMPLEMENTO');
                $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');
                $FK_CAMPUS_CAM_ID = $obj->__get('FK_CAMPUS_CAM_ID');
                $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');
            
                $sql = "UPDATE organizadores_eventos SET 

                    ORE_ID=:ORE_ID, 
                    ORE_NOME=:ORE_NOME,
                    ORE_CPF=:ORE_CPF,
                    ORE_TELEFONE=:ORE_TELEFONE,
                    ORE_SEXO=:ORE_SEXO,
                    ORE_ETNIA=:ORE_ETNIA,
                    ORE_PRONTUARIO=:ORE_PRONTUARIO,
                    ORE_FOTO=:ORE_FOTO,
                    ORE_RG=:ORE_RG,
                    ORE_DATA_NASCIMENTO=:ORE_DATA_NASCIMENTO,
                    ORE_NOME_SOCIAL=:ORE_NOME_SOCIAL,
                    ORE_CEP=:ORE_CEP,
                    ORE_BAIRRO=:ORE_BAIRRO,
                    ORE_RUA=:ORE_RUA,
                    ORE_COMPLEMENTO=:ORE_COMPLEMENTO,
                    FK_LOGIN_LGN_ID=:FK_LOGIN_LGN_ID,
                    FK_CAMPUS_CAM_ID=:FK_CAMPUS_CAM_ID,
                    FK_CIDADES_CID_ID=:FK_CIDADES_CID_ID
                    
                    WHERE
                    ORE_ID=:ORE_ID";
    
                    $stmt = $this->getConn()->prepare($sql);
    
                    $stmt->bindParam(':ORE_ID', $ORE_ID);
                    $stmt->bindParam(':ORE_NOME', $ORE_NOME);
                    $stmt->bindParam(':ORE_CPF', $ORE_CPF);
                    $stmt->bindParam(':ORE_TELEFONE', $ORE_TELEFONE);
                    $stmt->bindParam(':ORE_SEXO', $ORE_SEXO);
                    $stmt->bindParam(':ORE_ETNIA', $ORE_ETNIA);
                    $stmt->bindParam(':ORE_PRONTUARIO', $ORE_PRONTUARIO);
                    $stmt->bindParam(':ORE_FOTO', $ORE_FOTO);
                    $stmt->bindParam(':ORE_RG', $ORE_RG);
                    $stmt->bindParam(':ORE_DATA_NASCIMENTO', $ORE_DATA_NASCIMENTO);
                    $stmt->bindParam(':ORE_NOME_SOCIAL', $ORE_NOME_SOCIAL);
                    $stmt->bindParam(':ORE_CEP', $ORE_CEP);
                    $stmt->bindParam(':ORE_BAIRRO', $ORE_BAIRRO);
                    $stmt->bindParam(':ORE_RUA', $ORE_RUA);
                    $stmt->bindParam(':ORE_COMPLEMENTO', $ORE_COMPLEMENTO);
                    $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
                    $stmt->bindParam(':FK_CAMPUS_CAM_ID', $FK_CAMPUS_CAM_ID); 
                    $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
        
                    $stmt->execute();
            }
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            } 
        }


        public function alterarinfoorganizador($obj){

           try{
                $ORE_NOME_SOCIAL = $obj->__get('ORE_NOME_SOCIAL');
                $ORE_DATA_NASCIMENTO = $obj->__get('ORE_DATA_NASCIMENTO');
                $ORE_FOTO = $obj->__get('ORE_FOTO');
                $ORE_TELEFONE = $obj->__get('ORE_TELEFONE');
                $FK_CIDADES_CID_ID = $obj->__get('FK_CIDADES_CID_ID');
                $ORE_RUA = $obj->__get('ORE_RUA');
                $ORE_CEP = $obj->__get('ORE_CEP');
                $ORE_BAIRRO = $obj->__get('ORE_BAIRRO');
                $ORE_COMPLEMENTO = $obj->__get('ORE_COMPLEMENTO');
                $FK_LOGIN_LGN_ID = $obj->__get('FK_LOGIN_LGN_ID');
        
                
                $sql = "UPDATE organizadores_eventos SET 
                
                ORE_NOME_SOCIAL = :ORE_NOME_SOCIAL,
                ORE_DATA_NASCIMENTO = :ORE_DATA_NASCIMENTO,
                ORE_FOTO = :ORE_FOTO,
                ORE_TELEFONE = :ORE_TELEFONE,
                FK_CIDADES_CID_ID = :FK_CIDADES_CID_ID,
                ORE_RUA = :ORE_RUA,
                ORE_BAIRRO = :ORE_BAIRRO,
                ORE_CEP = :ORE_CEP,
                ORE_COMPLEMENTO = :ORE_COMPLEMENTO
            WHERE FK_LOGIN_LGN_ID = :FK_LOGIN_LGN_ID";

            
                $stmt = $this->getConn()->prepare($sql);
        
                
                $stmt->bindParam(':ORE_NOME_SOCIAL', $ORE_NOME_SOCIAL);
                $stmt->bindParam(':ORE_DATA_NASCIMENTO', $ORE_DATA_NASCIMENTO);
                $stmt->bindParam(':ORE_FOTO', $ORE_FOTO);
                $stmt->bindParam(':ORE_TELEFONE', $ORE_TELEFONE);
                $stmt->bindParam(':FK_CIDADES_CID_ID', $FK_CIDADES_CID_ID);
                $stmt->bindParam(':ORE_RUA', $ORE_RUA);
                $stmt->bindParam(':ORE_CEP', $ORE_CEP);
                $stmt->bindParam(':ORE_BAIRRO', $ORE_BAIRRO);
                $stmt->bindParam(':ORE_COMPLEMENTO', $ORE_COMPLEMENTO);
                $stmt->bindParam(':FK_LOGIN_LGN_ID', $FK_LOGIN_LGN_ID);
                $stmt->execute();

            }
            catch(\PDOException $ex){
                echo "Erro ao executar a atualiza��o: " . $ex->getMessage();
                die();
            }
        }

       public function buscarPorId($ORE_ID){
            try{
                
                $sql = "SELECT                      
                            OE.*,
                            CA.CAM_NOME,
                            CD.CID_NOME,
                            LG.*
                        FROM 
                            organizadores_eventos OE, 
                            campus CA,
                            cidades CD,
                            login LG
                        WHERE 
                            OE.FK_CAMPUS_CAM_ID = CA.CAM_ID
                        AND
                            OE.FK_CIDADES_CID_ID = CD.CID_ID
                        AND
                            OE.FK_LOGIN_LGN_ID = LG.LGN_ID
                        AND
                            ORE_ID=:ORE_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':ORE_ID', $ORE_ID);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $organizador_eventoModel = new Organizadores_EventosModel();
                    
                    $organizador_eventoModel->__set('ORE_ID',$result['ORE_ID']);
                    $organizador_eventoModel->__set('ORE_NOME',$result['ORE_NOME']);
                    $organizador_eventoModel->__set('ORE_CPF',$result['ORE_CPF']);
                    $organizador_eventoModel->__set('ORE_TELEFONE',$result['ORE_TELEFONE']);
                    $organizador_eventoModel->__set('ORE_SEXO',$result['ORE_SEXO']);
                    $organizador_eventoModel->__set('ORE_ETNIA',$result['ORE_ETNIA']);
                    $organizador_eventoModel->__set('ORE_PRONTUARIO',$result['ORE_PRONTUARIO']);
                    $organizador_eventoModel->__set('ORE_FOTO',$result['ORE_FOTO']);
                    $organizador_eventoModel->__set('ORE_RG',$result['ORE_RG']);
                    $organizador_eventoModel->__set('ORE_DATA_NASCIMENTO',$result['ORE_DATA_NASCIMENTO']);
                    $organizador_eventoModel->__set('ORE_NOME_SOCIAL',$result['ORE_NOME_SOCIAL']);
                    $organizador_eventoModel->__set('ORE_CEP',$result['ORE_CEP']);
                    $organizador_eventoModel->__set('ORE_BAIRRO',$result['ORE_BAIRRO']);
                    $organizador_eventoModel->__set('ORE_RUA',$result['ORE_RUA']);
                    $organizador_eventoModel->__set('ORE_COMPLEMENTO',$result['ORE_COMPLEMENTO']);
                    $organizador_eventoModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                    $organizador_eventoModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']); 
                    $organizador_eventoModel->__set('FK_CIDADES_CID_ID',$result['FK_CIDADES_CID_ID']);
                    $organizador_eventoModel->__set('LGN_EMAIL',$result['LGN_EMAIL']);
                    $organizador_eventoModel->__set('CID_NOME',$result['CID_NOME']);

                    return $organizador_eventoModel;

                } else{
                    return null;
                }
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            } 
        }

        public function BuscarOrganizadorEventosLogado($id){
            try{
                $sql = "SELECT 
                o.*,
                l.LGN_EMAIL, 
                c.CAM_NOME,
                ci.CID_NOME
                
                FROM 
                organizadores_eventos o,
                login l,
                campus c,
                cidades ci
                
                
                WHERE
                o.FK_LOGIN_LGN_ID=l.LGN_ID AND
                o.FK_CIDADES_CID_ID=c.FK_CIDADES_CID_ID AND
                ci.CID_ID=o.FK_CIDADES_CID_ID AND
                o.FK_LOGIN_LGN_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $organizador_EventosModel = new Organizadores_EventosModel();
                    $organizador_EventosModel->__set('ORE_ID',$result['ORE_ID']);
                    $organizador_EventosModel->__set('ORE_DATA_NASCIMENTO',$result['ORE_DATA_NASCIMENTO']);
                    $organizador_EventosModel->__set('ORE_NOME',$result['ORE_NOME']);
                    $organizador_EventosModel->__set('ORE_NOME_SOCIAL',$result['ORE_NOME_SOCIAL']);
                    $organizador_EventosModel->__set('ORE_PRONTUARIO',$result['ORE_PRONTUARIO']);
                    $organizador_EventosModel->__set('ORE_COMPLEMENTO',$result['ORE_COMPLEMENTO']);
                    $organizador_EventosModel->__set('ORE_SEXO',$result['ORE_SEXO']);
                    $organizador_EventosModel->__set('ORE_ETNIA',$result['ORE_ETNIA']);
                    $organizador_EventosModel->__set('ORE_CEP',$result['ORE_CEP']);
                    $organizador_EventosModel->__set('ORE_RG',$result['ORE_RG']);
                    $organizador_EventosModel->__set('ORE_BAIRRO',$result['ORE_BAIRRO']);
                    $organizador_EventosModel->__set('ORE_RUA',$result['ORE_RUA']);
                    $organizador_EventosModel->__set('ORE_TELEFONE',$result['ORE_TELEFONE']);
                    $organizador_EventosModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $organizador_EventosModel->__set('ORE_FOTO',$result['ORE_FOTO']);
                    $organizador_EventosModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                    $organizador_EventosModel->__set('FK_CIDADES_CID_ID',$result['FK_CIDADES_CID_ID']);
                    $organizador_EventosModel->__set('CAM_NOME', $result['CAM_NOME']);
                    $organizador_EventosModel->__set('LGN_EMAIL', $result['LGN_EMAIL']);
                    $organizador_EventosModel->__set('CID_NOME', $result['CID_NOME']);
                    
                    return $organizador_EventosModel;
                } else{
                    return null;
                }
                
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }

        }


        public function BuscarOrganizadorEventos($id){
            try{
                $sql = "SELECT 
                o.*,
                l.LGN_EMAIL, 
                c.CAM_NOME,
                e.EVO_NOME
                
                FROM 
                organizadores_eventos o,
                login l,
                campus c,
                eventos e
                
                
                WHERE
                o.FK_LOGIN_LGN_ID=l.LGN_ID AND
                o.FK_CAMPUS_CAM_ID=c.CAM_ID AND
                e.FK_ORGANIZADORES_EVENTOS_ORE_ID=o.ORE_ID AND
                o.FK_LOGIN_LGN_ID=:id";
                

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':id', $id);

                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);
                if($result > 0) {
                    $organizador_EventosModel = new Organizadores_EventosModel();
                    $organizador_EventosModel->__set('ORE_ID',$result['ORE_ID']);
                    $organizador_EventosModel->__set('ORE_DATA_NASCIMENTO',$result['ORE_DATA_NASCIMENTO']);
                    $organizador_EventosModel->__set('ORE_NOME',$result['ORE_NOME']);
                    $organizador_EventosModel->__set('ORE_NOME_SOCIAL',$result['ORE_NOME_SOCIAL']);
                    $organizador_EventosModel->__set('ORE_PRONTUARIO',$result['ORE_PRONTUARIO']);
                    $organizador_EventosModel->__set('ORE_COMPLEMENTO',$result['ORE_COMPLEMENTO']);
                    $organizador_EventosModel->__set('ORE_SEXO',$result['ORE_SEXO']);
                    $organizador_EventosModel->__set('ORE_ETNIA',$result['ORE_ETNIA']);
                    $organizador_EventosModel->__set('ORE_CPF',$result['ORE_CPF']);
                    $organizador_EventosModel->__set('ORE_RG',$result['ORE_RG']);
                    $organizador_EventosModel->__set('ORE_RUA',$result['ORE_RUA']);
                    $organizador_EventosModel->__set('FK_CAMPUS_CAM_ID',$result['FK_CAMPUS_CAM_ID']);
                    $organizador_EventosModel->__set('ORE_FOTO',$result['ORE_FOTO']);
                    $organizador_EventosModel->__set('FK_LOGIN_LGN_ID',$result['FK_LOGIN_LGN_ID']);
                    //$organizador_EventosModel->__set('FK_CURSOS_CUR_ID',$result['FK_CURSOS_CUR_ID']);
                    $organizador_EventosModel->__set('CAM_NOME', $result['CAM_NOME']);
                    $organizador_EventosModel->__set('LGN_EMAIL', $result['LGN_EMAIL']);
                    $organizador_EventosModel->__set('EVO_NOME', $result['EVO_NOME']);

                    
                    return $organizador_EventosModel;
                } else{
                    return null;
                }
                
            }
            catch(\PDOException $ex){
                header('Location:/error103');
                die();
            }

        }

        public function mudarsenhaorg($obj){
            try{
                $ORE_PRONTUARIO = $obj->__get('ORE_PRONTUARIO');
                $LGN_SENHA = $obj->__get('LGN_SENHA');

                $sql = "UPDATE login SET 
                            LGN_SENHA=:LGN_SENHA
                            WHERE
                            ORE_PRONTUARIO=:ORE_PRONTUARIO";
                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':ORE_PRONTUARIO', $ORE_PRONTUARIO);
                $stmt->bindParam(':LGN_SENHA', $LGN_SENHA);

                $stmt->execute();

            }
            catch(\PDOException $ex){
                header('Location: /error101');
                die();
            }
        }
        
    }