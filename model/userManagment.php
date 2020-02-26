<?php

//cette fonction regarde si le login inscrit est juste
function checkLogin($post)
{

    $requete = "Select userEmailAddress, userPsw from users where userEmailAddress = '" .@$post['username']."' and userPsw = '".@$post['password']."';";
    $requete2 = "Select userEmailAddress, userPsw from users where pseudo = '" .@$post['username']."' and userPsw = '".@$post['password']."';";
    require_once "dbConnector.php";

    $result=executeQuery($requete);
    $result2=executeQuery($requete2);

    if (@$result || @$result2) {

        return true;
    } else {

        return false;
    }
}


//cette fonction va créer un compte qui n'existe pas
function creatUser($post){

    $requeteCreateUser="Select userEmailAddress, pseudo from users where userEmailAddress ='" . @$post['usernameRegister'] . "' and pseudo = '" . @$post['pseudoRegister'] . "';";
    require_once "dbConnector.php";
    $result = executeQuery($requeteCreateUser);


    //cette condition sert a vérifier si le compte inscrit exicte déjà
    if($result){
        echo "Ce compte existe déjà";
        return false;
    }
    else{
        if(@$post['passwordRegister']==@$post['passwordConfirmRegister']){

           
            $passwordHash=password_hash(@$_POST['passwordRegister'], PASSWORD_DEFAULT);
            $requeteCreate="INSERT INTO users (userEmailAddress, userPsw, pseudo) VALUES ('" . @$post['usernameRegister']. "','" . $passwordHash . "','" . @$post['pseudoRegister'] . "');";
            executeQuery($requeteCreate);
            return true;
        }
        else{
            echo "les deux mot de passe ne coresponde pas";
            return false;
        }

    }
}