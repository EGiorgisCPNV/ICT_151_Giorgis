<?php
/**
 * Author   : esteban.giorgis@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 */

session_start();//ouvre la session







require_once "model/userManagment.php";
require_once "model/snowManagment.php";









//  |||||||||||||||    PAS DE $_GET['...']='...'     ||||||||||||||||  \\






/**
 * Function to redirect the user to the home page
 *  (epending the action received by the index)
 */
function home()
{
    require "view/home.php";
}

/**
 * Function to redirect the user to the register page
 *  (epending the action received by the index)
 */
function register($postRegister)
{

    if (isset ($postRegister['usernameRegister']) || isset ($postRegister['passwordRegister'])) {

        if (creatUser($postRegister)) {
            home();
        } else {
            require "view/register.php";

        }

    } else {
        require "view/register.php";

    }

}

/**
 * Function to redirect the user to the login page
 *  (epending the action received by the index)
 */
function login($postLogin)
{


    if (isset ($postLogin['username']) && isset ($postLogin['password'])) {

        //cette condition va checker ce que l'utilisateur va rentrer dans la page login est rediriger sur la page home si ce qu'il a rentrer correspond a la la fonction checkLogin dans le model.php sinon sur la page login sa sa ne corespond pas
        if (checkLogin($postLogin)) {
            home();
        } else {
            echo "Soit votre email ou soit votre mot de passe est incorrect";
            require "view/login.php";
        }


    } else
        require "view/login.php";


}


//cette fonction va rediriger vers la page qui affiche tous les snows pour la vue cliente
function snows()
{


    $tableauSnows = showSnows();
    require "view/snows.php";
}


//cette fonction va rediriger vers la page qui affiche les détails d'un snow
function singleSnow($code)
{


    $tableSingleSnow = detailSingleSnow($code);

    require "view/singleSnow.php";
}


//cette fonction va rediriger vers la page qui affiche les snows pour le vendeur
function snowsSeller()
{
    $tableauSnows = showSnows();
    require "view/snowsSeller.php";
}


//cette fonction va rediriger vers la fonction qui ajoutera un snow
function addSnows($postFormulaire)
{

    $Code = $postFormulaire["codeAdd"];
    $Brand = $postFormulaire["brandAdd"];
    $Model = $postFormulaire["modelAdd"];
    $SnowLength = $postFormulaire["snowLengthAdd"];
    $QtyAvailable = $postFormulaire["qtyAvailableAdd"];
    $Description = $postFormulaire["descriptionAdd"];
    $DailyPrice = $postFormulaire["dailyPriceAdd"];
    $Photo = $postFormulaire["photoAdd"];
    $Active = $postFormulaire["activeAdd"];

    $codeVerifier = showSingleCode($postFormulaire['codeAdd']);//A SAVOIR QUE TU DEVRA SPESIFIER QUEL CHAMPS DE LA BD ET QUEL LIGNE (TJR METTRE [0]) MAIS AVEC $codeVerifier (exemple : $codeVerifier[0]['code'], etc...)

    if (isset($Code)) {

        if ($Code != @$codeVerifier[0]['code']) {
            addSnow($Code, $Brand, $Model, $SnowLength ,$QtyAvailable,$Description,$DailyPrice,$Photo,$Active);
            echo "Snow ajouter";
        } else {
            echo "Vous avez ajouter un snow avec un code déjà existant, ajout annulée";
        }

    } else {
        echo "erreur dans l'ajout";
    }

    snowsSeller();

}


//cette fonction va rediriger vers la fonction qui supprimera un snow seulement si le snow n'a pas encore été supprimmer
function deleteSnow($Delete)
{


    $idVerifier = verifiRentsDetails($Delete['id']);//A SAVOIR QUE TU DEVRA SPESIFIER QUEL CHAMPS DE LA BD ET QUEL LIGNE (TJR METTRE [0]) MAIS AVEC $id (exemple : $id[0]['idSnow'], etc...)

    //cette condition sert a verifier si le snow est deja supprimer ou non
    if (isset($Delete['code'])) {

        if ($Delete['id'] != @$idVerifier[0]['idSnow']) {
            $tableauSnows = showSnows();
            deleteSnows($Delete['code']);
            echo "Le snow a bien été supprimmer";


        } else {
            echo "Il y a deja des gens qui ont acheter se modele";
        }


    } else {
        echo "Ce snow a deja été supprimer";
    }

    snowsSeller();

}


//cette fonction va rediriger vers la page updateSnowPage.php
function updateSnowPage($code)
{


    //$updateSingleSnow contiendra toutes les infos d'un snow par rapport a son code
    $updateSingleSnow = detailSingleSnow($code);

    //$tableauAncienCode contiendra juste un code sous forme de tableau (un foreache sera obligatoir pour l'utiliser)
    $tableauAncienCode=showSingleCode($code);

    require "view/updateSnowPage.php";

}



//cette fonction va rediriger vers la fonction qui modifira  un snow seulement si le snow n'existe pas déja
function updateSnow($detailSnow,$codePrecedent)
{


    $Code = $detailSnow["codeUpdate"];
    $Brand = $detailSnow["brandUpdate"];
    $Model = $detailSnow["modelUpdate"];
    $SnowLength = $detailSnow["snowLengthUpdate"];
    $QtyAvailable = $detailSnow["qtyAvailableUpdate"];
    $Description = $detailSnow["descriptionUpdate"];
    $DailyPrice = $detailSnow["dailyPriceUpdate"];
    $Photo = $detailSnow["photoUpdate"];
    $Active = $detailSnow["activeUpdate"];

    $codeVerifier = showSingleCode($detailSnow['codeUpdate']);//A SAVOIR QUE TU DEVRA SPESIFIER QUEL CHAMPS DE LA BD ET QUEL LIGNE (TJR METTRE [0]) MAIS AVEC $codeVerifier (exemple : $codeVerifier[0]['code'], etc...)

    if (isset($Code)) {

        if ($Code != @$codeVerifier[0]['code'] || $Code==$codePrecedent) {
            updateSnowBD($Code, $Brand, $Model, $SnowLength ,$QtyAvailable,$Description,$DailyPrice,$Photo,$Active,$codePrecedent);
            echo "Snow modifier";
        } else {
            echo "Ce code est deja pris, veillez en choisir un autre";
        }

    } else {
        echo "erreur dans la modification, vellier refaire votre manipulation";
    }

    snowsSeller();

}


//cette fonction va supprimer ce qu'il avait dans la $_SESSION puis appeler la fonction home()
function logout()
{
    $_SESSION = SESSION_destroy();
    home();
}



