<?php
session_start();


$_SESSION['id'] = $_POST['id'];

header('location:?mod=palimentar&sub=EditarFichaConsulta');

?>

