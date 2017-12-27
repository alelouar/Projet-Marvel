<?php
// require "view/no-connect/login.php";
require "config.php";
$view = "view/no-connect/login.php";

if($_GET){
    if(isset($_GET["page"])){
        foreach(PAGE_SITE as $key => $val){
            if($key == $_GET["page"]){
                $view = $val;
                break;
            }
        }
        
    }
}
if($_POST){

    require "controlleur/loginControlleur.php";
    $controlleurLogin = new LoginControlleur();
    $view = $controlleurLogin->login($_GET);

}
require $view;

// $isEmail = $controlleurLogin->validateEmail("zoub@i.da");
// var_dump($isEmail);




?>