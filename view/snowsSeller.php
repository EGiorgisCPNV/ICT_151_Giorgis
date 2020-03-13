<?php
/**
 * ICT_151_Giorgis - snowsSeller.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 11.03.2020 14:17
 */


$titre = "snowsSeller";
$rows = 0; // Column count
ob_start();
?>


<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #titre {
        text-align: left;
        border: 3px solid black;
        padding: 8px;
    }


    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

</style>
<article>
    <header>
        <h2></h2>
        <div class="yox-view">


            <table>
                <tr>
                    <th id="titre">Code</th>
                    <th id="titre">Marque</th>
                    <th id="titre">Modèle</th>
                    <th id="titre">Longueur</th>
                    <th id="titre">Prix</th>
                    <th id="titre">Disponnibilité</th>
                    <th id="titre">Photo</th>
                    <th id="titre">Modifier</th>
                    <th id="titre">Supprimer</th>
                </tr>
                <?php foreach ($tableauSnows as $result) : ?>
                    <tr>

                        <td>
                            <a href="index.php?action=singleSnow&code=<?= $result['code']; ?>"><?= $result['code']; ?></a>
                        </td>
                        <td><p><?= $result['brand']; ?></p></td>
                        <td><p><?= $result['model']; ?></p></td>
                        <th><p><?= $result['snowLength']; ?> cm</p></th>
                        <th><p>CHF <?= $result['dailyPrice']; ?>.- / jour</p></th>
                        <th><p><?= $result['qtyAvailable']; ?></p></th>
                        <th><a href="view/content/images/<?= $result['code']; ?>_small.jpg" target="blank">
                                <!--lien quand tu cliques dessus-->
                                <img src="<?= $result['photo']; ?>_small" alt="<?= $result['code']; ?>_small">
                                <!--image qui va être affichée--></a></th>

                        <th><a href="" target="blank"><!--lien quand tu cliques dessus-->
                                <img src="view/content/images/modif.jpg" alt="<?= $result['code']; ?>_small">
                                <!--image qui va être affichée--></a></th>
                        <th><a href="index.php?action=deleteSnow&code=<?= $result['code']; ?>"><input type="button" value="Supprimer"></a></th>
                    </tr>
                <?php endforeach ?>
            </table>

        </div>
    </header>
</article>
<hr/>
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
