<?php


function checkLogin($post)
{

    $requete = "Select userEmailAddress, userPsw from users where userEmailAddress = '" .@$post['username']."' and userPsw = '".@$post['password']."';";

    require_once "dbConnector.php";

    $result=executeQuery($requete);

    if ($result) {

        return true;
    } else {
        return false;
    }
}