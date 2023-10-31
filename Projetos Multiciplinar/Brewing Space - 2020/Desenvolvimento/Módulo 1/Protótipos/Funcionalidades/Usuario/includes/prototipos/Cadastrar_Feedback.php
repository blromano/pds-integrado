<?php
include '../dao/FeedbackDAO.php';
require_once '../modelo/Feedbacks.php';

$FEE_EMAIL = $_POST['FEE_EMAIL'];
$FEE_ASSUNTO = $_POST['FEE_ASSUNTO'];
$FEE_MENSAGEM = $_POST['FEE_MENSAGEM'];

$feedback = new Feedbacks();

$feedback->setFEE_EMAIL($FEE_EMAIL);
$feedback->setFEE_ASSUNTO($FEE_ASSUNTO);
$feedback->setFEE_MENSAGEM($FEE_MENSAGEM);

$feedbackDao = new FeedbackDAO();
$feedbackDao->cadastrar($feedback);

header('location: Enviar_Feedback.php?status=ok');
die();

