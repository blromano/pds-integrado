<?php
include '../../../dao/mod05/OrgaosColabDAO.php';

$orgDAO = new OrgaosColabDAO();
$org = new OrgaosColab(null, $_POST['nome'], $_POST['contato'], $_POST['email']);
echo  $orgDAO->criar($org);
