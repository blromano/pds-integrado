<?php

require_once '../../../../dao/mod05/alertaCriticoDAO.php';

$alertaDAO = new alertaCriticoDAO();
echo $alertaDAO->getLastId();