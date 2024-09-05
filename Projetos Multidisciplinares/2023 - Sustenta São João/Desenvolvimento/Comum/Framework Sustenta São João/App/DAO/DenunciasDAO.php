<?php

namespace App\DAO;

use App\DAO;
use App\Model\DenunciaModel;

class DenunciasDAO extends DAO
{

    public function inserir($denuncias)
    {

        $titulo = $denuncias->__get("DEN_TITULO");
        $descricao = $denuncias->__get("DEN_DESCRICAO");
        $fotoVideo = $denuncias->__get("DEN_FOTO_VIDEO");
        $dataPublicacao = $denuncias->__get("DEN_DATA_PUBLICACAO");
        $statusDenuncia = $denuncias->__get("DEN_STATUS_DENUNCIA");
        $dataAltStatus = $denuncias->__get("DEN_DATA_ALT_STATUS");
        $cep = $denuncias->__get("DEN_CEP");
        $rua = $denuncias->__get("DEN_RUA");
        $numero = $denuncias->__get("DEN_NUMERO");
        $complemento = $denuncias->__get("DEN_COMPLEMENTO");
        $bairro = $denuncias->__get("DEN_BAIRRO");
        $QdeCurtida = $denuncias->__get("DEN_QDE_CURTIDAS");
        $fkUsuarios = $denuncias->__get("FK_CIDADAOS_USU_ID");
        $fkGestores = $denuncias->__get("FK_GESTORES_USU_ID");


        $sql = "INSERT INTO denuncias(            
                DEN_TITULO,
                DEN_DESCRICAO,
                DEN_FOTO_VIDEO,
                DEN_DATA_PUBLICACAO,
                DEN_STATUS_DENUNCIA,
                DEN_DATA_ALT_STATUS,
                DEN_CEP,
                DEN_RUA, 
                DEN_NUMERO,
                DEN_COMPLEMENTO,
                DEN_BAIRRO,
                DEN_QDE_CURTIDAS,
                FK_CIDADAOS_USU_ID,
                FK_GESTORES_USU_ID

            ) VALUES (
                :den_DEN_TITULO,
                :den_DEN_DESCRICAO,
                :den_DEN_FOTO_VIDEO,
                :den_DEN_DATA_PUBLICACAO,
                :den_DEN_STATUS_DENUNCIA,
                :den_DEN_DATA_ALT_STATUS,
                :den_DEN_CEP,
                :den_DEN_RUA, 
                :den_DEN_NUMERO,
                :den_DEN_COMPLEMENTO,
                :den_DEN_BAIRRO,
                :den_DEN_QDE_CURTIDAS,
                :den_FK_CIDADAOS_USU_ID,
                :den_FK_GESTORES_USU_ID

            )";

        $stmt = $this->getConn()->prepare($sql);

        $stmt->bindParam(':den_DEN_TITULO', $titulo);
        $stmt->bindParam(':den_DEN_DESCRICAO', $descricao);
        $stmt->bindParam(':den_DEN_FOTO_VIDEO', $fotoVideo);
        $stmt->bindParam(':den_DEN_DATA_PUBLICACAO', $dataPublicacao);
        $stmt->bindParam(':den_DEN_STATUS_DENUNCIA', $statusDenuncia);
        $stmt->bindParam(':den_DEN_DATA_ALT_STATUS', $dataAltStatus);
        $stmt->bindParam(':den_DEN_CEP', $cep);
        $stmt->bindParam(':den_DEN_RUA', $rua);
        $stmt->bindParam(':den_DEN_NUMERO', $numero);
        $stmt->bindParam(':den_DEN_COMPLEMENTO', $complemento);
        $stmt->bindParam(':den_DEN_BAIRRO', $bairro);
        $stmt->bindParam(':den_DEN_QDE_CURTIDAS', $QdeCurtida);
        $stmt->bindParam(':den_FK_CIDADAOS_USU_ID', $fkUsuarios);
        $stmt->bindParam(':den_FK_GESTORES_USU_ID', $fkGestores);

        $stmt->execute();
    }

    public function alterar($denuncia)
    {
        try {
            $sql = "UPDATE denuncias SET 
                               DEN_TITULO=:titulo, 
                               DEN_DESCRICAO=:descricao,
                               DEN_CEP=:cep,
                               DEN_RUA=:rua,
                               DEN_NUMERO=:numero,
                               DEN_COMPLEMENTO=:complemento,
                               DEN_BAIRRO=:bairro,
                               DEN_FOTO_VIDEO=:foto_video
                            WHERE 
                                DEN_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            
            
            $stmt->bindParam(':id', $denuncia->__get('DEN_ID'));
            $stmt->bindParam(':titulo', $denuncia->__get('DEN_TITULO'));
            $stmt->bindParam(':descricao', $denuncia->__get('DEN_DESCRICAO'));
            $stmt->bindParam(':cep', $denuncia->__get('DEN_CEP'));
            $stmt->bindParam(':rua', $denuncia->__get('DEN_RUA'));
            $stmt->bindParam(':numero', $denuncia->__get('DEN_NUMERO'));
            $stmt->bindParam(':complemento', $denuncia->__get('DEN_COMPLEMENTO'));
            $stmt->bindParam(':bairro', $denuncia->__get('DEN_BAIRRO'));
            $stmt->bindParam(':foto_video', $denuncia->__get('DEN_FOTO_VIDEO'));
            $stmt->execute();
            

        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }
    public function alterarStatus($denuncia)
    {
        try {
           /*
            echo "ID = " . $denuncia->__get('DEN_ID');
            echo "Status = " . $denuncia->__get('DEN_STATUS_DENUNCIA');
            
            exit();
            */

            $sql = "UPDATE denuncias SET DEN_STATUS_DENUNCIA=:statusDenuncia WHERE DEN_ID=:id";

            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(':id', $denuncia->__get('DEN_ID'));
            $stmt->bindParam(':statusDenuncia', $denuncia->__get('DEN_STATUS_DENUNCIA'));

            $stmt->execute();

        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }


    public function excluir($id)
    {
        try {
            $sql = "delete from denuncias where DEN_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }

    public function buscarPorID($id)
    {
        try {
            $sql = "SELECT * FROM denuncias WHERE DEN_ID=:id";
      
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                $denuncias = new DenunciaModel();
                $denuncias->__set('DEN_ID', $result['DEN_ID']);
                $denuncias->__set('DEN_TITULO', $result['DEN_TITULO']);
                $denuncias->__set('DEN_DESCRICAO', $result['DEN_DESCRICAO']);
                $denuncias->__set('DEN_FOTO_VIDEO', $result['DEN_FOTO_VIDEO']);
                $denuncias->__set('DEN_DATA_PUBLICACAO', $result['DEN_DATA_PUBLICACAO']);
                $denuncias->__set('DEN_STATUS_DENUNCIA', $result['DEN_STATUS_DENUNCIA']);
                $denuncias->__set('DEN_DATA_ALT_STATUS', $result['DEN_DATA_ALT_STATUS']);
                $denuncias->__set('DEN_CEP', $result['DEN_CEP']);
                $denuncias->__set('DEN_RUA', $result['DEN_RUA']);
                $denuncias->__set('DEN_NUMERO', $result['DEN_NUMERO']);
                $denuncias->__set('DEN_COMPLEMENTO', $result['DEN_COMPLEMENTO']);
                $denuncias->__set('DEN_BAIRRO', $result['DEN_BAIRRO']);
                $denuncias->__set('DEN_QDE_CURTIDAS', $result['DEN_QDE_CURTIDAS']);
                $denuncias->__set('FK_CIDADAOS_USU_ID', $result['FK_CIDADAOS_USU_ID']);
                $denuncias->__set('FK_GESTORES_USU_ID', $result['FK_GESTORES_USU_ID']);
                $denuncias->__set('FK_SETORES_SET_ID', $result['FK_SETORES_SET_ID']);
                $denuncias->__set('FK_CIDADAOS_USU_ID', $result['FK_CIDADAOS_USU_ID']);
                $denuncias->__set('FK_GESTORES_USU_ID', $result['FK_GESTORES_USU_ID']);

                return $denuncias;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listar()
    {
        try {
            $denuncias = array();
            $sql = 
            "SELECT denuncias.*, cidadaos.USU_NOME, cidadaos.USU_EMAIL
            FROM denuncias 
            INNER JOIN cidadaos ON denuncias.FK_CIDADAOS_USU_ID = cidadaos.USU_ID
            ORDER BY 
            CASE DEN_STATUS_DENUNCIA 
            WHEN 'NR' THEN 1 
            WHEN 'A' THEN 2 
            WHEN 'R' THEN 3 
            END,
            DEN_QDE_CURTIDAS DESC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $denuncia = new DenunciaModel();
                $denuncia->__set('DEN_ID', $row['DEN_ID']);
                $denuncia->__set('DEN_TITULO', $row['DEN_TITULO']);
                $denuncia->__set('DEN_DESCRICAO', $row['DEN_DESCRICAO']);
                $denuncia->__set('DEN_FOTO_VIDEO', $row['DEN_FOTO_VIDEO']);
                $denuncia->__set('DEN_DATA_PUBLICACAO', $row['DEN_DATA_PUBLICACAO']);
                $denuncia->__set('DEN_STATUS_DENUNCIA', $row['DEN_STATUS_DENUNCIA']);
                $denuncia->__set('DEN_DATA_ALT_STATUS', $row['DEN_DATA_ALT_STATUS']);
                $denuncia->__set('DEN_CEP', $row['DEN_CEP']);
                $denuncia->__set('DEN_RUA', $row['DEN_RUA']);
                $denuncia->__set('DEN_NUMERO', $row['DEN_NUMERO']);
                $denuncia->__set('DEN_COMPLEMENTO', $row['DEN_COMPLEMENTO']);
                $denuncia->__set('DEN_BAIRRO', $row['DEN_BAIRRO']);
                $denuncia->__set('DEN_QDE_CURTIDAS', $row['DEN_QDE_CURTIDAS']);
                $denuncia->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                $denuncia->__set('USU_EMAIL', $row['USU_EMAIL']);
                $denuncia->__set('USU_NOME', $row['USU_NOME']);
                //  $denuncia->__set('FK_GESTORES_GES_ID', $row['FK_GESTORES_GES_ID']);

                array_push($denuncias, $denuncia); //Inserindo os dados persistidos da tabela em um array
            }

            return $denuncias; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listarPorIdUsuario(){
        try{
            // Busca as denúncias do usuário logado
            $sql = "SELECT * FROM denuncias WHERE FK_CIDADAOS_USU_ID = :id";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $denuncias = array();
            foreach ($results as $row) {
                $denuncia = new DenunciaModel();
                $denuncia->__set('DEN_ID', $row['DEN_ID']);
                $denuncia->__set('DEN_TITULO', $row['DEN_TITULO']);
                $denuncia->__set('DEN_DESCRICAO', $row['DEN_DESCRICAO']);
                $denuncia->__set('DEN_FOTO_VIDEO', $row['DEN_FOTO_VIDEO']);
                $denuncia->__set('DEN_DATA_PUBLICACAO', $row['DEN_DATA_PUBLICACAO']);
                $denuncia->__set('DEN_STATUS_DENUNCIA', $row['DEN_STATUS_DENUNCIA']);
                $denuncia->__set('DEN_DATA_ALT_STATUS', $row['DEN_DATA_ALT_STATUS']);
                $denuncia->__set('DEN_CEP', $row['DEN_CEP']);
                $denuncia->__set('DEN_RUA', $row['DEN_RUA']);
                $denuncia->__set('DEN_NUMERO', $row['DEN_NUMERO']);
                $denuncia->__set('DEN_COMPLEMENTO', $row['DEN_COMPLEMENTO']);
                $denuncia->__set('DEN_BAIRRO', $row['DEN_BAIRRO']);
                $denuncia->__set('DEN_QDE_CURTIDAS', $row['DEN_QDE_CURTIDAS']);
                $denuncia->__set('FK_CIDADAOS_USU_ID', $row['FK_CIDADAOS_USU_ID']);
                // $denuncia->__set('FK_GESTORES_GES_ID', $row['FK_GESTORES_GES_ID']);

                array_push($denuncias, $denuncia); //Inserindo os dados persistidos da tabela em um array
            }

            return $denuncias; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function reportar($denuncia, $descricao){
        try{
            $sql = "INSERT INTO violacoes (VIO_DESCRICAO, FK_DENUNCIAS_DEN_ID, FK_CIDADAOS_USU_ID) VALUES (:descricao, :denuncia, :usuario)";
    
            $denunciaId = $denuncia->__get('DEN_ID');
            $usuarioId = $denuncia->__get('FK_CIDADAOS_USU_ID');
    
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':denuncia', $denunciaId);
            $stmt->bindParam(':usuario', $usuarioId);
            $stmt->execute();
    
            //Altera o status da denuncia para 'NR' (Não resolvido)
            $sql = "UPDATE denuncias SET DEN_STATUS_DENUNCIA = 'NR' WHERE DEN_ID = :denuncia";
    
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(':denuncia', $denunciaId);
            $stmt->execute();
    
            return true;
        } catch (\PDOException $ex) {
            die();
        }
        
    }
}
