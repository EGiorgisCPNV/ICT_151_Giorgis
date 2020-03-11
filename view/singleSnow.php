<?php

/**
 * ICT_151_Giorgis - Singlesnows.php
 *
 * Initial version by: Esteban.GIORGIS
 * Initial version created on: 04.03.2020 13:50
 */
$titre="SingleSnows";

ob_start();
$rows=0; // Column count
?>

    <article>
        <header>
            <h2> Details du snow</h2>
            <div class="yox-view">

                <?php foreach ($tableSingleSnow as $result) : ?>
                    <?php $rows++; ?>


                    <li class="span3">
                        <div class="thumbnail">
                            <a href="view/content/images/<?= $result['code']; ?>_small.jpg" target="blank"><img src="<?= $result['photo']; ?>" alt="<?= $result['code']; ?>" ></a>
                            <div class="caption">
                                <h3><?= $result['code']; ?></h3>
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