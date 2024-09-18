<?php

namespace App\DAO;

use App\DAO;
use App\Model\TriagemOnlineModel;


class TriagemOnlineDAO extends DAO{

    public function listar(){
        try {
            $triagensonline = array();
            $sql = "SELECT * FROM triagem_c_online ORDER BY TRO_ID ASC ";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $triagemonline = new TriagemOnlineModel();
                $triagemonline->__set('TRO_ID', $row['TRO_ID']);
                $triagemonline->__set('TRO_COLESTEROL', $row['TRO_COLESTEROL']);
                $triagemonline->__set('TRO_FALTA_DE_AR', $row['TRO_FALTA_DE_AR']);
                $triagemonline->__set('TRO_PESO', $row['TRO_PESO']);
                $triagemonline->__set('TRO_DOR_NO_CORPO', $row['TRO_DOR_NO_CORPO']);
                $triagemonline->__set('TRO_DOR_DE_GARGANTA', $row['TRO_DOR_DE_GARGANTA']);
                $triagemonline->__set('TRO_VOMITO', $row['TRO_VOMITO']);
                $triagemonline->__set('TRO_CORIZA', $row['TRO_CORIZA']);
                $triagemonline->__set('TRO_DOR_DE_CABECA', $row['TRO_DOR_DE_CABECA']);
                $triagemonline->__set('TRO_DIABETES', $row['TRO_DIABETES']);
                $triagemonline->__set('TRO_TOSSE', $row['TRO_TOSSE']);
                $triagemonline->__set('TRO_DIARREIA', $row['TRO_DIARREIA']);
                $triagemonline->__set('TRO_FEBRE', $row['TRO_FEBRE']);
                $triagemonline->__set('TRO_LESAO', $row['TRO_LESAO']);
                $triagemonline->__set('TRO_HIPERTENSAO', $row['TRO_HIPERTENSAO']);
                $triagemonline->__set('TRO_SINTOMAS_ADICIONAIS', $row['TRO_SINTOMAS_ADICIONAIS']);
                $triagemonline->__set('FK_CONSULTAS_ONLINE_CTO_ID', $row['FK_CONSULTAS_ONLINE_CTO_ID']);


                array_push($triagensonline, $triagemonline); //Inserindo os dados persistidos da tabela em um array
            }

            return $triagensonline; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function alterar($triagemonline){
        try {
            $sql = "UPDATE triagem_c_online SET 
            TRO_COLESTEROL=:colesterol,
            TRO_FALTA_DE_AR=:falta_de_ar,
            TRO_PESO=:peso, 
            TRO_DOR_NO_CORPO=:dor_no_corpo,
            TRO_DOR_DE_GARGANTA=:dor_de_garganta, 
            TRO_VOMITO=:vomito,
            TRO_CORIZA=:coriza, 
            TRO_DOR_DE_CABECA=:dor_de_cabeca,
            TRO_DIABETES=:diabetes, 
            TRO_TOSSE=:tosse,
            TRO_DIARREIA=:diarreia, 
            TRO_FEBRE=:febre,
            TRO_LESAO=:lesao, 
            TRO_HIPERTENSAO=:hipertensao,
            TRO_SINTOMAS_ADICIONAIS=:sintomas_adicionais,
            FK_CONSULTAS_ONLINE_CTO_ID=:consultas_online
            WHERE TRO_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':colesterol', $triagemonline->__get('TRO_COLESTEROL'));
            $stmt->bindParam(':falta_de_ar', $triagemonline->__get('TRO_FALTA_DE_AR'));
            $stmt->bindParam(':peso', $triagemonline->__get('TRO_PESO'));            
            $stmt->bindParam(':dor_no_corpo', $triagemonline->__get('TRO_DOR_NO_CORPO'));
            $stmt->bindParam(':dor_de_garganta', $triagemonline->__get('TRO_DOR_DE_GARGANTA'));
            $stmt->bindParam(':vomito', $triagemonline->__get('TRO_VOMITO'));
            $stmt->bindParam(':coriza', $triagemonline->__get('TRO_CORIZA'));            
            $stmt->bindParam(':dor_de_cabeca', $triagemonline->__get('TRO_DOR_DE_CABECA'));
            $stmt->bindParam(':diabetes', $triagemonline->__get('TRO_DIABETES'));
            $stmt->bindParam(':tosse', $triagemonline->__get('TRO_TOSSE'));
            $stmt->bindParam(':diarreia', $triagemonline->__get('TRO_DIARREIA'));            
            $stmt->bindParam(':febre', $triagemonline->__get('TRO_FEBRE'));
            $stmt->bindParam(':lesao', $triagemonline->__get('TRO_LESAO'));
            $stmt->bindParam(':hipertensao', $triagemonline->__get('TRO_HIPERTENSAO'));
            $stmt->bindParam(':sintomas_adicionais', $triagemonline->__get('TRO_SINTOMAS_ADICIONAIS'));
            $stmt->bindParam(':consultas_online', $triagemonline->__get('FK_CONSULTAS_ONLINE_CTO_ID'));      

            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "delete from triagem_c_online where TRO_ID=:id";

            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }

    public function inserir($triagemonline){
        try {
            $sql = "insert into triagem_c_online (
            TRO_COLESTEROL,
            TRO_FALTA_DE_AR,
            TRO_PESO,
            TRO_DOR_NO_CORPO,
            TRO_DOR_DE_GARGANTA,
            TRO_VOMITO,
            TRO_CORIZA,
            TRO_DOR_DE_CABECA,
            TRO_DIABETES,
            TRO_TOSSE,
            TRO_DIARREIA,
            TRO_FEBRE,
            TRO_LESAO,
            TRO_HIPERTENSAO,
            TRO_SINTOMAS_ADICIONAIS,
            FK_CONSULTAS_ONLINE_CTO_ID)

            values (
            :colesterol,
            :falta_de_ar,
            :peso,
            :dor_no_corpo,
            :dor_de_garganta,
            :vomito,
            :coriza,
            :dor_de_cabeca,
            :diabetes,
            :tosse,
            :diarreia,
            :febre,
            :lesao,
            :hipertensao,
            :sintomas_adicionais,
            :consultas_online)";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':colesterol',  $triagemonline->__get('TRO_COLESTEROL'));
            $stmt->bindParam(':falta_de_ar', $triagemonline->__get('TRO_FALTA_DE_AR'));
            $stmt->bindParam(':peso', $triagemonline->__get('TRO_PESO'));
            $stmt->bindParam(':dor_no_corpo',  $triagemonline->__get('TRO_DOR_NO_CORPO'));
            $stmt->bindParam(':dor_de_garganta', $triagemonline->__get('TRO_DOR_DE_GARGANTA'));
            $stmt->bindParam(':vomito', $triagemonline->__get('TRO_VOMITO'));
            $stmt->bindParam(':coriza',  $triagemonline->__get('TRO_CORIZA'));
            $stmt->bindParam(':dor_de_cabeca', $triagemonline->__get('TRO_DOR_DE_CABECA'));
            $stmt->bindParam(':diabetes', $triagemonline->__get('TRO_DIABETES'));
            $stmt->bindParam(':tosse', $triagemonline->__get('TRO_TOSSE'));
            $stmt->bindParam(':diarreia',  $triagemonline->__get('TRO_DIARREIA'));
            $stmt->bindParam(':febre', $triagemonline->__get('TRO_FEBRE'));
            $stmt->bindParam(':lesao', $triagemonline->__get('TRO_LESAO'));
            $stmt->bindParam(':hipertensao',  $triagemonline->__get('TRO_HIPERTENSAO'));
            $stmt->bindParam(':sintomas_adicionais', $triagemonline->__get('TRO_SINTOMAS_ADICIONAIS'));
            $stmt->bindParam(':consultas_online', $triagemonline->__get('FK_CONSULTAS_ONLINE_CTO_ID'));      

            $stmt->execute();
        } catch (\PDOException $ex) {

            header('Location: /error100');
            die();
        }
    }
    public function buscarPorId($id){
        try {
            $sql = "SELECT * FROM triagem_c_online WHERE TRO_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                $triagemonline = new TriagemOnlineModel();
                $triagemonline->__set('TRO_ID', $result['TRO_ID']);
                $triagemonline->__set('TRO_COLESTEROL', $result['TRO_COLESTEROL']);
                $triagemonline->__set('TRO_FALTA_DE_AR', $result['TRO_FALTA_DE_AR']);
                $triagemonline->__set('TRO_PESO', $result['TRO_PESO']); 
                $triagemonline->__set('TRO_DOR_NO_CORPO', $result['TRO_DOR_NO_CORPO']);
                $triagemonline->__set('TRO_DOR_DE_GARGANTA', $result['TRO_DOR_DE_GARGANTA']);
                $triagemonline->__set('TRO_VOMITO', $result['TRO_VOMITO']);
                $triagemonline->__set('TRO_CORIZA', $result['TRO_CORIZA']); 
                $triagemonline->__set('TRO_DOR_DE_CABECA', $result['TRO_DOR_DE_CABECA']);
                $triagemonline->__set('TRO_DIABETES', $result['TRO_DIABETES']);
                $triagemonline->__set('TRO_TOSSE', $result['TRO_TOSSE']);
                $triagemonline->__set('TRO_DIARREIA', $result['TRO_DIARREIA']); 
                $triagemonline->__set('TRO_FEBRE', $result['TRO_FEBRE']);
                $triagemonline->__set('TRO_LESAO', $result['TRO_LESAO']);
                $triagemonline->__set('TRO_HIPERTENSAO', $result['TRO_HIPERTENSAO']); 
                $triagemonline->__set('TRO_SINTOMAS_ADICIONAIS', $result['TRO_SINTOMAS_ADICIONAIS']);
                

                //retorna todos os campos relacionados ao ID selecionado
                

                return $triagemonline;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }
    
}
