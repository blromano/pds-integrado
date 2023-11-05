<?php
include '../../../dao/mod05/OrgaosColabDAO.php';
$orgDAO = new OrgaosColabDAO();
$valid = false;

if(!$orgDAO->emailExiste($_POST['email'])){
$valid = true;
}

if($_POST['emailAntigo'] === $_POST['email']) {
	$valid = true;
}

echo json_encode(array(
    'valid' => $valid,
));
