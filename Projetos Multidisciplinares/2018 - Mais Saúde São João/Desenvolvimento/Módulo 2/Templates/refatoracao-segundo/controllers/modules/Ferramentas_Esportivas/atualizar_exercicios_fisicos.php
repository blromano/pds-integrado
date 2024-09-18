<?php

include "../../../classes/DAO/exercicios_fisicos_DAO.php";
include "../../../classes/exercicios_fisicos.php";

$nome = $_POST["txt_n_exercicio"];
$descricao = $_POST["txt_d_exercicio"];
$codigo = $_POST["txt_c_exercicio"];
var_dump($_FILES["file_gif_exercicio"]);
if(isset($_FILES["file_gif_exercicio"]))
    $gif = $_FILES["file_gif_exercicio"]["name"];
else
    $gif="0";
$unm = $_POST["unidade_exercicio"];
$tef = $_POST["tipos_exercicios"];
$dmef = $_POST ["url_vd_exercicio"];

$obj_ef = new exercicios_fisicos();

$obj_ef ->setexf_nome($nome);
$obj_ef ->setexf_descricao($descricao);
$obj_ef ->setexf_codigo($codigo);
$obj_ef ->setexf_como_executar_gif($gif);
$obj_ef ->setexf_demonstracao_youtube($dmef);
$obj_ef ->setfk_tipos_exercicios_fisicos_tef_codigo($tef);
$obj_ef ->setfk_unidades_de_medidas_umn_codigo($unm);

$obj_ef_dao = new exercicios_fisicos_DAO();
$obj_ef_dao->alterar($obj_ef);

var_dump($gif);

try {
    if($gif!="0"){
    $target_dir = "../../../assets/images/mod06/";
    $target_file = $target_dir . basename($_FILES["file_gif_exercicio"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file_gif_exercicio"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file_gif_exercicio"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["file_gif_exercicio"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }}

         echo "<script> alert('Alterado com sucesso');</script>";
    } 
    catch (Exception $e) {
         echo 'Erro ao alterar:', $e->getMessage(), "\n";
    }

   header("location:../../../index.php?mod=fesportivas&sub=view_ef");
