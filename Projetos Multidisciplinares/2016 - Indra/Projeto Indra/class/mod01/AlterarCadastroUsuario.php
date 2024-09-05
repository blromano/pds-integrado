<?php

include_once "../../dao/mod01/UsuarioDAO.php";

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$data = $ano . '-' . $mes . '-' . $dia;

$cepCampo = explode('-', $_POST['USU_CEP']);
$cep = $cepCampo[0] . $cepCampo[1];


$usuarioDAO = new UsuarioDAO();


$usuarioDAO->EditarUsuario($_POST['USU_NOME'], $data, $_POST['USU_SENHA'], $cep, $_POST['USU_CIDADE'], $_POST['USU_COMPLEMENTO'], $_POST['USU_NUMERO_RESIDENCIA'], $_POST['USU_RUA'], $_POST['USU_ID']);

//insira seu modal aqui!!! =)

switch ($_POST['NIV_ID']) {
    case 1:
        header('Location: ../../indra/mod01/indexNivel1.php');
        break;
    case 2:
        header('Location: ../../indra/mod01/indexNivel2.php');
        break;
    case 3:
        header('Location: ../../indra/mod01/indexNivel3.php');
        break;
    case 4:
        header('Location: ../../indra/mod01/indexNivel4.php');
        break;
    default:
        echo" <script> window.location='../../indra/mod01/index1.php' </script>";
        break;
}
?>
