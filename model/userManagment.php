<?php


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