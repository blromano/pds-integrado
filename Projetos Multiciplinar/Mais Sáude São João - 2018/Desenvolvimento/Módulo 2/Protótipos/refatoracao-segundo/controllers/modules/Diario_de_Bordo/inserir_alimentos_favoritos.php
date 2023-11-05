<?php

$usuario = 1;
include ('../../../classes/DAO/alimentos_favoritos_dao.php');
include ('../../../classes/alimentos_favoritos.php');

$id = $_GET["id"];
$id = str_replace('\'', '',$id);

$ali_fav_model = new ALIMENTOS_FAVORITOS();
$ali_fav_model->setFK_ALIMENTOS_ALI_CODIGO($id);
$ali_fav_model->setFK_USUARIOS_USU_CODIGO($usuario);

$insere_ali_fav = new ALIMENTOS_FAVORITOS_DAO();
$insere_ali_fav->inserir_alimento_favorito($ali_fav_model);
echo"<script language='javascript' type='text/javascript'>alert('Alimento Inserido com Sucesso com Sucesso');window.location.replace('../../../?mod=dbordo&sub=gerir_alimentos_favoritos');</script>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

