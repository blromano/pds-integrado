<?php

namespace App\DAO;

use App\DAO;
use App\Model\InternacoesMedicasModel;
    
    class InternacoesMedicasDAO extends DAO{
        public function inserir($internacoes_medicas){
            try {
                $sql = "insert into internacoes_medicas(
                    INM_TEMPOINTERNACAO,
                    INM_ACOMPANHAMENTOCLINICO,
                    INM_NECESSIDADESCLINICAS,
                    INM_CAUSAINTERNACAO
                   
                ) 
                values (
                    :INM_tempointernacao,
                    :INM_acompanhamentoclinico,
                    :INM_necessidadesclinicas,
                    :INM_causainternacao
   
                )";
    
                $stmt = $this->getConn()->prepare($sql);
    
                $stmt->bindParam(':INM_tempointernacao', $internacoes_medicas->__get('INM_TEMPOINTERNACAO'));
                $stmt->bindParam(':INM_acompanhamentoclinico', $internacoes_medicas->__get('INM_ACOMPANHAMENTOCLINICO'));            
                $stmt->bindParam(':INM_necessidadesclinicas', $internacoes_medicas->__get('INM_NECESSIDADESCLINICAS'));
                // $stmt->bindParam(':INM_prescricaomedica', $internacoes_medicas->__get('INM_PRESCRICAOMEDICAS'));
                $stmt->bindParam(':INM_causainternacao', $internacoes_medicas->__get('INM_CAUSAINTERNACAO'));
                // $stmt->bindParam(':FK_consultas_presenciais_COP_id', $internacoes_medicas->__get('FK_CONSLUTAS_PRESENCIAIS_COP_ID')); LEMBRAR DE INSERIR DEPOIS
                $stmt->execute();
            } catch (\PDOException $ex) {
    
                header('Location: /error100');
                die();
            }
        }

        public function alterar($internacoes_medicas){
            try {

                $tempo_internacao = $internacoes_medicas->__get('INM_TEMPOINTERNACAO');
                $acompanhamento_clinico = $internacoes_medicas->__get('INM_ACOMPANHAMENTOCLINICO');
                $causa_internacao = $internacoes_medicas->__get('INM_CAUSAINTERNACAO');
                $necessidades_clinicas = $internacoes_medicas->__get('INM_NECESSIDADESCLINICAS');
                $id = $internacoes_medicas->__get('INM_ID');

                // $sql = "UPDATE internacoes_medicas 
                // SET 
                //     INM_TEMPOINTERNACAO = :INM_tempointernacao,
                //     INM_ACOMPANHAMENTOCLINICO = :INM_acompanhamentoclinico,
                //     INM_NECESSIDADESCLINICAS = :INM_necessidadesclinicas,
                //     INM_CAUSAINTERNACAO = :INM_causainternacao
                //     -- FK_CONSULTAS_PRESENCIAIS_INM_ID=:FK_consultas_presenciais_INM_id
                // WHERE INM_ID=:id";
                
                $sql = "UPDATE internacoes_medicas 
                SET 
                    INM_TEMPOINTERNACAO = $tempo_internacao,
                    INM_NECESSIDADESCLINICAS = '$necessidades_clinicas',
                    INM_ACOMPANHAMENTOCLINICO = '$acompanhamento_clinico',
                    INM_CAUSAINTERNACAO = '$causa_internacao'

                WHERE INM_ID=$id";

                $stmt = $this->getConn()->prepare($sql);

                // $stmt->bindParam(':INM_id', $internacoes_medicas->__get('INM_ID'));
                // $stmt->bindParam(':INM_tempointernacao', $internacoes_medicas->__get('INM_TEMPOINTERNACAO'));
                // $stmt->bindParam(':INM_INM_acompanhamentoclinico', $internacoes_medicas->__get('INM_ACOMPANHAMENTOCLINICO'));
                // $stmt->bindParam(':INM_necessidadesclinicas', $internacoes_medicas->__get('INM_NECESSIDADESCLINICAS'));   
                // // $stmt->bindParam(':INM_prescricaomedica', $internacoes_medicas->__get('INM_PRESCRICAOMEDICA'));
                // $stmt->bindParam(':INM_causainternacao', $internacoes_medicas->__get('INM_CAUSAINTERNACAO'));
                // // $stmt->bindParam(':FK_consultas_presenciais_INM_id', $internacoes_medicas->__get('FK_CONSULTAS_PRESENCIAIS_INM_ID'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function excluir($internacoes_medicas){
            try {
                $sql = "DELETE FROM internacoes_medicas WHERE INM_ID=$internacoes_medicas";

                $stmt = $this->getConn()->prepare($sql);
                
                // $stmt->bindParam(":id", $id);
                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error102');
                die();
            }
        }

        public function buscarPorId($id){
            try {
                $sql = "SELECT INM_TEMPOINTERNACAO,INM_ACOMPANHAMENTOCLINICO,INM_NECESSIDADESCLINICAS,INM_CAUSAINTERNACAO FROM internacoes_medicas WHERE INM_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $internacoes_medicas = new InternacoesMedicasModel();

                    $internacoes_medicas->__set('INM_TEMPOINTERNACAO', $result['INM_TEMPOINTERNACAO']);
                    $internacoes_medicas->__set('INM_ACOMPANHAMENTOCLINICO', $result['INM_ACOMPANHAMENTOCLINICO']);
                    $internacoes_medicas->__set('INM_NECESSIDADESCLINICAS', $result['INM_NECESSIDADESCLINICAS']);
                    $internacoes_medicas->__set('INM_CAUSAINTERNACAO', $result['INM_CAUSAINTERNACAO']);
                    
                
                    return $internacoes_medicas;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function listar(){
            try {
                $InternacoesMedicas = array();
                $sql = "SELECT * FROM internacoes_medicas ORDER BY INM_ID ASC ";
    
                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();
    
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $Internacoes_Medicas = new InternacoesMedicasModel();
                    $Internacoes_Medicas->__set('INM_ID', $row['INM_ID']);
                    $Internacoes_Medicas->__set('INM_TEMPOINTERNACAO', $row['INM_TEMPOINTERNACAO']);
                    $Internacoes_Medicas->__set('INM_ACOMPANHAMENTOCLINICO', $row['INM_ACOMPANHAMENTOCLINICO']);
                    $Internacoes_Medicas->__set('INM_NECESSIDADESCLINICAS', $row['INM_NECESSIDADESCLINICAS']);
                    $Internacoes_Medicas->__set('INM_CAUSAINTERNACAO', $row['INM_CAUSAINTERNACAO']);

    
                    array_push($InternacoesMedicas, $Internacoes_Medicas); //Inserindo os dados persistidos da tabela em um array
                }
    
                return $InternacoesMedicas; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }


    }