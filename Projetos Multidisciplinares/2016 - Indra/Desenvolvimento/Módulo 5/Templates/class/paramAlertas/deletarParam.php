<?php
include '../../dao/paramDAO.php';

$paramDAO = new paramDAO();
echo $paramDAO->deletar($_POST['id']);

