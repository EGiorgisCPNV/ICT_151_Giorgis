<?php
/**
 * ICT_151_Giorgis - snowsSeller.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 11.03.2020 14:17
 */


$titre="snowsSeller";

ob_start();
?>

<form class="form" method='POST' action="index.php?action=snowsSeller">
    <label >Utilisateur</label>
    <input type="text" name="usernameRegister" placeholder="Enter Username" id="usernameRegister" required>

    <br>
    <input type="submit" name="boutton">
</form>


<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
