<?php
session_start();

$_SESSION["CARDAPIO_USUARIO_ID"] = $_POST["CARDAPIO_USUARIO_ID"];

echo "<script>   
window.location.replace('../../../?mod=palimentar&sub=vida_alimentar_metas_do_paciente');
</script>";



