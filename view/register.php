<?php
/**
 * 133-Start-master - register.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 06.01.2020 09:21
 */
//ouverture MEMOIR TAMPONT  (tout ce qui se situera en dessous sa va le sauvgarder)
ob_start();
$titre="Rent A Snow - Register";
?>


    <form class="form" method='POST' action="index.php?action=register">
        <label >Utilisateur</label>
        <input type="text" name="usernameRegister" placeholder="Enter Username" id="usernameRegister" required>

        <br>
        <label>Pseudo</label>
        <input type="text" name="pseudoRegister" placeholder="Enter Password" id="pseudoRegister" required>

        <br>
        <label>Mot de passe</label>
        <input type="password" name="passwordRegister" placeholder="Enter Password" id="passwordRegister" required>

        <label>Connfirmer votre mot de passe</label>
        <input type="password" name="passwordConfirmRegister" placeholder="Enter Password" id="passwordConfirmRegister" required>
        <br>
        <input type="submit" name="boutton">
    </form>

<?php




// ob_get_clean va clotturer puis $content va valoire tous se qu'il y a depuis ob_start
$contenu = ob_get_clean();


//appelle le ficher et faut que gabarit.php exicte IMPORTANT
require "gabarit.php";















