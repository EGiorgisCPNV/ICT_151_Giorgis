<?php
/**
 * ICT_151_Giorgis - snowManagment.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 04.03.2020 14:38
 */


//cette fonction va afficher les snows
function showSnows()
{

    $requete = "SELECT * FROM snows;";
    $request = executeQuery($requete);

    return $request;
}


//cette fonction va afficher un snow precis
function showSingleSnow($code)
{

    $requete = "SELECT * FROM snows where code ='$code';";
    $request = executeQuery($requete);


    return $request;
}


//cette fonction juste chercher tout les code de chaque article
function codeVerification()
{

    $requete = "SELECT code FROM snows;";
    $request = executeQuery($requete);


    return $request;
}


//cette fonction va afficher un snow precis
function deleteSnows($codeDelete)
{

    $requete ="DELETE FROM snows WHERE code = '$codeDelete' ;";
    $request = executeQuery($requete);


    return $request;
}



//cette fonction va ajouter un snow dans la BD
function addSnow($code,$brand,$model,$snowLength,$qtyAvailable,$description,$dailyPrice,$photo){

    $requete ="INSERT INTO snows (code, brand, model, snowLength,qtyAvailable,description, dailyPrice,photo) VALUES ('$code','$brand','$model','$snowLength','$qtyAvailable','$description','$dailyPrice','$photo');";

    $request = executeQuery($requete);
    return $request;
}
