<?php

include '../../dao/OrgaosColabDAO.php';

$orgDAO = new OrgaosColabDAO();
echo $orgDAO->deletar($_POST['id']);
