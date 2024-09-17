<?php
include '../../../dao/mod05/paramDAO.php';

$paramDAO = new paramDAO();
echo $paramDAO->deletar($_POST['id']);

