<?php   

namespace App\DAO;

use App\DAO;
use App\Model\ConsultaOnlineModel;
use App\Model\PacienteModel;

class ConsultaOnlineDAO extends DAO{    
    //Listando todos os dados da tabela consultas_online em ordem crescente de CTO_ID
    
    public function listarPacientes(){ //transformar em buscar por id (duplica a tabela se tiver 2 médicos)
        try {
            $pacientes = array();
            $sql = "SELECT  

            c.CTO_ID,
            u.USU_NOME,
            p.PAC_ID

            FROM 
            consultas_online c,
            pacientes p, 
            usuarios u
            
            WHERE 
            p.PAC_ID = c.FK_PACIENTES_PAC_ID AND
            u.USU_ID = p.FK_USUARIOS_USU_ID 

            ORDER BY p.PAC_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $consultaOnline = new PacienteModel();
                $consultaOnline->__set('PAC_ID', $row['PAC_ID']);
                $consultaOnline->__set('USU_NOME', $row['USU_NOME']);

                array_push($pacientes, $consultaOnline); //Inserindo os dados persistidos da tabela em um array
            }

            return $pacientes; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }



    public function listar(){ //transformar em buscar por id (duplica a tabela se tiver 2 médicos)
        try {
            $consultas_online = array();
            $sql = "SELECT  
            
            c.CTO_ID,
            c.CTO_HORA_INICIO,
            c.CTO_HORA_TERMINO,
            c.CTO_STATUS,
            c.CTO_DATA,
            c.CTO_LINK_MEET,
            u.USU_NOME AS MED_NOME,
            up.USU_NOME AS PAC_NOME,
            m.MED_FORMACAO,
            e.ESP_NOME

            FROM 
            consultas_online c,
            pacientes AS p,
            medicos AS m,
            usuarios AS u,
            usuarios AS up,
            especialidades e,
            solicitacao_agend_con_online s
            
            WHERE             
            c.FK_PACIENTES_PAC_ID = p.PAC_ID AND
            p.FK_USUARIOS_USU_ID = up.USU_ID AND
            c.FK_MEDICOS_MED_ID = m.MED_ID AND
            m.FK_USUARIOS_USU_ID = u.USU_ID AND
            

            s.SOL_ID = c.FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID AND
            e.ESP_ID = s.FK_ESPECIALIDADES_ESP_ID AND
            u.USU_ID = m.FK_USUARIOS_USU_ID 

            ORDER BY c.CTO_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $consultaOnline = new ConsultaOnlineModel();
                $consultaOnline->__set('CTO_ID', $row['CTO_ID']);
                $consultaOnline->__set('CTO_DATA', $row['CTO_DATA']);/* 
                
                $consultaOnline->__set('CTO_DIAGNOSTICO', $row['CTO_DIAGNOSTICO']); */
                $consultaOnline->__set('CTO_HORA_INICIO', $row['CTO_HORA_INICIO']);
                $consultaOnline->__set('CTO_HORA_TERMINO', $row['CTO_HORA_TERMINO']);
                $consultaOnline->__set('CTO_LINK_MEET', $row['CTO_LINK_MEET']);/* 
                $consultaOnline->__set('CTO_JUSTIFICATIVA', $row['CTO_JUSTIFICATIVA']);
                $consultaOnline->__set('CTO_OBSERVACOES', $row['CTO_OBSERVACOES']);
                $consultaOnline->__set('CTO_PRESCRICAO', $row['CTO_PRESCRICAO']); */
                $consultaOnline->__set('CTO_STATUS', $row['CTO_STATUS']);/* 
                $consultaOnline->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);
                $consultaOnline->__set('FK_MEDICOS_MED_ID', $row['FK_MEDICOS_MED_ID']);
                $consultaOnline->__set('FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID', $row['FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID']);
 */
                $consultaOnline->__set('PAC_NOME', $row['PAC_NOME']);
                $consultaOnline->__set('MED_NOME', $row['MED_NOME']);
                $consultaOnline->__set('MED_FORMACAO', $row['MED_FORMACAO']);
                $consultaOnline->__set('ESP_NOME', $row['ESP_NOME']);

                array_push($consultas_online, $consultaOnline); //Inserindo os dados persistidos da tabela em um array
            }

            return $consultas_online; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function listarMed(){ //transformar em buscar por id (duplica a tabela se tiver 2 médicos)
        try {
            $consultas_online = array();
            $sql = "SELECT  
            
            c.CTO_ID,
            c.CTO_HORA_INICIO,
            c.CTO_HORA_TERMINO,
            c.CTO_STATUS,
            c.CTO_DATA,
            c.CTO_LINK_MEET,
            u.USU_NOME AS MED_NOME,
            up.USU_NOME AS PAC_NOME,
            m.MED_FORMACAO,
            e.ESP_NOME

            FROM 
            consultas_online c,
            pacientes AS p,
            medicos AS m,
            usuarios AS u,
            usuarios AS up,
            especialidades e,
            solicitacao_agend_con_online s
            
            WHERE             
            c.FK_PACIENTES_PAC_ID = p.PAC_ID AND
            p.FK_USUARIOS_USU_ID = up.USU_ID AND
            c.FK_MEDICOS_MED_ID = m.MED_ID AND
            m.FK_USUARIOS_USU_ID = u.USU_ID AND
            

            s.SOL_ID = c.FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID AND
            e.ESP_ID = s.FK_ESPECIALIDADES_ESP_ID AND
            u.USU_ID = m.FK_USUARIOS_USU_ID 

            ORDER BY c.CTO_ID ASC";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $consultaOnline = new ConsultaOnlineModel();
                $consultaOnline->__set('CTO_ID', $row['CTO_ID']);
                $consultaOnline->__set('CTO_DATA', $row['CTO_DATA']);/* 
                
                $consultaOnline->__set('CTO_DIAGNOSTICO', $row['CTO_DIAGNOSTICO']); */
                $consultaOnline->__set('CTO_HORA_INICIO', $row['CTO_HORA_INICIO']);
                $consultaOnline->__set('CTO_HORA_TERMINO', $row['CTO_HORA_TERMINO']);
                $consultaOnline->__set('CTO_LINK_MEET', $row['CTO_LINK_MEET']);/* 
                $consultaOnline->__set('CTO_JUSTIFICATIVA', $row['CTO_JUSTIFICATIVA']);
                $consultaOnline->__set('CTO_OBSERVACOES', $row['CTO_OBSERVACOES']);
                $consultaOnline->__set('CTO_PRESCRICAO', $row['CTO_PRESCRICAO']); */
                $consultaOnline->__set('CTO_STATUS', $row['CTO_STATUS']);/* 
                $consultaOnline->__set('FK_PACIENTES_PAC_ID', $row['FK_PACIENTES_PAC_ID']);
                $consultaOnline->__set('FK_MEDICOS_MED_ID', $row['FK_MEDICOS_MED_ID']);
                $consultaOnline->__set('FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID', $row['FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID']);
 */
                $consultaOnline->__set('PAC_NOME', $row['PAC_NOME']);
                $consultaOnline->__set('MED_NOME', $row['MED_NOME']);
                $consultaOnline->__set('MED_FORMACAO', $row['MED_FORMACAO']);
                $consultaOnline->__set('ESP_NOME', $row['ESP_NOME']);

                array_push($consultas_online, $consultaOnline); //Inserindo os dados persistidos da tabela em um array
            }

            return $consultas_online; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }


    //Método de alteração de uma consulta online (este método recebe o Objeto $consultaOnline vindo do Método Atualizar (linha 93) do Consulta_OnlineController)
    public function alterar($consultaOnline){
        try {
            $sql = "UPDATE consultas_online 
            SET 
            CTO_DATA=:cto_data, 
            CTO_HORA_INICIO=:cto_hora_inicio,
            CTO_HORA_TERMINO=:cto_hora_termino,
            CTO_JUSTIFICATIVA=:cto_justificativa,
            CTO_OBSERVACOES=:cto_observacoes,
            CTO_PRESCRICAO=:cto_prescricao,
            CTO_DIAGNOSTICO=:cto_diagnostico

            WHERE CTO_ID=:id";
           
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':id', $consultaOnline->__get('CTO_ID'));
            $stmt->bindParam(':cto_data', $consultaOnline->__get('CTO_DATA'));            
            $stmt->bindParam(':cto_hora_inicio', $consultaOnline->__get('CTO_HORA_INICIO'));
            $stmt->bindParam(':cto_hora_termino', $consultaOnline->__get('CTO_HORA_TERMINO'));
            $stmt->bindParam(':cto_justificativa', $consultaOnline->__get('CTO_JUSTIFICATIVA'));
            $stmt->bindParam(':cto_observacoes', $consultaOnline->__get('CTO_OBSERVACOES'));
            $stmt->bindParam(':cto_prescricao', $consultaOnline->__get('CTO_PRESCRICAO'));
            $stmt->bindParam(':cto_diagnostico', $consultaOnline->__get('CTO_DIAGNOSTICO'));
           
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }


    //Método para excluir um tipo de remédio (recebe o $id do Tipo de Remédio a ser excluído)
    public function excluir($id)
    {
        try {
            $sql = "delete from consultas_online where CTO_ID=:id";

            $stmt = $this->getConn()->prepare($sql);
            
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error502');
            die();
        }
    }

    //Método para inserir uma nova consulta (recebe um Objeto como parâmetro)
    public function inserir($consultaOnline){
        try {
            $sql = "insert into consultas_online(
                CTO_DATA,
                CTO_DIAGNOSTICO,
                CTO_HORA_INICIO,
                CTO_HORA_TERMINO,
                CTO_JUSTIFICATIVA,
                CTO_LINK_MEET,
                CTO_OBSERVACOES,
                CTO_PRESCRICAO,
                CTO_STATUS,
                FK_MEDICOS_MED_ID,
                FK_PACIENTES_PAC_ID,
                FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID
            ) 
            values (
                :COdata,
                :COdiagnostico,
                :COhora_inicio,
                :COhora_termino,
                :COjustificativa, 
                :COlink_meet,
                :COobservacoes,
                :COprescricao,
                :COstatus,
                :FKmedicos_med_id,
                :FKpacientes_pac_id,
                :FKsolicitacao_agend_con_online_sol_id
            )";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':COdata', $consultaOnline->__get('CTO_DATA'));
            $stmt->bindParam(':COdiagnostico', $consultaOnline->__get('CTO_DIAGNOSTICO'));            
            $stmt->bindParam(':COhora_inicio', $consultaOnline->__get('CTO_HORA_INICIO'));
            $stmt->bindParam(':COhora_termino', $consultaOnline->__get('CTO_HORA_TERMINO'));
            $stmt->bindParam(':COjustificativa', $consultaOnline->__get('CTO_JUSTIFICATIVA'));
            $stmt->bindParam(':COlink_meet', $consultaOnline->__get('CTO_LINK_MEET'));
            $stmt->bindParam(':COobservacoes', $consultaOnline->__get('CTO_OBSERVACOES'));
            $stmt->bindParam(':COprescricao', $consultaOnline->__get('CTO_PRESCRICAO'));
            $stmt->bindParam(':COstatus', $consultaOnline->__get('CTO_STATUS'));
            $stmt->bindParam(':FKmedicos_med_id', $consultaOnline->__get('FK_MEDICOS_MED_ID'));
            $stmt->bindParam(':FKpacientes_pac_id', $consultaOnline->__get('FK_PACIENTES_PAC_ID'));
            $stmt->bindParam(':FKsolicitacao_agend_con_online_sol_id', $consultaOnline->__get('FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID'));
            $stmt->execute();
        } catch (\PDOException $ex) {

            header('Location: /error100');
            die();
        }
    }

    //Método para buscar um registro expecífico no Banco (recebe um $id)
    public function buscarPorId($id){
        try {
            $consultas_online = array();
            //$sql = "SELECT * FROM consultas_online WHERE CTO_ID=:id";

            $sql = "SELECT  
            
            c.CTO_ID,
            c.CTO_DATA,
            c.CTO_DIAGNOSTICO,
            c.CTO_HORA_INICIO,
            c.CTO_HORA_TERMINO,
            c.CTO_JUSTIFICATIVA,
            c.CTO_STATUS,
            c.CTO_OBSERVACOES,
            c.CTO_LINK_MEET,
            c.CTO_PRESCRICAO,
            c.FK_MEDICOS_MED_ID,
            c.FK_PACIENTES_PAC_ID,
            c.FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID,
            p.FK_USUARIOS_USU_ID,
            m.FK_USUARIOS_USU_ID,
            up.USU_EMAIL,
            e.ESP_NOME,
            u.USU_NOME AS MED_NOME,
            up.USU_NOME AS PAC_NOME

            FROM 
            consultas_online c,
            pacientes AS p,
            medicos AS m,
            usuarios AS u,
            usuarios AS up,
            especialidades AS e,
            solicitacao_agend_con_online AS s
            
            WHERE 
            c.FK_PACIENTES_PAC_ID = p.PAC_ID AND
            p.FK_USUARIOS_USU_ID = up.USU_ID AND
            c.FK_MEDICOS_MED_ID = m.MED_ID AND
            m.FK_USUARIOS_USU_ID = u.USU_ID AND
            e.ESP_ID = s.FK_ESPECIALIDADES_ESP_ID AND

            
            CTO_ID=:id"; 

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                
                $consultaOnline = new ConsultaOnlineModel();
                $consultaOnline->__set('CTO_ID', $result['CTO_ID']);
                $consultaOnline->__set('CTO_DATA', $result['CTO_DATA']);
                $consultaOnline->__set('CTO_DIAGNOSTICO', $result['CTO_DIAGNOSTICO']);
                $consultaOnline->__set('CTO_HORA_INICIO', $result['CTO_HORA_INICIO']); 
                $consultaOnline->__set('CTO_HORA_TERMINO', $result['CTO_HORA_TERMINO']); 
                $consultaOnline->__set('CTO_JUSTIFICATIVA', $result['CTO_JUSTIFICATIVA']); 
                $consultaOnline->__set('CTO_LINK_MEET', $result['CTO_LINK_MEET']); 
                $consultaOnline->__set('CTO_OBSERVACOES', $result['CTO_OBSERVACOES']); 
                $consultaOnline->__set('CTO_PRESCRICAO', $result['CTO_PRESCRICAO']); 
                $consultaOnline->__set('USU_EMAIL', $result['USU_EMAIL']); 
                $consultaOnline->__set('CTO_STATUS', $result['CTO_STATUS']); 
                $consultaOnline->__set('FK_MEDICOS_MED_ID', $result['FK_MEDICOS_MED_ID']); 
                $consultaOnline->__set('FK_PACIENTES_PAC_ID', $result['FK_PACIENTES_PAC_ID']);  
                $consultaOnline->__set('FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID', $result['FK_SOLICITACAO_AGEND_CON_ONLINE_SOL_ID']); 
                $consultaOnline->__set('PAC_NOME', $result['PAC_NOME']); 
                $consultaOnline->__set('MED_NOME', $result['MED_NOME']); 
                $consultaOnline->__set('ESP_NOME', $result['ESP_NOME']); 
                   
                //retorna todos os campos relacionados ao ID selecionado
                array_push($consultas_online, $consultaOnline);
            } 
                return $consultas_online; //retornando o array para mostagem da view
            
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }
    
}