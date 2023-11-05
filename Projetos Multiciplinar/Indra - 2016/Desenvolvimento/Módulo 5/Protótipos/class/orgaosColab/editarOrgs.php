<?php
include '../../dao/OrgaosColabDAO.php';

$orgDAO = new OrgaosColabDAO();
$org = new OrgaosColab($_POST['id'], $_POST['nome'], $_POST['contato'], $_POST['email']);
$org->setId($_POST['id']);
echo $orgDAO->editar($org);
