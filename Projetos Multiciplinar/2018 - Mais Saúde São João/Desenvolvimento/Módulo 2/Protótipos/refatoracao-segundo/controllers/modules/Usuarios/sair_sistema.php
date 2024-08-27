
        <?php
        session_start();
        require_once '../../../classes/DAO/usuariosDAO.php';
        $objUSU = new usuariosDAO();
        $objUSU->SairUsuario();
        ?>

