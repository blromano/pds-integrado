<?php

$msg = "Olá\nObrigado por se cadastrar no INDRA!\nPara confirmar seu cadastro por favor clique aqui: www.indra.com\nCaso seu navegador não suporte nosso link, por favor insira este código: 007007\nA equipe do INDRA agradeço seu cadastro!\n\n\nCaso você não se inscreveu por favor ignore este email.";

mail("someone@example.com", "My subject", $msg);
?>
