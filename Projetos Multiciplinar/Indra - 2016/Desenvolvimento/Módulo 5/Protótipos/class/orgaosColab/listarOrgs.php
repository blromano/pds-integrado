<?php
include '../../dao/OrgaosColabDAO.php';

$DAO = new OrgaosColabDAO();

$orgs = $DAO->listar();
echo json_encode($orgs);

