<?php

class LoginControlleur{
    public function login(array $user): ?string{ 
        //typage donné en sortie(null ou string);

        if(!isset($user["email"]) || !isset($user["password"]))//veri existance
        return "view/no-connect/login.php";

        if(empty(trim($user["email"])) || empty(trim($user["password"])))//verif si rempli
        return "view/no-connect/login.php";

        $email = htmlspecialchars(trim($user["email"]));//modif balise html
        $password = strip_tags(trim($user["password"]));//suppression des balises html php

        if(!$this->validateEmail($email))//verif de email
        return "view/no-connect/login.php";

        if($email == "toto@toto.toto"  && $password = "toto"){//connection
            $_SESSION["user"] = $user;
            return "view/connect/index.php";
        }else
        return "view/no-connect/login.php";

    }

    public function validateEmail(string $email):bool {

        return(filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }

}


?>