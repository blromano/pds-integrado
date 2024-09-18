<?php // NÃO ALTERAR ESTE ARQUIVO 
define('ABSPATH', dirname(__FILE__));

$_WEB_HOST = filter_input(INPUT_SERVER, $_SERVER["HTTP_HOST"]);
//var_dump($_REQUEST_URI);
$_ROOT_PATH = (dirname($_SERVER['SCRIPT_NAME']) !== '/') ? dirname($_SERVER['SCRIPT_NAME']).'/' : '/';
$_GET_REQUEST = filter_input(INPUT_GET, "mod");
//var_dump($_GET_REQUEST);

define('DEBUG', true);
define('DB_NAME', '');
define('DB_HOST', '');
define('DB_PASS', '');
define('DB_USER', '');

if(DEBUG) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
} else {
    error_reporting(0);
    ini_set("display_errors", 0);
}

define('ROUTER_PATH', 'router.json');
define('VIEWS_PATH', 'views/');
define('CLASS_PATH', 'classes/');
define('CONTROLLERS_PATH', 'controllers/');

define('THEME_CSS_PATH', $_ROOT_PATH. 'styles/build/mssj-style.css');
define('THEME_JS_PATH', $_ROOT_PATH. 'bower_components/bootstrap/dist/js/bootstrap.js');
define('JQUERY_PATH', $_ROOT_PATH. 'bower_components/jquery/dist/jquery.js');
define('POPPER_PATH', $_ROOT_PATH. 'bower_components/popper.js/dist/umd/popper.js');
define('ANIMATIONS_PATH', $_ROOT_PATH.'scripts/animations.js');

if(!isset($_GET["ignore_router"])) {
    $_DEFAULT_MOD = 'home';
    if(!isset($_GET["mod"]) || empty($_GET["mod"])) {
        header("Location: $_ROOT_PATH?mod=$_DEFAULT_MOD");
    }
    
    $router_content     = file_get_contents(ROUTER_PATH);
    $router_object      = json_decode($router_content);
    
    $page_found = false;
    foreach($router_object as $link => $dir) {
        if($_GET_REQUEST === $link) {
            $page_found = true;
            include(VIEWS_PATH.$dir);
        }

    }

    if(!$page_found) {
        header("Location: $_ROOT_PATH?mod=$_DEFAULT_MOD");
    }
}



