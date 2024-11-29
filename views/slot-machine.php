<?php
$headTitle = "Accueil";
ob_start();
?>

<div class="container">
    <h1>Machine à sous</h1>
    <article class="slot-machine">
        <div class="reel" id="reel1">🍒</div>
        <div class="reel" id="reel2">🍒</div>
        <div class="reel" id="reel3">🍒</div>
    </article>
    <button id="spinButton">Lancer</button>
    <div id="result"></div>
</div>
<script src="/public/slot-machine.js"></script>


<?php
$mainContent = ob_get_clean();