<?php
/**
 * 133-Start-master - login.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 06.01.2020 09:21
 */
//ouverture MEMOIR TAMPONT  (tout ce qui se situera en dessous sa va le sauvgarder)
ob_start();
$titre="Rent A Snow - Login";
?>


    <form class="form" method='POST' action="index.php?action=login">
        <label >Utilisateur</label>
        <input type="text" name="username" placeholder="Enter Username" id="username" required>
        <br>
        <label>Mot de passe</label>
        <input type="text" name="password" placeholder="Enter Password" id="password" required>
        <br>
        <input type="submit" name="boutton">
    </form>

<?php




// ob_get_clean va clotturer puis $content va valoire tous se qu'il y a depuis ob_start
$contenu = ob_get_clean();


//appelle le ficher et faut que gabarit.php exicte IMPORTANT
require "gabarit.php";















