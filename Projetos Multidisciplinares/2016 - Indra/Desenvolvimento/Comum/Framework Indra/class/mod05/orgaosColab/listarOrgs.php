<?php
include '../../../dao/mod05/OrgaosColabDAO.php';

$DAO = new OrgaosColabDAO();

$orgs = $DAO->listar();
echo json_encode($orgs);

