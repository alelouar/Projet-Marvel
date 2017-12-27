<?php 


class RegisterControlleur extends Controlleur{

    public function login(array $user): ?string{ 
        //typage donné en sortie(null ou string);

        if(!isset($user["email"]) || !isset($user["password"]) || !isset($user["username"]))//veri existance
        return "view/no-connect/register.php";

        if(empty(trim($user["email"])) || empty(trim($user["password"])) || empty(trim($user["username"])))//verif si rempli
        return "view/no-connect/register.php";

        $email = htmlspecialchars(trim($user["email"]));//modif balise html
        $password = strip_tags(trim($user["password"]));//suppression des balises html php
        $username = strip_tags(trim($user["username"]));


        if(!$this->validateEmail($email))//verif de email
        return "view/no-connect/register.php";

        if($email == "toto@toto.toto"  && $password = "toto"){//connection
            $_SESSION["user"] = $user;
            return "view/connect/index.php";
        }else
        return "view/no-connect/register.php";
    }

}