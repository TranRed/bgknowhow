<?php
include_once('../header.php');
?>

<h2 class="page_title">Standard Compositions: Murlocs</h2>
<p>
    <?= getCompositionText(); ?>
</p>
<br>
<div class="comp_wrapper">
    <h3>Big Stats Comp:</h3>
    <?php
    $board   = ['Brann', 'Ball', 'Swolefin', 'Murk-Eye', 'Swolefin', 'Murk-Eye', 'Ball'];
    $minions = getMinionsForBoard($board);
    drawBoard($minions);
    //    $board   = ['Dong', 'Swolefin', 'Swolefin', 'Striker', 'Dong', 'Brann', 'Sefin'];
    //    $minions = getMinionsForBoard($board);
    //    drawBoard($minions);
    ?>
    <h3>Selfless/Titus Poison Comp:</h3>
    <?php
    $board   = ['Selfless', 'Titus', 'Swolefin', 'Ball', 'Magma', 'Magma', 'Ball'];
    $minions = getMinionsForBoard($board);
    drawBoard($minions);
    //    $board   = ['Selfless', 'Titus', 'Swolefin', 'Striker', 'Dong', 'Honcho', 'Sefin'];
    //    $minions = getMinionsForBoard($board);
    //    drawBoard($minions);
    ?>
</div>

<?php
include_once('../footer.php');
?>
