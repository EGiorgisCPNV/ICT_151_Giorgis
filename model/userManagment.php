<?php

require "dbConnector.php";


//cette fonction va créer un compte qui n'existe pas
function creatUser($post)
{

    $requeteCreateUser = "Select userEmailAddress, pseudo from users where userEmailAddress ='" . @$post['usernameRegister'] . "' and pseudo = '" . @$post['pseudoRegister'] . "';";
    $result = executeQuery($requeteCreateUser);


    //cette condition sert a vérifier si le compte inscrit exicte déjà
    if ($result) {
        echo "Ce compte existe déjà";
        return false;
    } else {
        if (@$post['passwordRegister'] == @$post['passwordConfirmRegister']) {


            $passwordHash = password_hash(@$post['passwordRegister'], PASSWORD_DEFAULT);
            $requeteCreate = "INSERT INTO users (userEmailAddress, userPsw, pseudo) VALUES ('" . @$post['usernameRegister'] . "','" . $passwordHash . "','" . @$post['pseudoRegister'] . "');";
            executeQuery($requeteCreate);
            return true;
        } else {
            echo "les deux mot de passe ne coresponde pas";
            return false;
        }

    }
}

//cette fonction regarde si le login inscrit est juste
function checkLogin($post)
{

    //cette requete sert a vérifier si ce qu'il a entrer comme username ou pseudo corresond a quelque chose dans la BD car on ne peut plus vérifier le password vu qu'il est hasher
    $requete = "SELECT userEmailAddress, userPsw, pseudo FROM users where userEmailAddress = '" . @$post['username']. "' OR pseudo ='" .@$post['pseudo']. "';";

    $result = executeQuery($requete);



    if ($result) {
        $passwordHash = $result[0]["userPsw"];

        if (password_verify(@$post['password'], $passwordHash)) {
            return true;
        } else {
            return false;
        }
    } else

        return false;

}