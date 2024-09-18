<?php
namespace App\DAO;

use App\DAO;
use App\Model\ProdutoModel;

    class ProdutoDAO extends DAO{

        public function listar(){
            try {
                $produtos = array();
                $sql = "SELECT * FROM produtos, tipos_produtos ORDER BY PRO_ID ASC"; 
                $stmt = $this->getConn()->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    $produto = new ProdutoModel();
                    if($row['TPP_ID'] == $row['FK_TIPOS_PRODUTOS_TPP_ID']){
                        $produto->__set('PRO_VALOR', $row['PRO_VALOR']);
                        $produto->__set('PRO_NOME', $row['PRO_NOME']);
                        $produto->__set('PRO_ID', $row['PRO_ID']);
                        $produto->__set('PRO_QUANTIDADE', $row['PRO_QUANTIDADE']);
                        $produto->__set('FK_FORNECEDORES_FOR_ID', $row['TPP_ID']);
                        $produto->__set('FK_TIPOS_PRODUTOS_TPP_ID', $row['FK_TIPOS_PRODUTOS_TPP_ID']);
                        $produto->__set('TPP_NOME', $row['TPP_NOME']);
                        array_push($produtos, $produto); //Inserindo os dados persistidos da tabela em um array
                    }
                }

                return $produtos; //retornando o array para mostagem da view
            } catch (\PDOException $ex) {
                header('Location: /error103');
                die();
            }
        }

        public function inserir($produto)
        {
            $valor = $produto->__get("PRO_VALOR");
            $nome = $produto->__get("PRO_NOME");
            $quantidade = $produto->__get("PRO_QUANTIDADE");
            $for_nome = $produto->__get("FOR_NOME");
            $for_tel = $produto->__get("FOR_TELEFONE");
            $for_email = $produto->__get("FOR_EMAIL");
            $for_cnpj = $produto->__get("FOR_CNPJ");
            $tpp_nome = $produto->__get("TPP_NOME");
            // Testa se o Fornecedor Existe Antes de Adicionar
            try{
                $sql = "SELECT * FROM fornecedores WHERE FOR_CNPJ = :for_cnpj";
                $stmt = $this->getConn()->prepare($sql);
                $stmt->bindParam(":for_cnpj", $for_cnpj);
                $stmt->execute();
                $f = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                if($f){
                    try{
                        foreach($f as $row){
                            $fornecedor = new ProdutoModel();
                            $fornecedor->__set('FK_FORNECEDORES_FOR_ID', $row['FOR_ID']);
                        }
                        $fk_fornecedores = $fornecedor->__get("FK_FORNECEDORES_FOR_ID");
                        
                        $sql = "SELECT * FROM tipos_produtos WHERE TPP_NOME = :tpp_nome";
                        $stmt = $this->getConn()->prepare($sql);
                        $stmt->bindParam(":tpp_nome", $tpp_nome);
                        $stmt->execute();
                        $tp = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        if($tp){
                            foreach($tp as $row){
                                $fk_tpp = new ProdutoModel();
                                $fk_tpp->__set('FK_TIPOS_PRODUTOS_TPP_ID', $row['TPP_ID']);
                            }
                            try{
                                $fk_tpp_id = $fk_tpp->__get('FK_TIPOS_PRODUTOS_TPP_ID');
                                $sql = "INSERT INTO PRODUTOS (PRO_VALOR, PRO_NOME, PRO_QUANTIDADE, FK_FORNECEDORES_FOR_ID, FK_TIPOS_PRODUTOS_TPP_ID) values (:valor, :nome, :qtdd, :fkfor, :tppid)";
                                $stmt = $this->getConn()->prepare($sql);
                                $stmt->bindParam(":valor", $valor);
                                $stmt->bindParam(":nome", $nome);
                                $stmt->bindParam(":qtdd", $quantidade);
                                $stmt->bindParam(":fkfor", $fk_fornecedores);
                                $stmt->bindParam(':tppid', $fk_tpp_id);
                                $stmt->execute();
                            }catch(\PDOException $ex){
                                header('Location: /error111?msg='.$ex);
                                die();
                            }
                        }else{
                            // $sql = "INSERT INTO TIPOS_PRODUTOS(TPP_NOME) VALUES (:nome)";
                            // $stmt = $this->getConn()->prepare($sql);
                            // $stmt->bindParam(":nome", $tpp_nome);
                            // $stmt->execute();
                            header('Location: /produto/inserirProduto?msg=TIPO_DE_PRODUTO_NÃO_EXISTE');
                            die();
                        }
                    }catch(\PDOException $ex){
                        header('Location: /error111?msg='.$ex);
                        die();
                    }
                }else{
                    // $sql = "INSERT INTO FORNECEDORES(FOR_NOME, FOR_TELEFONE, FOR_EMAIL, FOR_CNPJ) VALUES (:nome, :tel, :email, :cnpj)";
                    // $stmt = $this->getConn()->prepare($sql);
                    // $stmt->bindParam(":nome", $for_nome);
                    // $stmt->bindParam(":tel", $for_tel);
                    // $stmt->bindParam(":email", $for_email);
                    // $stmt->bindParam(":cnpj", $for_cnpj);
                    // $stmt->execute();
                    header('Location: /produto/inserirProduto?msg=FORNECEDOR_NÃO_EXISTE');
                    die();
                }

            }catch(\PDOException $ex){
                header('Location: /error111?msg='.$ex);
                die();
            }
            // try{
            //     $sql = "INSERT INTO PRODUTOS (PRO_VALOR, PRO_NOME, PRO_QUANTIDADE) values (:valor, :nome, :qtdd)";
            //     $sql2 = "INSERT INTO FORNECEDORES()";

            //     $stmt = $this->getConn()->prepare($sql);
            //     $stmt->bindParam(":valor", $valor);
            //     $stmt->bindParam(":nome", $nome);
            //     $stmt->bindParam(":qtdd", $quantidade);
            //     $stmt->bindParam(":fnome", $for_nome);
            //     $stmt->bindParam(":tel", $for_tel);
            //     $stmt->bindParam(":email", $for_email);
            //     $stmt->bindParam(":cnpj", $for_cnpj);
            //     $stmt->execute();
            // }catch(\PDOException $ex){
            //     header('Location: /error105');
            //     die();
            // }
        }
        public function excluir($obj)
        {
            
        }
        public function alterar($obj)
        {
            
        }
        public function buscarPorId($obj){}
    }
?>