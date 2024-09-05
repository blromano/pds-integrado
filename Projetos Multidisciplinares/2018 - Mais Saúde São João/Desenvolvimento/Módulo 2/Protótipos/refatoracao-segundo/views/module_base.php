
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker">
        <div class="container-fluid">
                <!-- <img class="position-absolute h-75 d-inline-block" src="resources/images/logo-texto.png" alt="logo_texto"> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <button class='btn btn-outline-light' onclick='openNav()'>Menu</button>
                <ul class="navbar-nav ml-auto active-hover">
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="./view.php?mod=Rede_Social"> Rede Social </a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="./view.php?mod=Treinos"> Treinamento </a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="./view.php?mod=Plano_Alimentar"> Nutrição </a>
                    </li>
                    <li class="nav-item clearfix border mx-2"></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png" style="width: 2rem">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="./view.php?mod=Usuarios">perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item btn-danger"  href="#">Sair</a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>



<div id="mySidenav" class="sidenav">
    <!-- ADICIONAR CADA LINK EM VERTICAL MENU LINKS -->
    <?php 
    

    foreach($vertical_menu_links as $name => $link): ?>
    <a href="<?=$link?>"><?=$name?></a>
    <?php endforeach; ?>
</div>

<script>
    var nav1aberta = true;
    var nav2aberta = true;

    function openNav() {

        document.getElementById("mySidenav").style.width = "250px";
        // document.getElementById("main").style.marginLeft = "250px";
        nav1aberta = false;
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0"; 
        //document.getElementById("main").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
        nav1aberta = true;
    }
</script>

