<?php
    namespace App\DAO;

    use App\DAO;
    use App\Model\DenunciasCurtidasModel;

    class DenunciasCurtidasDAO extends DAO{

        public function inserir($curtida){
            $idDenuncia = $curtida->__get("FK_DENUNCIAS_DEN_ID");
            $idUsuario = $curtida->__get("FK_CIDADAOS_USU_ID");

            $sql1 = "INSERT INTO denuncias_curtidas(
                FK_CIDADAOS_USU_ID,
                FK_DENUNCIAS_DEN_ID
            ) VALUES (
                :FK_CIDADAOS_USU_ID,
                :FK_DENUNCIAS_DEN_ID
            )";

            

            $sql2 = "UPDATE denuncias SET
                DEN_QDE_CURTIDAS = :DEN_QDE_CURTIDAS
                WHERE DEN_ID = :FK_DENUNCIAS_DEN_ID
            ";

            $stmt = $this->getConn()->prepare($sql1);
            $stmt->bindParam(':FK_DENUNCIAS_DEN_ID', $idDenuncia);
            $stmt->bindParam(':FK_CIDADAOS_USU_ID', $idUsuario);
            $stmt->execute();

            $qtdCurtidas = $this->listarQdeCurtidas($idDenuncia);

            $qtdCurtidas++;
            
            $stmt = $this->getConn()->prepare($sql2);
            $stmt->bindParam(":DEN_QDE_CURTIDAS", $qtdCurtidas);
            $stmt->bindParam(":FK_DENUNCIAS_DEN_ID", $idDenuncia);
            $stmt->execute();
        }

        public function excluir($curtida){
            try {
                $idDenuncia = $curtida->__get("FK_DENUNCIAS_DEN_ID");
                $idUsuario = $curtida->__get("FK_CIDADAOS_USU_ID");
                $sql = "DELETE FROM denuncias_curtidas WHERE FK_DENUNCIAS_DEN_ID = :FK_DENUNCIAS_DEN_ID AND FK_CIDADAOS_USU_ID = :FK_CIDADAOS_USU_ID";
                
                $sql2 = "UPDATE denuncias SET
                DEN_QDE_CURTIDAS = :DEN_QDE_CURTIDAS
                WHERE DEN_ID = :FK_DENUNCIAS_DEN_ID
                ";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':FK_DENUNCIAS_DEN_ID', $idDenuncia);
                $stmt->bindParam(':FK_CIDADAOS_USU_ID', $idUsuario);
                $stmt->execute();


                $qtdCurtidas = $this->listarQdeCurtidas($idDenuncia);
                $qtdCurtidas--;

                $stmt = $this->getConn()->prepare($sql2);
                $stmt->bindParam(":DEN_QDE_CURTIDAS", $qtdCurtidas);
                $stmt->bindParam(":FK_DENUNCIAS_DEN_ID", $idDenuncia);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function listarQdeCurtidas($idDenuncia){
            $sql = "SELECT DEN_QDE_CURTIDAS FROM denuncias WHERE DEN_ID=:FK_DENUNCIAS_DEN_ID";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":FK_DENUNCIAS_DEN_ID", $idDenuncia);
            $stmt->execute();
            $qtdCurtidas = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $qtdCurtidas["DEN_QDE_CURTIDAS"];
        }


        public function listar(){
            // Método não necessário
        }

        public function listarPorId($USU_ID = null, $DEN_ID = null){
            // Verifica se foi passado o ID da denúncia e busca os usuários que curtiram a denúncia
            if($DEN_ID != null && $USU_ID == null){
                $sql = "SELECT * FROM denuncias_curtidas WHERE FK_DENUNCIAS_DEN_ID = :FK_DENUNCIAS_DEN_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':FK_DENUNCIAS_DEN_ID', $DEN_ID);

                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                if($result > 0){
                    return $result;
                } else {
                    return null;
                }
            }

            // Verifica se foi passado o ID do usuário e busca as denúncias que ele curtiu
            if($USU_ID != null && $DEN_ID == null){
                $sql = "SELECT * FROM denuncias_curtidas WHERE FK_CIDADAOS_USU_ID = :FK_CIDADAOS_USU_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':FK_CIDADAOS_USU_ID', $USU_ID);

                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                if($result > 0){
                    return $result;
                } else {
                    return null;
                }
            }

            // Verifica se foi passado o ID do usuário e o ID da denúncia e busca se o usuário curtiu a denúncia
            if($USU_ID != null && $DEN_ID != null){
                $sql = "SELECT * FROM denuncias_curtidas WHERE FK_CIDADAOS_USU_ID = :FK_CIDADAOS_USU_ID AND FK_DENUNCIAS_DEN_ID = :FK_DENUNCIAS_DEN_ID";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':FK_CIDADAOS_USU_ID', $USU_ID);
                $stmt->bindParam(':FK_DENUNCIAS_DEN_ID', $DEN_ID);

                $stmt->execute();

                $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

                if($result > 0){
                    return $result;
                } else {
                    return null;
                }
            }
        }

        public function alterar($obj){
            
        }

        public function buscarPorId($obj){
            
        }
    }
?>
