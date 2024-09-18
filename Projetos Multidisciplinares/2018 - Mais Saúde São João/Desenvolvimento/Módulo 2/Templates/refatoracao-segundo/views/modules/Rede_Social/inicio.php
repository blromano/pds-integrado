<?php 
        require_once "Comentarios.php";
        require_once "Publicacoes.php";
?>
<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
                <link rel="icon" type="imagem/png" href="assets/images/icone_preto.png"/>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
        <link rel="stylesheet" href="<?=$_ROOT_PATH?>/styles/scss/rede_social.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
        <title>+ Saúde São João - Rede Social</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker">
                <div class="container-fluid">
                                        <img style="padding-left:50px;" class="position-absolute h-75 d-inline-block" src="assets/images/logo-texto.png" alt="logo_texto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
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
                                    <img src="<?=$_ROOT_PATH?>/assets/images/rede_social/perfil/1.jpg" class="w3-circle" style="width: 2rem">
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
            <br>
            <!-- Page Container -->
                        <div class="w3-container w3-content" style="max-width:1400px">    
                                <!-- The Grid -->
                                <div class="w3-row">
                                        <!-- Left Column -->
                                        <div class="w3-col m3">
                                                <!-- Profile -->
                                                <div class="w3-card w3-round w3-white">
                                                        <div class="w3-container">
                                                                <h4 class="w3-center">Eduardo Rodrigues</h4>
                                                                <p class="w3-center"><img src="<?=$_ROOT_PATH?>/assets/images/rede_social/perfil/1.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                                                                <hr>
                                                                <p><i class="fa fa-pencil fa-fw w3-margin-right du-text-theme"></i> Desenvolvedor</p>
                                                                <p><i class="fa fa-home fa-fw w3-margin-right du-text-theme"></i> São João da Boa Vista, SP</p>
                                                                <p><i class="fa fa-birthday-cake fa-fw w3-margin-right du-text-theme"></i> 31 de Agosto</p>
                                                        </div>
                                                </div>
                                                <br>      
                                                <div class="du-links">
                                                        <div class="du-card w3-round">
                                                                <div class="w3-container">
                                                                        <br>
                                                                        <button onclick="" class="w3-button w3-block w3-left-align"><i class="fa fa-heartbeat w3-margin-right"></i> #INDEFINIDO#</button>
                                                                        <button onclick="" class="w3-button w3-block w3-left-align"><i class="fa fa-cutlery w3-margin-right"></i> #INDEFINIDO#</button>
                                                                        <br>       
                                                                </div>
                                                        </div>
                                                </div>
                                                <br>
                                                <!-- End Left Column -->
                                        </div>
                                        <!-- Middle Column -->
                    <div class="w3-col m7">
                                                <div class="w3-row-padding">
                                                        <div class="w3-col m12">
                                                                <div class="w3-card w3-round w3-white">
                                                                        <div class="w3-container w3-padding">
                                                                                <h6 class="w3-opacity w3-center">O que você está pensando?</h6>
                                                                                        <?php 
                                                                                                echo'
                                                                                                <form id="form" action="'.$_ROOT_PATH.'?mod=rsocial&sub=realiza_publicacao" method="post" enctype="multipart/form-data">
                                                                                                        <textarea class="w3-border w3-padding" style="width:100%; resize:none; border:none" rows="5" type="text" name="conteudo" required></textarea>
                                                                                                        <br>
                                                                                                        <br>
                                                                                                        <center>
                                                                                                                <span class="w3-button w3-theme du-default du-file"><i class="fa fa-file-image-o"></i> Upload a Image <input type="file" name="arquivo" accept="image/*"></span>
                                                                                                                <span class="w3-button w3-theme du-default du-file"><i class="fa fa-file-video-o"></i> Upload a Vídeo <input type="file" name="video" accept="video/*"></span>
                                                                                                        </center>
                                                                                                        <hr class="w3-clear">
                                                                                                        <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Publicar</button> 
                                                                                                </form>';
                                                                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                                                <?php
                                                        $pub = new Publicacoes();
                                                        $comentario = new Comentario();
                                                        $i = 0;
                                                        foreach($pub->getPublicacao() as $publication)
                                                        {								
                                                                echo'
                                                                <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                                                                        <img src="'.$_ROOT_PATH.'/assets/images/rede_social/perfil/'.$publication['FK_USUARIOS_USU_CODIGO'].'.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                                                                        <span class="w3-right w3-opacity">'.$publication['PUB_DATA_HORA_PUBLICACAO'].'</span>
                                                                        <h4>Código do Usúario: '.$publication['FK_USUARIOS_USU_CODIGO'].'</h4>
                                                                        <br>									
                                                                        <hr class="w3-clear">
                                                                        <div class="dropdown">
                                                                                <button class="w3-button-link w3-right" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></button> 
                                                                                <ul class="dropdown-menu">
                                                                                        <button class="w3-button-link" data-toggle="modal" data-target="#modal_publications" onclick="setDadosModal('.$publication['PUB_CODIGO'].', \''.$publication['PUB_TEXTO'].'\', \''.$publication['PUB_IMAGEM'].'\', \''.$publication['PUB_VIDEO'].'\')"><i class="fa fa-edit"></i> Editar Publicação</button>
                                                                                        <div class="dropdown-divider"></div>
                                                                                        <button class="w3-button-link" data-toggle="modal" data-target="#exampleModal" onclick="setDadosModal2('.$publication['PUB_CODIGO'].')"><i class="fa fa-trash"></i> Excluir Publicação</button>
                                                                                </ul>
                                                                        </div>
                                                                        <p>'.$publication['PUB_TEXTO'].'</p>';
                                                                        if($publication['PUB_IMAGEM'] != null && $publication['PUB_VIDEO'] != null)
                                                                        {
                                                                                echo'
                                                                                <div class="w3-row-padding" style="margin:0 -16px">
                                                                                        <div class="w3-half">
                                                                                                <img src="'.$_ROOT_PATH.'/'.$publication['PUB_IMAGEM'].'" style="width:100%" alt="'.$publication['PUB_IMAGEM'].'" class="w3-margin-bottom">
                                                                                        </div>
                                                                                        <div class="w3-half">
                                                                                                <video controls="controls" width="100%" height="100%">
                                                                                                        <source src="'.$_ROOT_PATH.'/'.$publication['PUB_VIDEO'].'" width="100%" height="100%">										
                                                                                                </video>
                                                                                        </div>
                                                                                </div>';
                                                                        }
                                                                        else if($publication['PUB_IMAGEM'] != null && $publication['PUB_VIDEO'] == null)
                                                                        {
                                                                                echo'
                                                                                <div class="w3-row-padding" style="margin:0 -16px">
                                                                                        <div class="w3-half">
                                                                                                <img src="'.$_ROOT_PATH.'/'.$publication['PUB_IMAGEM'].'" style="width:100%" alt="'.$publication['PUB_IMAGEM'].'" class="w3-margin-bottom">
                                                                                        </div>
                                                                                </div>';
                                                                        }
                                                                        else if($publication['PUB_IMAGEM'] == null && $publication['PUB_VIDEO'] != null)
                                                                        {
                                                                                echo'
                                                                                <div class="w3-row-padding" style="margin:0 -16px">
                                                                                        <div class="w3-center">
                                                                                                <video controls="controls" width="100%" height="100%">
                                                                                                        <source src="'.$_ROOT_PATH.'/'.$publication['PUB_VIDEO'].'" width="100%" height="100%">										
                                                                                                </video>
                                                                                        </div>
                                                                                </div>';
                                                                        }
                                                                        echo'
                                                                        <hr class="w3-clear">
                                                                        <button type="button" class="w3-button w3-small w3-theme w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Curtir</button> 
                                                                        <button onclick="myFunction('.$publication['PUB_CODIGO'].')" type="button" class="w3-button w3-small w3-theme w3-margin-bottom"><i class="fa fa-comment"></i>  Comentar</button> 
                                                                        <button type="button" onclick="denuncia_pub('.$publication['PUB_TEXTO'].')" data-toggle="modal" data-target="#modal_denunciar_publicacao" class="w3-button w3-small w3-theme w3-margin-bottom w3-right"><i class="fa fa-ban"></i> Denunciar</button> 
                                                                        <div id="'.$publication['PUB_CODIGO'].'" class="w3-hide w3-container w3-block">
                                                                                <form id="comentario" style="padding-bottom:5px;" action="?mod=rsocial&sub=realiza_comentario" method="post" enctype="multipart/form-data">
                                                                                        <input class="du-comment" placeholder="Escreva um comentário!" type="text"style="width:100%;" name="comentario"/>
                                                                                        <input type="text" class="w3-hide" name="id_pub" value="'.$publication['PUB_CODIGO'].'"/>
                                                                                        <input type="submit" class="w3-hide"/>
                                                                                </form>';										
                                                                                foreach($comentario->getComentarios($publication['PUB_CODIGO']) as $bundinha)
                                                                                {
                                                                                        echo'
                                                                                        <div class="du-comment">
                                                                                                <a href="#" class="du-comment-avatar pull-left"><img class="w3-circle" src="'.$_ROOT_PATH.'/assets/images/rede_social/perfil/'.$bundinha['FK_USUARIOS_USU_CODIGO'].'.jpg" alt=""></a>
                                                                                                <span>Código do Usuario: '.$bundinha['FK_USUARIOS_USU_CODIGO'].'</span>												
                                                                                                <button class="w3-button-link w3-right" type="button" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button> 
                                                                                                <div class="dropdown-menu">
                                                                                                        <button class="w3-button-link" data-toggle="modal" data-target="#modal_coments" onclick="set_dados_comentario('.$bundinha['COM_CODIGO'].', \''.$bundinha['COM_CAMPO_TEXTO'].'\')"><i class="fa fa-edit"></i> Editar Comentário</button>
                                                                                                        <div class="dropdown-divider"></div>
                                                                                                        <button class="w3-button-link" data-toggle="modal" data-target="#modal_excluir_comentario" onclick="set_excluir_comentario('.$bundinha['COM_CODIGO'].')"><i class="fa fa-trash"></i> Excluir Comentário</button>
																										<div class="dropdown-divider"> </div>
																										 <button class="w3-button-link" data-toggle="modal" data-target="#modal_denunciar_comentario" ><i class="fa fa-ban"></i> Denunciar Comentário</button>
                                                                                                </div>
                                                                                                <div class="du-comment-text">
                                                                                                        <p>'.$bundinha['COM_CAMPO_TEXTO'].'</p>
                                                                                                </div>
                                                                                        </div>';
                                                                                }										
                                                                                echo'
                                                                                <br>
                                                                        </div>
                                                                </div>';
                                                        }
                                                ?>
                                                <!-- End Middle Column -->
                                        </div>    
                                        <!-- Right Column -->
                                        <div class="w3-col m2">
                                                <div class="w3-card w3-ound w3-white w3-center">
                                                        <div class="w3-container">
                                                                <p><br>Calcule seu IMC</p>
                                                                <img src="<?=$_ROOT_PATH?>/assets/images/rede_social/balance.jpeg" alt="Body Scales" style="width:50%"><br>
                                                                <p><button class="w3-button w3-theme">Clique Aqui!</button></p>
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="w3-card w3-round w3-white w3-center">
                                                        <div class="w3-container">
                                                                <p><br>Nova Consulta:</p>
                                                                <img src="<?=$_ROOT_PATH?>/assets/images/rede_social/consulta_medica.jpg" alt="Consulta Médica" style="width:100%;">
                                                                <p>Sexta-Feira 18:00</p>
                                                                <p><button class="w3-button w3-theme">Informações</button></p>
                                                        </div>
                                                </div>
                                        </div>    
                                        <!-- End Grid -->
                                </div>
                                <!-- End Page Container -->
                        </div>
                        <br>
                        <script>
                                // Accordion
                                function myFunction(id) {
                                        var x = document.getElementById(id);
                                        if (x.className.indexOf("w3-show") == -1) {
                                                x.className += " w3-show";
                                                x.previousElementSibling.className += " w3-theme-d1";
                                        } else { 
                                                x.className = x.className.replace("w3-show", "");
                                                x.previousElementSibling.className = 
                                                x.previousElementSibling.className.replace(" w3-theme-d1", "");
                                        }
                                }
                                // Used to toggle the menu on smaller screens when clicking on the menu button
                                function setDadosModal(id, texto, imagem, video) 
                                {				
                                        document.getElementById('cod_pub').value = id;	
                                        document.getElementById('text_pub').value = texto;	
                                        document.getElementById('img_pub').classList.add('w3-hide');
                                        document.getElementById("img_button").classList.add('w3-hide');
                                        document.getElementById("insert_img_button").classList.remove('w3-hide');
                                        document.getElementById('control_video').classList.add('w3-hide');
                                        document.getElementById("video_button").classList.add('w3-hide');
                                        document.getElementById("insert_video_button").classList.remove('w3-hide');
                                        if((imagem != null) && (imagem != ""))
                                        {
                                                document.getElementById('img_pub').src = imagem;
                                                document.getElementById('img_pub').classList.remove('w3-hide');
                                                document.getElementById("img_button").classList.remove('w3-hide');
                                                document.getElementById("insert_img_button").classList.add('w3-hide');
                                        }
                                        if((video != null) && (video != ""))
                                        {
                                                document.getElementById('video_pub').src = video;
                                                document.getElementById("control_video").classList.remove('w3-hide');
                                                document.getElementById("video_button").classList.remove('w3-hide');
                                                document.getElementById("insert_video_button").classList.add('w3-hide');
                                        }
                                }
                                function setDadosModal2(id) 
                                {				
                                        document.getElementById('filhodaputa').value = id;	
                                }
                                function set_excluir_comentario(id) 
                                {				
                                        document.getElementById('id_comentario').value = id;	
                                }
function remove_image() 
{
        $.ajax({
                type: "POST",
                url: "views/modules/Rede_Social/controller/delete_arquivos.php",
                data:
                {
                        id: document.getElementById('cod_pub').value,
                        variavel: "imagem",
                },
                success: function(data) {
                        $('#modal-body').html(data);
                        alert(data);
                }
        });
        document.getElementById('img_pub').classList.add('w3-hide');
        document.getElementById('img_button').classList.add('w3-hide');
        document.getElementById('insert_img_button').classList.remove('w3-hide');
}
function remove_video() 
{
        $.ajax({
                type: "POST",
                url: "views/modules/Rede_Social/controller/delete_arquivos.php",
                data:
                {
                        id: document.getElementById('cod_pub').value,
                        variavel: "video",
                },
                success: function(data) {
                        $('#modal-body').html(data);
                        alert(data);
                }
        });
        document.getElementById('video_pub').classList.add('w3-hide');
        document.getElementById('video_button').classList.add('w3-hide');
        document.getElementById('insert_video_button').classList.remove('w3-hide');
        document.getElementById('control_video').classList.add('w3-hide');
}
function read_img(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#img_pub')
                .attr('src', e.target.result);
                };
                document.getElementById('img_pub').classList.remove('w3-hide');
                document.getElementById('img_button').classList.remove('w3-hide');
                document.getElementById('insert_img_button').classList.add('w3-hide');
                reader.readAsDataURL(input.files[0]);
        }
}
function read_video(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#video_pub')
                .attr('src', e.target.result);
                };
                document.getElementById('control_video').classList.remove('w3-hide');
                document.getElementById('video_pub').classList.remove('w3-hide');
                document.getElementById('video_button').classList.remove('w3-hide');
                document.getElementById('insert_video_button').classList.add('w3-hide');
                reader.readAsDataURL(input.files[0]);
        }
}

function set_dados_comentario(id, texto) {
document.getElementById('codigo').value = id;	
document.getElementById('texto').value = texto;	
}

function denuncia_pub(texto)
{
	document.getElementById('pub_texto').value = texto;	
}
                        </script>
<!-- Modal Options Publications !-->
<?php
echo'

<!-- MODAL EDIT COMENTS -->
				<div class="modal fade" id="modal_coments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title w3-center" id="exampleModalLabel">Escolha sua ação!</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">						
								<form action="?mod=rsocial&sub=editar_comentario" method="post" enctype="multipart/form-data">
									<span class="w3-hide">Código: </span><textarea id="codigo" class="w3-hide w3-border w3-padding" style="width:100%; resize:none; border:none" rows="1" type="text" name="codigo"></textarea>
									<span>Texto: </span><textarea id="texto" class="w3-border w3-padding" style="width:100%; resize:none; border:none" rows="5" type="text" name="texto" required></textarea>
									<hr class="w3-clear">
									<button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Editar</button>
								</form>		
							</div>
						</div>
					</div>
				</div>
<div class="modal fade" id="modal_publications" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title w3-center" id="exampleModalLabel">Escolha sua ação!</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">						
<form action="?mod=rsocial&sub=editar_publicacao" method="post" enctype="multipart/form-data">
<span class="w3-hide">Código: </span><textarea id="cod_pub" class="w3-hide w3-border w3-padding" style="width:100%; resize:none; border:none" rows="1" type="text" name="cod_pub"></textarea>
<span> Imagem: </span>
<div class="w3-border w3-padding">
<img src="" id="img_pub" name="img_pub" style="width:100%;">
<br>
<br>
<button type="button" id="img_button" name="img_button" onclick=" remove_image()" class="w3-theme w3-button"><i class="fa fa-trash"></i> Excluir Imagem</button>
<span id="insert_img_button" name="insert_img_button" class="w3-button w3-theme du-default du-file"><i class="fa fa-file-image-o"></i> Inserir Imagem<input type="file" id="arquivo" name="arquivo" accept="image/*" onchange="read_img(this);" /></span>
</div>
<span>Video: </span>
<div class="w3-border w3-padding">	
<video id="control_video" controls="controls" width="100%" height="100%">
<source src="" id="video_pub" name="video_pub" width="100%" height="100%">										
</video>
<br>
<br>
<button type="button" id="video_button" name="video_button" onclick=" remove_video()" class="w3-theme w3-button"><i class="fa fa-trash"></i> Excluir Vídeo</button>
<span id="insert_video_button" name="insert_video_button" class="w3-button w3-theme du-default du-file"><i class="fa fa-file-image-o"></i> Inserir Vídeo<input type="file" id="video" name="video" accept="video/*" onchange="read_video(this);" /></span>
</div>
<span>Texto: </span><textarea id="text_pub" class="w3-border w3-padding" style="width:100%; resize:none; border:none" rows="5" type="text" name="text_pub" required></textarea>
<hr class="w3-clear">
<button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Editar</button>
</form>		
</div>
</div>
</div>
</div>
<!-- Modal Options Excluir -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Excluir Publicação</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form id="excluir_pub" style="padding-bottom:5px;" action="?mod=rsocial&sub=deletar_publicacao" method="post" enctype="multipart/form-data">
<div class="modal-body">	
<input type="text" name="filhodaputa" id="filhodaputa" class="w3-hide">
Você realmente deseja excluir essa publicação?
</div>
<div class="modal-footer">
<button type="button" class="w3-button w3-theme" data-dismiss="modal">Cancelar</button>
<button type="submit" class="w3-button w3-theme">Excluir</button>
</div>
</form>
</div>
</div>
</div>
<!-- Modal Options Excluir Comentario -->
<div class="modal fade" id="modal_excluir_comentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Excluir Publicação</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form id="excluir_comentario" style="padding-bottom:5px;" action="?mod=rsocial&sub=deletar_comentario" method="post" enctype="multipart/form-data">
<div class="modal-body">	
<input type="text" name="id_comentario" id="id_comentario" class="w3-hide">
Você realmente deseja excluir esse comentário?
</div>
<div class="modal-footer">
<button type="button" class="w3-button w3-theme" data-dismiss="modal">Cancelar</button>
<button type="submit" class="w3-button w3-theme">Excluir</button>
</div>
</form>
</div>
</div>
</div>
<!-- Modal Denunciar PUBLICACAO -->
<div class="modal fade" id="modal_denunciar_publicacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Escolha o motivo da denúncia</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form id="denunciar_publicacao" style="padding-bottom:5px;" action="?mod=rsocial&sub=denunciar_pub" method="post" enctype="multipart/form-data">
<div class="modal-body">	
<select >
  <option value="volvo"> O conteúdo não está relacionado ao tema do site</option>
  <option value="saab">	O conteúdo é impróprio com apelo sexual</option>
  <option value="mercedes">O conteúdo é ofensivo ou proibido</option>
  <option value="audi">O conteúdo não deveria estar no site</option>
  <option value="audi">	É spam</option>
 </select>

</div>
<div class="modal-footer">
<button type="button" class="w3-button w3-theme" data-dismiss="modal">Cancelar</button>
<button type="submit" class="w3-button w3-theme">Denunciar</button>
</div>
</form>
</div>
</div>
</div>
<!-- Modal Denunciar COMENTÁRIO -->
<div class="modal fade" id="modal_denunciar_comentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Escolha o motivo da denúncia</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<form id="denunciar_comentario" style="padding-bottom:5px;" action="?mod=rsocial&sub=denunciar_comentario" method="post" enctype="multipart/form-data">
<div class="modal-body">	
<select >
  
  <option value="volvo"> O conteúdo não está relacionado ao tema do site</option>
  <option value="saab">	O conteúdo é impróprio com apelo sexual</option>
  <option value="mercedes">O conteúdo é ofensivo ou proibido</option>
  <option value="audi">O conteúdo não deveria estar no site</option>
  <option value="audi">	É spam</option>
 </select>

</div>
<div class="modal-footer">
<button type="button" class="w3-button w3-theme" data-dismiss="modal">Cancelar</button>
<button type="submit" class="w3-button w3-theme">Denunciar</button>
</div>
</form>
</div>
</div>
</div>

';
?>
</header>
</body>
</html> 