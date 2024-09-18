<?php
    namespace App\DAO;
    use App\DAO;
    use App\Model\SolicitacaoProdutoModel;

    class SolicitacaoProdutoDAO extends DAO{
        public function inserir($solicitacao){
            // $valor = $solicitacao->__get('PRO_VALOR');
            // $nome = $solicitacao->__get('PRO_NOME');
            // $tipo = $solicitacao->__get('TPP_NOME');
            // $cnpj= $solicitacao->__get('FOR_CNPJ');
            // $email = $solicitacao->__get('FOR_EMAIL');
            // $telefone = $solicitacao->__get('FOR_TELEFONE');
            $status = $solicitacao->__get("SCP_STATUS");
            $data = $solicitacao->__get("SCP_DATA_HORA");
            $justificativa = $solicitacao->__get("SCP_JUSTIFICATIVA_RECUSAO");
            $quantidade = $solicitacao->__get('PSC_QUANTIDADE_PRODUTO_SOLICITADO');
            $fk_usu_id = $solicitacao->__get('FK_USUARIOS_USU_ID');
            $fk_pro_id = $solicitacao->__get('FK_PRODUTOS_PRO_ID');

            try{
                $sql='INSERT INTO SOLICITACOES_COMPRAS_PRODUTOS(
                    SCP_STATUS,
                    PSC_QUANTIDADE_PRODUTO_SOLICITADO,
                    SCP_DATA_HORA,
                    SCP_JUSTIFICATIVA_RECUSAO,
                    FK_USUARIOS_USU_ID,
                    FK_PRODUTOS_PRO_ID
                ) values (
                    :stts,
                    :qtdd,
                    :dataCriacao,
                    :justificativa,
                    :fk_usu,
                    :fk_pro
                )';
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":stts", $status);
                $stmt->bindParam(":qtdd", $quantidade);
                $stmt->bindParam(":dataCriacao", $data);
                $stmt->bindParam(":justificativa", $justificativa);
                $stmt->bindParam(":fk_usu", $fk_usu_id);
                $stmt->bindParam(":fk_pro", $fk_pro_id);
                $stmt->execute();

            }catch(\PDOException $ex){
                header('Location: /error105');
                die();
            }
        }
        public function excluir($obj){}
        
        public function alterar($solicitacao){
            $nome = $solicitacao->__get('PRO_NOME');
            $id = $solicitacao->__get('SCP_ID');
            $status = $solicitacao->__get("SCP_STATUS");
            $qtdd = $solicitacao->__get("PSC_QUANTIDADE_PRODUTO_SOLICITADO");
            $data = $solicitacao->__get("SCP_DATA_HORA");
            try{
                $sql = "UPDATE solicitacoes_compras_produtos SET 
                SCP_STATUS=:stts, PSC_QUANTIDADE_PRODUTO_SOLICITADO=:qttd, SCP_DATA_HORA=:datas
                WHERE SCP_ID=:scp_id";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':scp_id', $id);
                $stmt->bindParam(':stts', $status);
                $stmt->bindParam(':qttd', $qtdd);
                $stmt->bindParam(':datas', $data);
                $stmt->execute();
            }catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function alterarStatus($id, $status) {
            try {
                $sql = "UPDATE SOLICITACOES_COMPRAS_PRODUTOS SET SCP_STATUS=:scp_stts WHERE SCP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);

                $stmt->bindParam(':scp_stts', $status);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

            }catch (\PDOException $ex) {
                header('Location: /error101');
                die();
            }
        }

        public function buscarPorId($id){
            try {
                $sql = "SELECT s.SCP_ID, s.SCP_STATUS, s.PSC_QUANTIDADE_PRODUTO_SOLICITADO, s.FK_USUARIOS_USU_ID, s.SCP_DATA_HORA, p.PRO_NOME, p.PRO_VALOR, s.SCP_STATUS, t.TPP_NOME, f.FOR_NOME, f.FOR_CNPJ, f.FOR_EMAIL FROM solicitacoes_compras_produtos s, produtos p, tipos_produtos t, fornecedores f WHERE s.SCP_ID=:id";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();
                
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                if ($result > 0) {
                    $solicitacao = new SolicitacaoProdutoModel();
                    $solicitacao->__set('SCP_STATUS', $result['SCP_STATUS']);
                    $solicitacao->__set('PSC_QUANTIDADE_PRODUTO_SOLICITADO', $result['PSC_QUANTIDADE_PRODUTO_SOLICITADO']);
                    $solicitacao->__set('FK_USUARIOS_USU_ID', $result['FK_USUARIOS_USU_ID']);
                    $solicitacao->__set('SCP_ID', $result['SCP_ID']);
                    $solicitacao->__set('PRO_NOME', $result['PRO_NOME']);
                    $solicitacao->__set('PRO_VALOR', $result['PRO_VALOR']);
                    $solicitacao->__set('SCP_VALOR', $result['SCP_STATUS']);
                    $solicitacao->__set('TPP_NOME', $result['TPP_NOME']);
                    $solicitacao->__set('FOR_NOME', $result['FOR_NOME']);
                    $solicitacao->__set('SCP_DATA_HORA', $result['SCP_DATA_HORA']);
                    $solicitacao->__set('FOR_CNPJ', $result['FOR_CNPJ']);
                    $solicitacao->__set('FOR_EMAIL', $result['FOR_EMAIL']);

                    return $solicitacao;
                } else {
                    return null;
                }
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }
        
        public function listarMinhasSolicitacao($usu){
            try{
                $solicitacoes = array();
                $sql = "SELECT s.SCP_STATUS, s.PSC_QUANTIDADE_PRODUTO_SOLICITADO, s.SCP_DATA_HORA, s.SCP_ID, s.SCP_JUSTIFICATIVA_RECUSAO, s.FK_PRODUTOS_PRO_ID, p.PRO_NOME, p.PRO_VALOR FROM solicitacoes_compras_produtos s, produtos p WHERE s.FK_USUARIOS_USU_ID = :usu AND  p.PRO_ID = s.FK_PRODUTOS_PRO_ID ";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':usu', $usu);
                $stmt->execute();
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($results as $row){
                    $solicitacao = new SolicitacaoProdutoModel();
                    $solicitacao->__set('SCP_STATUS', $row['SCP_STATUS']);
                    $solicitacao->__set('PSC_QUANTIDADE_PRODUTO_SOLICITADO', $row['PSC_QUANTIDADE_PRODUTO_SOLICITADO']);
                    $solicitacao->__set('SCP_DATA_HORA', $row['SCP_DATA_HORA']);
                    $solicitacao->__set('SCP_ID', $row['SCP_ID']);
                    $solicitacao->__set('SCP_JUSTIFICATIVA_RECUSAO', $row['SCP_JUSTIFICATIVA_RECUSAO']);
                    $solicitacao->__set('FK_PRODUTOS_PRO_ID', $row['FK_PRODUTOS_PRO_ID']);
                    $solicitacao->__set('PRO_NOME', $row['PRO_NOME']);
                    $solicitacao->__set('PRO_VALOR', $row['PRO_VALOR']);
                    array_push($solicitacoes, $solicitacao);
                }
                return $solicitacoes;
            }catch(\PDOException $ex){
                header('Location: /error103');
                die();
            }
        }

        public function produto(){
            try{
                $produtos = array();
                $sql = "SELECT PRO_NOME FROM produtos";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($results as $row){
                    $produto = new SolicitacaoProdutoModel();
                    $produto->__set('PRO_NOME', $row['PRO_NOME']);
                    array_push($produtos, $produto);
                }
                return $produtos;
            }catch(\PDOException $ex){
                return $ex;
                die();
            }
        }
        
        public function buscarProdutoPeloNome($args){
            try{
                $sql = "SELECT * FROM produtos WHERE PRO_NOME = :pro";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(':pro', $args);
                $stmt->execute();
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($results as $row){
                    $dadoproduto = new SolicitacaoProdutoModel();
                    $dadoproduto->__set('PRO_ID', $row['PRO_ID']);
                }
                return $dadoproduto->__get('PRO_ID');
            }catch(\PDOException $ex){
                die();
            }
        }

        public function listar(){
            try {
                $solicitacoes = array();
                $sql = "SELECT s.SCP_ID, s.SCP_STATUS, s.PSC_QUANTIDADE_PRODUTO_SOLICITADO, p.PRO_NOME, p.PRO_VALOR, s.SCP_STATUS FROM solicitacoes_compras_produtos s, produtos p WHERE p.PRO_ID = s.FK_PRODUTOS_PRO_ID";

                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();

                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach($results as $row){
                    $solicitacao = new SolicitacaoProdutoModel();
                    $solicitacao->__set('SCP_ID', $row['SCP_ID']);
                    $solicitacao->__set('PRO_NOME', $row['PRO_NOME']);
                    $solicitacao->__set('PSC_QUANTIDADE_PRODUTO_SOLICITADO', $row['PSC_QUANTIDADE_PRODUTO_SOLICITADO']);
                    $solicitacao->__set('PRO_VALOR', $row['PRO_VALOR']);
                    $solicitacao->__set('SCP_STATUS', $row['SCP_STATUS']);
                    array_push($solicitacoes, $solicitacao);
                }

                return $solicitacoes;
            }catch(\PDOException $ex){
                header('Location: /error103');
                die();
            }
        }

    }
?>