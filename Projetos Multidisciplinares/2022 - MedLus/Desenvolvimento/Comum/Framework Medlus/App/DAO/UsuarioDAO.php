<?php

namespace App\DAO;

use App\DAO;
use App\Model\UsuariosModel;

class UsuarioDAO extends DAO
{


    // public function adicionarUsuario($usuario){

    //     $cpf = $usuario->__get('USU_CPF');
    //     $rg = $usuario->__get('USU_RG');
    //     $email = $usuario->__get('USU_EMAIL');
    //     $senha = $usuario->__get('USU_SENHA');
    //     $cel = $usuario->__get('USU_NUMERO_CELULAR');
    //     $tel = $usuario->__get('USU_TELEFONE');
    //     $datan = $usuario->__get('USU_DATA_DE_NASCIMENTO');
    //     $nome = $usuario->__get('USU_NOME');
    //     $nres = $usuario->__get('USU_NUMERO_RESIDENCIA');
    //     $sexo = $usuario->__get('USU_SEXO');
    //     $cep = $usuario->__get('USU_CEP');
    //     $compl = $usuario->__get('USU_COMPLEMENTO');
    //     $foto = $usuario->__get('USU_FOTO');
    //     $nomeso = $usuario->__get('USU_NOME_SOCIAL');




    //     $this->sql = "INSERT INTO $this->tabela (
    //                         USU_CPF,
    //                         USU_RG,
    //                         USU_EMAIL,
    //                         USU_SENHA,
    //                         USU_NUMERO_CELULAR,
    //                         USU_TELEFONE,
    //                         USU_DATA_DE_NASCIMENTO,
    //                         USU_NOME,
    //                         USU_NUMERO_RESIDENCIA,
    //                         USU_SEXO
    //                         USU_CEP,
    //                         USU_COMPLEMENTO,
    //                         USU_FOTO,
    //                         USU_NOME_SOCIAL
    //                     ) VALUES (
    //                         :usu_cpf,
    //                         :usu_rg,
    //                         :usu_email,
    //                         :usu_senha,
    //                         :usu_numero_celular,
    //                         :usu_telefone,
    //                         :usu_data_de_nascimento,
    //                         :usu_nome,
    //                         :usu_numero_residencia,
    //                         :usu_sexo,
    //                         :usu_cep,
    //                         :usu_complemento,
    //                         :usu_foto,
    //                         :usu_nome_social
    //                     )";

    //     $this->resultado = $this->conexao->prepare($this->sql);                
    //     $this->resultado->bindParam(':usu_cpf', $cpf);
    //     $this->resultado->bindParam(':usu_rg',$rg);
    //     $this->resultado->bindParam(':usu_email', $email);
    //     $this->resultado->bindParam(':usu_senha', $senha);
    //     $this->resultado->bindParam(':usu_numero_celular', $cel);
    //     $this->resultado->bindParam(':usu_telefone', $tel);
    //     $this->resultado->bindParam(':usu_data_de_nascimento', $datan);
    //     $this->resultado->bindParam(':usu_nome', $nome);
    //     $this->resultado->bindParam(':usu_numero_residencia', $nres);
    //     $this->resultado->bindParam(':usu_sexo', $sexo);
    //     $this->resultado->bindParam(':usu_cep', $cep);
    //     $this->resultado->bindParam(':usu_complemento', $compl);
    //     $this->resultado->bindParam(':usu_foto', $foto);
    //     $this->resultado->bindParam(':usu_nome_social', $nomeso);


    //     $this->resultado->execute();
    // }

    public function listarFuncionarios()
    {
        try {
            $usuarios = array();
            $sql = "SELECT * FROM usuarios WHERE USU_ATIVO=1 AND (USU_TIPO='enfermeiro' OR USU_TIPO='medico' OR USU_TIPO='secretario') ORDER BY USU_ID ASC ";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $usuario = new UsuariosModel();
                $usuario->__set('USU_ID', $row['USU_ID']);
                $usuario->__set('USU_CPF', $row['USU_CPF']);
                $usuario->__set('USU_RG', $row['USU_RG']);
                $usuario->__set('USU_EMAIL', $row['USU_EMAIL']);
                $usuario->__set('USU_SENHA', $row['USU_SENHA']);
                $usuario->__set('USU_NUMERO_CELULAR', $row['USU_NUMERO_CELULAR']);
                $usuario->__set('USU_TELEFONE', $row['USU_TELEFONE']);
                $usuario->__set('USU_DATA_DE_NASCIMENTO', $row['USU_DATA_DE_NASCIMENTO']);
                $usuario->__set('USU_NOME', $row['USU_NOME']);
                $usuario->__set('USU_NUMERO_RESIDENCIA', $row['USU_NUMERO_RESIDENCIA']);
                $usuario->__set('USU_SEXO', $row['USU_SEXO']);
                $usuario->__set('USU_CEP', $row['USU_CEP']);
                $usuario->__set('USU_COMPLEMENTO', $row['USU_COMPLEMENTO']);
                $usuario->__set('USU_FOTO', $row['USU_FOTO']);
                $usuario->__set('USU_NOME_SOCIAL', $row['USU_NOME_SOCIAL']);
                $usuario->__set('USU_TIPO', $row['USU_TIPO']);


                array_push($usuarios, $usuario); //Inserindo os dados persistidos da tabela em um array
            }

            return $usuarios; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }


    public function listar()
    {
        try {
            $usuarios = array();
            $sql = "SELECT * FROM usuarios ORDER BY USU_ID ASC ";

            $stmt = $this->getConn()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $usuario = new UsuariosModel();
                $usuario->__set('USU_ID', $row['USU_ID']);
                $usuario->__set('USU_CPF', $row['USU_CPF']);
                $usuario->__set('USU_RG', $row['USU_RG']);
                $usuario->__set('USU_EMAIL', $row['USU_EMAIL']);
                $usuario->__set('USU_SENHA', $row['USU_SENHA']);
                $usuario->__set('USU_NUMERO_CELULAR', $row['USU_NUMERO_CELULAR']);
                $usuario->__set('USU_TELEFONE', $row['USU_TELEFONE']);
                $usuario->__set('USU_DATA_DE_NASCIMENTO', $row['USU_DATA_DE_NASCIMENTO']);
                $usuario->__set('USU_NOME', $row['USU_NOME']);
                $usuario->__set('USU_NUMERO_RESIDENCIA', $row['USU_NUMERO_RESIDENCIA']);
                $usuario->__set('USU_SEXO', $row['USU_SEXO']);
                $usuario->__set('USU_CEP', $row['USU_CEP']);
                $usuario->__set('USU_COMPLEMENTO', $row['USU_COMPLEMENTO']);
                $usuario->__set('USU_FOTO', $row['USU_FOTO']);
                $usuario->__set('USU_NOME_SOCIAL', $row['USU_NOME_SOCIAL']);


                array_push($usuarios, $usuario); //Inserindo os dados persistidos da tabela em um array
            }

            return $usuarios; //retornando o array para mostagem da view
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    public function alterar($usuario)
    {
        try {
            $sql = "UPDATE pacientes SET USU_CPF=:cpf, USU_RG=rg, USU_EMAIL=email, USU_SENHA=senha, USU_NUMERO_CELULAR=numero_celular, USU_TELEFONE=telefona, USU_DATA_DE_NASCIMENTO=data_de_nascimento, USU_NOME=nome, USU_NUMERO_RESIDENCIA=numero_residencia, USU_SEXO=sexo, USU_CEP=cep, USU_COMPLEMENTO=complemento, USU_FOTO=foto, USU_NOME_SOCIAL=nome_social WHERE USU_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':id', $usuario->__get('USU_ID'));
            $stmt->bindParam(':cpf', $usuario->__get('USU_CPF'));
            $stmt->bindParam(':rg', $usuario->__get('USU_RG'));
            $stmt->bindParam(':email', $usuario->__get('USU_EMAIL'));
            $stmt->bindParam(':senha', $usuario->__get('USU_SENHA'));
            $stmt->bindParam(':numero_celular', $usuario->__get('USU_NUMERO_CELULAR'));
            $stmt->bindParam(':telefone', $usuario->__get('USU_TELEFONE'));
            $stmt->bindParam(':data_de_nascimento', $usuario->__get('USU_DATA_DE_NASCIMENTO'));
            $stmt->bindParam(':nome', $usuario->__get('USU_NOME'));
            $stmt->bindParam(':numero_residencia', $usuario->__get('USU_RESIDENCIAL'));
            $stmt->bindParam(':sexo', $usuario->__get('USU_SEXO'));
            $stmt->bindParam(':cep', $usuario->__get('USU_CEP'));
            $stmt->bindParam(':complemento', $usuario->__get('USU_COMPLEMENTO'));
            $stmt->bindParam(':foto', $usuario->__get('USU_FOTO'));
            $stmt->bindParam(':nome_social', $usuario->__get('USU_NOME_SOCIAL'));


            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error101');
            die();
        }
    }
    public function excluir($id)
    {
        try {
            $sql = "UPDATE usuarios SET USU_ATIVO=0 WHERE USU_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (\PDOException $ex) {
            header('Location: /error102');
            die();
        }
    }

    public function inserir($usuario)
    {
        try {
            $sql = "INSERT INTO usuarios (
                    USU_CPF, 
                    USU_RG, 
                    USU_EMAIL, 
                    USU_SENHA, 
                    USU_NUMERO_CELULAR, 
                    USU_TELEFONE, 
                    USU_DATA_DE_NASCIMENTO, 
                    USU_NOME, 
                    USU_NUMERO_RESIDENCIA, 
                    USU_SEXO, 
                    USU_CEP, 
                    USU_COMPLEMENTO, 
                    USU_FOTO,
                    USU_ATIVO,
                    USU_TIPO,
                    USU_NOME_SOCIAL
                ) values (
                    :cpf,
                    :rg, 
                    :email, 
                    :senha, 
                    :numero_celular, 
                    :telefone, 
                    :data_de_nascimento, 
                    :nome, 
                    :numero_residencia, 
                    :sexo, 
                    :cep, 
                    :complemento,
                    :foto,
                    :ativo,
                    :tipo,
                    :nome_social
                )";
            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(':cpf', $usuario->__get('USU_CPF'));
            $stmt->bindParam(':rg', $usuario->__get('USU_RG'));
            $stmt->bindParam(':email', $usuario->__get('USU_EMAIL'));
            $stmt->bindParam(':senha', $usuario->__get('USU_SENHA'));
            $stmt->bindParam(':numero_celular', $usuario->__get('USU_NUMERO_CELULAR'));
            $stmt->bindParam(':telefone', $usuario->__get('USU_TELEFONE'));
            $stmt->bindParam(':data_de_nascimento', $usuario->__get('USU_DATA_DE_NASCIMENTO'));
            $stmt->bindParam(':nome', $usuario->__get('USU_NOME'));
            $stmt->bindParam(':numero_residencia', $usuario->__get('USU_NUMERO_RESIDENCIA'));
            $stmt->bindParam(':sexo', $usuario->__get('USU_SEXO'));
            $stmt->bindParam(':cep', $usuario->__get('USU_CEP'));
            $stmt->bindParam(':complemento', $usuario->__get('USU_COMPLEMENTO'));
            $stmt->bindParam(':foto', $usuario->__get('USU_FOTO'));
            $stmt->bindParam(':ativo', $usuario->__get('USU_ATIVO'));
            $stmt->bindParam(':tipo', $usuario->__get('USU_TIPO'));
            $stmt->bindParam(':nome_social', $usuario->__get('USU_NOME_SOCIAL'));

            $stmt->execute();

            return $this->getConn()->lastInsertId('USU_ID');
        } catch (\PDOException $ex) {
            header('Location: /error100');
            die();
        }
    }

    public function buscarPorId($id)
    {
        try {
            $sql = "SELECT * FROM usuarios WHERE USU_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {
                $usuario = new UsuariosModel();
                $usuario->__set('USU_ID', $result['USU_ID']);
                $usuario->__set('USU_CPF', $result['USU_CPF']);
                $usuario->__set('USU_RG', $result['USU_RG']);
                $usuario->__set('USU_EMAIL', $result['USU_EMAIL']);
                $usuario->__set('USU_SENHA', $result['USU_SENHA']);
                $usuario->__set('USU_NUMERO_CELULAR', $result['USU_NUMERO_CELULAR']);
                $usuario->__set('USU_TELEFONE', $result['USU_TELEFONE']);
                $usuario->__set('USU_DATA_DE_NASCIMENTO', $result['USU_DATA_DE_NASCIMENTO']);
                $usuario->__set('USU_NOME', $result['USU_NOME']);
                $usuario->__set('USU_NUMERO_RESIDENCIA', $result['USU_NUMERO_RESIDENCIA']);
                $usuario->__set('USU_SEXO', $result['USU_SEXO']);
                $usuario->__set('USU_CEP', $result['USU_CEP']);
                $usuario->__set('USU_COMPLEMENTO', $result['USU_COMPLEMENTO']);
                $usuario->__set('USU_FOTO', $result['USU_FOTO']);
                $usuario->__set('USU_NOME_SOCIAL', $result['USU_NOME_SOCIAL']);



                return $usuario;
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    /*  Inicio módulo 2 */

    public function buscarNome($id)
    {
        try {
            $sql = "SELECT USU_NOME FROM usuarios WHERE USU_ID=:id";

            $stmt = $this->getConn()->prepare($sql);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($result > 0) {/* 
                    $usuario = new UsuariosModel();
                    $usuario->__set('USU_NOME', $result['USU_NOME']); */

                echo $result['USU_NOME'];
            } else {
                return null;
            }
        } catch (\PDOException $ex) {
            header('Location: /error103');
            die();
        }
    }

    /*  Fim módulo 2 */
}
