<?php
$_DEFAULT_SUB = 'login';
$load_subdir = filter_input(INPUT_GET, "sub");
if(!isset($_GET["sub"]) || empty($_GET["sub"])) {
    header("Location: $_ROOT_PATH?mod=$_GET_REQUEST&sub=$_DEFAULT_SUB");
}

$sub_router_content     = file_get_contents(VIEWS_PATH.'modules/Usuarios/sub_router.json');
$sub_router_object      = json_decode($sub_router_content);

foreach($sub_router_object as $link => $dir) {
    if($load_subdir === $link) include(VIEWS_PATH.'modules/Usuarios/'.$dir);
}
