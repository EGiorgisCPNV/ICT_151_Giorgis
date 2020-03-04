<?php

/**
 * ICT_151_Giorgis - snows.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 04.03.2020 13:50
 */
$title="Snows";

ob_start();
$rows=0; // Column count
?>

    <article>
        <header>
            <h2> Nos snows</h2>
            <div class="yox-view">

                <?php foreach ($tableauSnows as $result) : ?>
                    <?php $rows++; ?>
                    <?php if ($rows%4) : // tests to have 4 items / line ?>
                        <div class="row-fluid">
                        <ul class="thumbnails">
                        <?php $rows=0;?>
                    <?php endif ?>

                    <li class="span3">
                        <div class="thumbnail">
                            <img src="view/content/images/images ict-151/<?= $result['code']; ?>.jpg" width="20px">
                            <div class="caption" >
                                <h3><a href="index.php?action=displayASnow&code=<?= $result['code']; ?>"><?= $result['code']; ?></a></h3>
                                <p><strong>Marque : </strong><?= $result['brand']; ?></p>
                                <p><strong>Modèle : </strong><?= $result['model']; ?></p>
                                <p><strong>Longueur : </strong><?= $result['snowLength']; ?> cm</p>
                                <p><strong>Prix :</strong> CHF <?= $result['dailyPrice']; ?>.- / jour</p>
                                <p><strong>Disponibilité : </strong><?= $result['qtyAvailable']; ?></p>
                            </div>
                        </div>
                    </li>

                    <?php if ($rows%4) :?>
                        </ul>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>

            </div>
        </header>
    </article>
    <hr/>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>