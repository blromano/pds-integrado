<?php
include '../../../dao/mod05/OrgaosColabDAO.php';
$orgDAO = new OrgaosColabDAO();
echo json_encode(array(
    'valid' => !$orgDAO->emailExiste($_POST['email']),
));
