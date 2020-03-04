<?php
/**
 * 133-Start-master - index.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 16.12.2019 14:23
 */


require "controler/controler.php";

//use case qui va rediriger vers la page avec la fonction choisie, example : home()
if(isset ($_GET['action'])){
    $Action=$_GET['action'];
    switch($Action){
        case 'home':
            home();
            break;

        case 'register':
            register(@$_POST);
            break;

        case 'login':
            login(@$_POST);
            break;

        case 'snows':
            snows();
            break;

        case 'logout':
            logout();
            break;

        default :
            home();

    }

}
else{
    home();
}

?>