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

    $requete = "SELECT * FROM snows ;";
    $request = executeQuery($requete);

    return $request;
}