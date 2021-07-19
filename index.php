<?php
require_once("./Controller/Post.php");
require_once("./Model/PostModel.php");
require_once("./Controller/User.php");
require_once("./Model/UserModel.php");
require_once("config/config.php");
require_once("./utils/utils-function.php");
$uri = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$reqURI = $_SERVER['REQUEST_URI'];
console_log($uri);

if(isset($_SERVER['REQUEST_URI'])){
    $url=$_SERVER['REQUEST_URI'];
    console_log($reqURI);
    switch ($url){
        case '/dangnhap':{
            console_log($url);
             $userController= new UserController();
             $userController->login();
             return ;
        }
    }
}

$action = "";
if (isset($_REQUEST["action"]))
{
    $action = $_REQUEST["action"];
    console_log($action);
}

switch ($action)
{

    case "profile":
        $controller = new UserController();
        $controller->profile();
        break;
    case "detail":
        $controller = new PostController();
        $controller->detail();
        break;
    case "addPost":
        $controller = new PostController();
        $controller->addPost();
        break;
    default:
        $controller = new PostController();
        $controller->index();
        break;
}

?>
