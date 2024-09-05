<?php

include '../../../dao/mod05/OrgaosColabDAO.php';

$orgDAO = new OrgaosColabDAO();
echo $orgDAO->deletar($_POST['id']);
