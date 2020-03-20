<?php

//soit on met require_once sur tous les fichier de managment ou alors te met juste un  require sur un seul
require_once "dbConnector.php";

//cette fonction regarde si le login inscrit est juste
function checkLogin($post)
{

    //cette requete sert a vérifier si ce qu'il a entrer comme username ou pseudo corresond a quelque chose dans la BD car on ne peut plus vérifier le password vu qu'il est hasher
    $requete = "SELECT userEmailAddress, userHashPsw, userType FROM users where userEmailAddress = '" . $post['username']. "';";

    $result = executeQuery($requete);


    if ($result) {
        $passwordHash = $result[0]["userHashPsw"];
        if (password_verify($post['password'], $passwordHash)) {
            $_SESSION['MotCle'] = $post['username'];//SESSION c'est comme un $_GET sauf qu'un $_GET c'est des chose de l'url contrairement a SESSION ou tu peut le faire égale a n'importequoi (MotCle c'est juste l'indentifiant de cette session)
            $_SESSION['MotCleAdmin'] = $result[0]["userType"];//SESSION c'est comme un $_GET sauf qu'un $_GET c'est des chose de l'url contrairement a SESSION ou tu peut le faire égale a n'importequoi(MotCleAdmin c'est juste l'indentifiant de cette session)
            return true;
        } else {
            return false;
        }


    } else
        return false;

}


//cette fonction va créer un compte qui n'existe pas
function creatUser($post)
{

    $requeteCreateUser = "Select userEmailAddress from users where userEmailAddress ='" . $post['usernameRegister'] . "';";
    $result = executeQuery($requeteCreateUser);


    //cette condition sert a vérifier si le compte inscrit exicte déjà
    if ($result) {
        echo "Ce compte existe déjà";
        return false;
    } else {
        if ($post['passwordRegister'] == $post['passwordConfirmRegister']) {


            $passwordHash = password_hash($post['passwordRegister'], PASSWORD_DEFAULT);
            $requeteCreate = "INSERT INTO users (userEmailAddress, userHashPsw) VALUES ('" . $post['usernameRegister']  . "','" . $passwordHash . "');";


            executeQuery($requeteCreate);
            return true;
        } else {
            echo "les deux mot de passe ne coresponde pas";
            return false;
        }

    }
}


