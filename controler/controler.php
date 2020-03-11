<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */

session_start();//ouvre la session

require "model/userManagment.php";
require "model/snowManagment.php";


/**
 * Function to redirect the user to the home page
 *  (epending the action received by the index)
 */
function home()
{
    $_GET['action'] = "home";
    require "view/home.php";
}

/**
 * Function to redirect the user to the register page
 *  (epending the action received by the index)
 */
function register($postRegister)
{
    $_GET['action'] = "register";



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
function login($postLoin)
{
    $_GET['action'] = "login";


    if (isset ($postLoin['username']) || isset ($postLoin['password'])) {


        //cette condition va checker ce que l'utilisateur va rentrer dans la page login est rediriger sur la page home si ce qu'il a rentrer correspond a la la fonction checkLogin dans le model.php sinon sur la page login sa sa ne corespond pas
        if (checkLogin($postLoin)) {

            home();
        } else {
            echo "Soit votre email ou soit votre mot de passe est incorrect";
            require "view/login.php";
        }




    } else
        require "view/login.php";


}


/**
 * Function to redirect the user to the produit page
 *  (epending the action received by the index)
 */
function snows()
{
    $_GET['action'] = "snows";

    $tableauSnows=showSnows();
    require "view/snows.php";
}



/**
 * Function to redirect the user to the produit page
 *  (epending the action received by the index)
 */
function singleSnow($code)
{
    $_GET['action'] = "singleSnow";

    $tableSingleSnow=showSingleSnow($code);

    require "view/singleSnow.php";
}


function snowsSeller()
{
    $_GET['action'] = "snowsSeller";

    require "view/snowsSeller.php";
}


//cette fonction va supprimer ce qu'il avait dans la $_SESSION puis appeler la fonction home()
function logout()
{
    $_SESSION = SESSION_destroy();
    home();
}



