<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Samuel
 */
interface ModeloDAO {

    /**
     * Serve para adicionar uma classe no banco de dados. A principio a classe
     * não tem uma <b>Id</b> definida, após ser criada na Base de Dados ela ganha
     * uma <b>Id</b>.
     * @param Entidade $entidade Entidade a ser persistida na base de dados
     * @return Entidade com <b>Id</b> definida pela Base de Dados.
     */
    function Criar($entidade);
    
    /**
     * Atualiza uma entidade com base no <b>Id</b> dela.
     * @param Entidade $entidade Entidade a ser atualizada
     * @return boolean Retorna verdadeiro se a operação ocorreu corretamente.
     */
    function Atualizar($entidade);
    
    /**
     * Deleta a Entidade da Base de Dados.
     * @param int $id Id do elemento
     * @return boolean Retorna verdadeiro se a operação ocorreu corretamente.
     */
    function Deletar($id);
    
    /**
     * Recupera uma Entidade da Base de dados, transformando em um objeto.
     * @param int $id <b>Id</b> a ser procurada na Base de Dados
     * @return Entidade Retorna o objeto mapeado da Entidade.
     */
    function ProcurarPorID($id);
    
    /**
     * Retorna todos a lista das entidades no Banco de Dados.
     * @return Array Retorna a lista de entidades na base de dados.
     */
    function Listar();
    
}
