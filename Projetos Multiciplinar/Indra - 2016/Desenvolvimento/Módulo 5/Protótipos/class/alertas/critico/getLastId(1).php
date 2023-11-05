<?php

require_once '../../../dao/alertaCriticoDAO.php';

$alertaDAO = new alertaCriticoDAO();
echo $alertaDAO->getLastId();