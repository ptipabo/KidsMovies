<?php
    $characters = $params['characters'];
    $jsonCharactersList = json_encode($characters);
?>
<script type="module">
    import {setCharactersList} from '../../public/scripts/characters.js';
    // For the video player to work, we need to pass the songs data to JS
    setCharactersList(<?= $jsonCharactersList ?>);
</script>

<section class="section whiteBG">
    <div class="section-container">
        <h2 class="pageTitle">Personnages</h2>
    </div>
</section>

<section class="section greyBG">
    <div class="section-container d-flex fairSpread">
        <div id="charactersList">
            <!-- Contient la liste des personnages -->
            <?php for($i=0;$i<count($characters);$i++) : ?>
                <div class="listElement">
                    <h3><span><?= $characters[$i]['movie'] ?></span><br/><?= $characters[$i]['name'] ?></h3>
                    <img class="elementImg" id="char-<?= $i ?>" title="<?= $characters[$i]['name'] ?>" src="./img/characters/<?= $characters[$i]['img'] ?>" alt="<?= $characters[$i]['name'] ?>" />
                </div>
            <?php endfor; ?>
        </div>
        <div id="charInfo" class="dataSheet hidden">
            <img id="charInfoImg" />
            <h3 id="charName"></h3>
            <img id="closeInfo" src="./img/close.png" title="Fermer" onclick="closeInfo()" />
            <p id="charMovie">Film : <a id="charMovieLink"></a></p>
            <p id="charDesc"></p>
        </div>
    </div>
</section>