<?php
/**
 * ICT_151_Giorgis - snowManagment.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 04.03.2020 14:38
 */

//soit on met require_once sur tous les fichier de managment ou alors te met juste un  require sur un seul
require_once "dbConnector.php";

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





//cette fonction va afficher un snow precis
function deleteSnows($codeDelete)
{

    $requete ="DELETE FROM snows WHERE code = '$codeDelete' ;";
    $request = executeQuery($requete);


    return $request;
}


//cette fonction juste chercher tout les code de chaque article
function codeVerification($code)
{

    $requete = "SELECT code FROM snows WHERE code='$code';";
    $request = executeQuery($requete);


    return $request;
}


//cette fonction va verifier tout les snows qui vont bientot etre vendu
function verifiRentsDetails($id)
{

    $requete ="SELECT idSnow FROM rentsdetails where idSnow='$id';";
    $request = executeQuery($requete);


    return $request;
}


//cette fonction va ajouter un snow dans la BD
function addSnow($code,$brand,$model,$snowLength,$qtyAvailable,$description,$dailyPrice,$photo,$active){

    $requete ="INSERT INTO snows (code, brand, model, snowLength,qtyAvailable,description,dailyPrice,photo,active) VALUES ('$code','$brand','$model','$snowLength','$qtyAvailable','$description','$dailyPrice','$photo','$active');";

    $request = executeQuery($requete);
    return $request;
}
