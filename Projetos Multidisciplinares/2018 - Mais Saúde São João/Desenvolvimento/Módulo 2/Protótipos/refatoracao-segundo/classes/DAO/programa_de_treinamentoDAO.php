<?php
require_once '../../../views/modules/Ferramentas_Esportivas/conexaothales.php';


class Programas_de_treinamentoDAO {
	
    private $conexao;

    function __construct() {
       $this->conexao=$conexao->conectar();
 
    }  

    function inserir($obj_pt){
                try{
                $consulta = $this->conexao->prepare("INSERT INTO programas_de_treinamento(PGT_NOME, PGT_DIFICULDADE)"."VALUES(:PGT_NOME,:PGT_DIFICULDADE");
                $consulta->bindParam(':PGT_NOME',$n);
                $consulta->bindParam(':PGT_DIFICULDADE',$d);
                $n = $obj_pt->getPtg_nome();
                $d = $obj_pt->getPtg_dificuldade();
                $consulta->execute();
                if($consulta->execute()){
                    return "ok";
                }
                else
                    {
                        return "erro bd";
                    }
            }
            catch(PDOException $e){
                return "erro bd";
            }                
    }

    
}


?>



