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


    /* The popup form - hidden by default */
    .formulaireAjouter {
        animation: fadein 5s;
        display: none;
        position: absolute;
        width: 400px;
        height: auto;
        left: 0;
        right: 0;
        margin: auto;
        padding-left: 3px;
        border: solid 1px black;
        background-color: #149bdf;
    }

    /* The popup form - hidden by default */
    .formulaireModifier {
        animation: fadein 5s;
        display: none;
        position: absolute;
        width: 400px;
        height: auto;
        left: 0;
        right: 0;
        margin: auto;
        padding-left: 3px;
        border: solid 1px black;
        background-color: #149bdf;
    }

</style>

<script>

    function showPopUpAjouter() {
        document.getElementById("myPopupAjouter").style.display = "block";
    }

    function downPopUp() {
        document.getElementById("myPopupAjouter").style.display = "";
    }



</script>


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

                        <th>
                            <!--lien quand tu cliques dessus-->
                            <a href="view/content/images/<?= $result['code']; ?>.jpg" target="blank">

                                <!--image qui va être affichée-->
                                <img src="<?= $result['photo']; ?>" alt="<?= $result['code']; ?>"></a>
                        </th>

                        <th><a href="index.php?action=updateSnowPage&code=<?= $result['code']; ?>"><input type="button" value="Modifier"></a></th>


                        <th><a href="index.php?action=deleteSnow&id=<?= $result['id']; ?>&code=<?= $result['code']; ?>"><input
                                        type="button" value="Supprimer"></a></th>



                    </tr>
                <?php endforeach ?>


                <!-- bouton ajouter-->
                <button onclick="showPopUpAjouter()">Ajouter</button>
                <div class="formulaireAjouter" id="myPopupAjouter">

                    <form class="form" method="POST" action="index.php?action=addSnows">

                        <label>Code</label>
                        <input type="text" name="codeAdd" required>

                        <label>Brand</label>
                        <input type="text" name="brandAdd" required>

                        <label>Model</label>
                        <input type="text" name="modelAdd" required>

                        <label>SnowLength</label>
                        <input type="number" name="snowLengthAdd" required>

                        <label>QtyAvailable (max 6) </label>
                        <input type="number" name="qtyAvailableAdd" >

                        <label>Description</label>
                        <input type="text" name="descriptionAdd">

                        <label>DailyPrice</label>
                        <input type="number" name="dailyPriceAdd" required>

                        <label>Photo</label>
                        <input type="file" name="photoAdd">

                        <label>Active (soit 1 soit 0)</label>
                        <input type="number" name="activeAdd">

                        <input type="submit" name="bouttonAjouter" value="Ajouter">
                        <button onclick="downPopUp()">Annuler</button>
                    </form>

                </div>
                <!-- fin du boutton ajouter-->
            </table>

        </div>
    </header>
</article>
<hr/>
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
