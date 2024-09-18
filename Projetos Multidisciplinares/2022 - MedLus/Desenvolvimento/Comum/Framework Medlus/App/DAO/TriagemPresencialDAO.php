<?php

namespace App\DAO;

use App\DAO;
use App\Model\TriagemPresencialModel;
    
    class TriagemPresencialDAO extends DAO{
        public function inserir($triagens){
            try {
                $sql = "insert into triagens(
                    TRI_ENDERECO_SETOR,
                    TRI_PRESSAOSISTOLICA,
                    TRI_ALTURA,
                    TRI_SINTOMAS,
                    TRI_HORA_TRIAGEM,
                    TRI_ATENDIMENTOPREFERENCIAL,
                    TRI_TEMPERATURA,
                    TRI_PRESSAODIASTOLICA,
                    TRI_PESO,
                    TRI_ALERGIAS,
                    TRI_INFORMACOESADICIONAIS
                   
                ) 
                values (
                    :TRI_endereco_setor,
                    :TRI_pressaosistolica,
                    :TRI_altura,
                    :TRI_sintomas, 
                    :TRI_hora_triagem,
                    :TRI_atendimentopreferencial,
                    :TRI_temperatura,
                    :TRI_pressaodiastolica,
                    :TRI_peso,
                    :TRI_alergias,
                    :TRI_informacoesadicionais
   
                )";
    
                $stmt = $this->getConn()->prepare($sql);
    
                $stmt->bindParam(':TRI_endereco_setor', $triagens->__get('TRI_ENDERECO_SETOR'));
                $stmt->bindParam(':TRI_pressaosistolica', $triagens->__get('TRI_PRESSAOSISTOLICA'));            
                $stmt->bindParam(':TRI_altura', $triagens->__get('TRI_ALTURA'));
                $stmt->bindParam(':TRI_sintomas', $triagens->__get('TRI_SINTOMAS'));
                $stmt->bindParam(':TRI_hora_triagem', $triagens->__get('TRI_HORA_TRIAGEM'));
                $stmt->bindParam(':TRI_atendimentopreferencial', $triagens->__get('TRI_ATENDIMENTOPREFERENCIAL'));
                $stmt->bindParam(':TRI_temperatura', $triagens->__get('TRI_TEMPERATURA'));
                $stmt->bindParam(':TRI_pressaodiastolica', $triagens->__get('TRI_PRESSAODIASTOLICA'));
                $stmt->bindParam(':TRI_peso', $triagens->__get('TRI_PESO'));
                $stmt->bindParam(':TRI_alergias', $triagens->__get('TRI_ALERGIAS'));
                $stmt->bindParam(':TRI_informacoesadicionais', $triagens->__get('TRI_INFORMACOESADICIONAIS'));
                // $stmt->bindParam(':FK_enfermeiros_enf_id', $triagens->__get('FK_ENFERMEIROS_ENF_ID'));
                // $stmt->bindParam(':FK_consultas_presenciais_COP_id', $triagens->__get('FK_CONSLUTAS_PRESENCIAIS_COP_ID')); LEMBRAR DE INSERIR DEPOIS
                $stmt->execute();
            } catch (\PDOException $ex) {
    
                header('Location: /error100');
                die();
            }
        }

                //     "SELECT 
                //     CP.COP_ID,
                //     U.USU_SINTOMAS AS SINTOMAS_PACIENTE,
                //     FROM 
                //     CONSULTAS_PRESENCIAIS AS CP,
                //     PACIENTES AS P,
                //     USUARIOS AS U
                //     WHERE
                //     CP.FK_PACIENTES_PAC_ID = P.PAC_ID AND
                //     P.FK_USUARIOS_USU_ID = U.USU_ID
                // ";

        public function alterar($triagens){
            try {
                $sql = "UPDATE triagens 
                SET 
                    TRI_ENDERECO_SETOR=:TRI_endereco_setor,
                    TRI_PRESSAOSISTOLICA=:TRI_pressaosistolica,
                    TRI_ALTURA=:TRI_altura,
                    TRI_SINTOMAS=:TRI_sintomas,
                    TRI_HORA_TRIAGEM=:TRI_hora_triagem,
                    TRI_ATENDIMENTOPREFERENCIAL=:TRI_atendimentopreferencial,
                    TRI_TEMPERATURA=:TRI_temperatura,
                    TRI_PRESSAODIASTOLICA=:TRI_pressaodiastolica,
                    TRI_PESO=:TRI_peso,
                    TRI_ALERGIAS=:TRI_alergias,
                    TRI_INFORMACOESADICIONAIS=:TRI_informacoesadicionais,
                    FK_ENFERMEIROS_ENF_ID=:FK_enfermeiros_enf_id,
                    FK_CONSULTAS_PRESENCIAIS_TRI_ID=:FK_consultas_presenciais_TRI_id
                WHERE TRI_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':TRI_id', $triagens->__get('TRI_ID'));
                $stmt->bindParam(':TRI_endereco_setor', $triagens->__get('TRI_ENDERECO_SETOR'));
                $stmt->bindParam(':TRI_pressaosistolica', $triagens->__get('TRI_PRESSAOSISTOLICA'));
                $stmt->bindParam(':TRI_altura', $triagens->__get('TRI_ALTURA'));   
                $stmt->bindParam(':TRI_sintomas', $triagens->__get('TRI_SINTOMAS'));
                $stmt->bindParam(':TRI_hora_triagem', $triagens->__get('TRI_HORA_TRIAGEM'));
                $stmt->bindParam(':TRI_atendimentopreferencial', $triagens->__get('TRI_ATENDIMENTOPREFERENCIAL'));
                $stmt->bindParam(':TRI_temperatura', $triagens->__get('TRI_TEMPERATURA'));
                $stmt->bindParam(':TRI_pressaodiastolica', $triagens->__get('TRI_PRESSAODIASTOLICA'));
                $stmt->bindParam(':TRI_peso', $triagens->__get('TRI_PESO'));
                $stmt->bindParam(':TRI_alergias', $triagens->__get('TRI_ALERGIAS'));
                $stmt->bindParam(':TRI_informacoesadicionais', $triagens->__get('TRI_INFORMACOESADICIONAIS'));    
                $stmt->bindParam(':FK_enfermeiros_enf_id', $triagens->__get('FK_ENFERMEIROS_ENF_ID'));
                $stmt->bindParam(':FK_consultas_presenciais_TRI_id', $triagens->__get('FK_CONSULTAS_PRESENCIAIS_TRI_ID'));

                $stmt->execute();
            } catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function excluir($triagens){

        }

        public function buscarPorId($id){
            try {
                $sql = "SELECT * FROM triagens WHERE TRI_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                // if ($result > 0) {
                    $triagens = new TriagemPresencialModel();

                    $triagens->__set('TRI_PRESSAOSISTOLICA', $result['TRI_PRESSAOSISTOLICA']);
                    $triagens->__set('TRI_ALTURA', $result['TRI_ALTURA']);
                    $triagens->__set('TRI_SINTOMAS', $result['TRI_SINTOMAS']);
                    $triagens->__set('TRI_HORA_TRIAGEM', $result['TRI_HORA_TRIAGEM']);
                    $triagens->__set('TRI_ATENDIMENTOPREFERENCIAL', $result['TRI_ATENDIMENTOPREFERENCIAL']);
                    $triagens->__set('TRI_TEMPERATURA', $result['TRI_TEMPERATURA']);
                    $triagens->__set('TRI_PRESSAODIASTOLICA', $result['TRI_PRESSAODIASTOLICA']);
                    $triagens->__set('TRI_PESO', $result['TRI_PESO']);
                    $triagens->__set('TRI_ALERGIAS', $result['TRI_ALERGIAS']);
                    $triagens->__set('TRI_INFORMACOESADICIONAIS', $result['TRI_INFORMACOESADICIONAIS']);
                    $triagens->__set('TRI_ENDERECO_SETOR', $result['TRI_ENDERECO_SETOR']);
                
                    return $triagens;
                // } else {
                //     return null;
                // }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
        public function listar(){
            try {
                $triagensPresencial = array();
                $sql = "SELECT * FROM triagens ORDER BY TRI_ID ASC ";
    
                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();
    
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $triagemPresencial = new TriagemPresencialModel();
                    $triagemPresencial->__set('TRI_ID', $row['TRI_ID']);
                    $triagemPresencial->__set('TRI_PRESSAOSISTOLICA', $row['TRI_PRESSAOSISTOLICA']);
                    $triagemPresencial->__set('TRI_ALTURA', $row['TRI_ALTURA']);
                    $triagemPresencial->__set('TRI_PESO', $row['TRI_PESO']);
                    $triagemPresencial->__set('TRI_SINTOMAS', $row['TRI_SINTOMAS']);
                    $triagemPresencial->__set('TRI_HORA_TRIAGEM', $row['TRI_HORA_TRIAGEM']);
                    $triagemPresencial->__set('TRI_ATENDIMENTOPREFERENCIAL', $row['TRI_ATENDIMENTOPREFERENCIAL']);
                    $triagemPresencial->__set('TRI_TEMPERATURA', $row['TRI_TEMPERATURA']);
                    $triagemPresencial->__set('TRI_PRESSAODIASTOLICA', $row['TRI_PRESSAODIASTOLICA']);
                    $triagemPresencial->__set('TRI_ALERGIAS', $row['TRI_DIABETES']);
                    $triagemPresencial->__set('TRI_INFORMACOESADICIONAIS', $row['TRI_INFORMACOESADICIONAIS']);
                    $triagemPresencial->__set('FK_ENFERMEIROS_ENF_ID', $row['FK_ENFERMEIROS_ENF_ID']);
                    $triagemPresencial->__set('FK_CONSULTAS_PRESENCIAIS_TRI_ID', $row['TRI_SINTOMAS_ADICIONAIS']);
    
    
                    array_push($triagensPresencial, $triagemPresencial); //Inserindo os dados persistidos da tabela em um array
                }
    
                return $triagensPresencial; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

    }
?>