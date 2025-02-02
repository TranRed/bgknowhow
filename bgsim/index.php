<?php
include_once('../header.php');
?>

<?php
require_once('classes.php');
StopWatch::start();

$minionTypes['beasts']     = isset($_GET['be']) ? intval($_GET['be']) : 1;
$minionTypes['demons']     = isset($_GET['de']) ? intval($_GET['de']) : 1;
$minionTypes['dragons']    = isset($_GET['dr']) ? intval($_GET['dr']) : 1;
$minionTypes['elementals'] = isset($_GET['el']) ? intval($_GET['el']) : 1;
$minionTypes['mechs']      = isset($_GET['me']) ? intval($_GET['me']) : 1;
$minionTypes['murlocs']    = isset($_GET['mu']) ? intval($_GET['mu']) : 1;
$minionTypes['nagas']      = isset($_GET['na']) ? intval($_GET['na']) : 1;
$minionTypes['pirates']    = isset($_GET['pi']) ? intval($_GET['pi']) : 1;
$minionTypes['quilboar']   = isset($_GET['qu']) ? intval($_GET['qu']) : 1;
$minionTypes['undead']     = isset($_GET['ud']) ? intval($_GET['ud']) : 1;

//var_dump($minionTypes);
//var_dump($_SERVER["REQUEST_URI"]);

$minions = [];
foreach ($tempMinions->data as $key => $object) {
    if ($object->tier === 1 && $object->isToken === false && $object->isActive === true &&
        (
            (($object->pools[0] === 'Beast' || @$object->pools[1] === 'Beast') && $minionTypes['beasts']) ||
            (($object->pools[0] === 'Demon' || @$object->pools[1] === 'Demon') && $minionTypes['demons']) ||
            (($object->pools[0] === 'Dragon' || @$object->pools[1] === 'Dragon') && $minionTypes['dragons']) ||
            (($object->pools[0] === 'Elemental' || @$object->pools[1] === 'Elemental') && $minionTypes['elementals']) ||
            (($object->pools[0] === 'Mech' || @$object->pools[1] === 'Mech') && $minionTypes['mechs']) ||
            (($object->pools[0] === 'Murloc' || @$object->pools[1] === 'Murloc') && $minionTypes['murlocs']) ||
            (($object->pools[0] === 'Naga' || @$object->pools[1] === 'Naga') && $minionTypes['nagas']) ||
            (($object->pools[0] === 'Pirate' || @$object->pools[1] === 'Pirate') && $minionTypes['pirates']) ||
            (($object->pools[0] === 'Quilboar' || @$object->pools[1] === 'Quilboar') && $minionTypes['quilboar']) ||
            (($object->pools[0] === 'Undead' || @$object->pools[1] === 'Undead') && $minionTypes['undead']) ||
            ($object->pool === 'All')
        )
    ) {
        $minions[] = $object;
    }
}
?>

<h2 class="page_title" xmlns="http://www.w3.org/1999/html">Simulation: 1st Turn</h2>
<p>
    <span style="color: darkred">[Not fixed for mobile view, yet.]</span>
    <br><br>
    This is a dynamically generated matrix featuring the match-ups of all tier 1 minions on turn 1.<br>
    The number in the square shows how much damage you will deal/receive from the board (in addition to the turn 1 damage).<br>
    The number of potential matchup losses and the average damage generated for your buddy meter are displayed on the right.<br>
    For this scenario the <a class='hoverimage' href='https://bgknowhow.com/bgstrategy/minion/?id=8'>Razorfen Geomancer</a> has been self-gemmed to a 4/2 minion.
    <br><br>
    Click any of these icons below to deactivate the banned minion types of your lobby.
</p>
<br>
<div class="typeFilter">
    <a href="<?= getLink('be', $minionTypes['beasts']); ?>"><img class="<?= ($minionTypes['beasts'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_beasts.png" alt="Beasts" title="Beasts"></a>
    <a href="<?= getLink('de', $minionTypes['demons']); ?>"><img class="<?= ($minionTypes['demons'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_demons.png" alt="Beasts" title="Demons"></a>
    <a href="<?= getLink('dr', $minionTypes['dragons']); ?>"><img class="<?= ($minionTypes['dragons'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_dragons.png" alt="Dragons" title="Dragons"></a>
    <a href="<?= getLink('el', $minionTypes['elementals']); ?>"><img class="<?= ($minionTypes['elementals'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_elementals.png" alt="Elementals" title="Elementals"></a>
    <a href="<?= getLink('me', $minionTypes['mechs']); ?>"><img class="<?= ($minionTypes['mechs'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_mechs.png" alt="Mechs" title="Mechs"></a>
    <a href="<?= getLink('mu', $minionTypes['murlocs']); ?>"><img class="<?= ($minionTypes['murlocs'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_murlocs.png" alt="Murlocs" title="Murlocs"></a>
    <a href="<?= getLink('na', $minionTypes['nagas']); ?>"><img class="<?= ($minionTypes['nagas'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_naga.png" alt="Nagas" title="Nagas"></a>
    <a href="<?= getLink('pi', $minionTypes['pirates']); ?>"><img class="<?= ($minionTypes['pirates'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_pirates.png" alt="Pirates" title="Pirates"></a>
    <a href="<?= getLink('qu', $minionTypes['quilboar']); ?>"><img class="<?= ($minionTypes['quilboar'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_quilboar.png" alt="Quilboar" title="Quilboar"></a>
    <a href="<?= getLink('ud', $minionTypes['undead']); ?>"><img class="<?= ($minionTypes['undead'] ? 'active' : 'inactive') ?>" src="<?= PICTURE_LOCAL ?>misc/pool_undead.png" alt="Undead" title="Undead"></a>
</div>

<br><br>

<div class="matrix">
    <?php
    $minionsCount                  = count($minions);
    $maxColumns                    = 20;
    $GLOBALS['player1TotalDamage'] = 0;
    // (14 + 2) * 42 = 672 + 157 = 829 + 221 = 1050 (min)
    if ($minionsCount <= $maxColumns) {
        $dividerWidth = 1050 - (157 + ($minionsCount + 2) * 42);
    } else {
        $dividerWidth = 1050 - (157 + ($minionsCount) * 42);
    }
    $dividerWidth = max($dividerWidth, 0);

    //    var_dump($dividerWidth);
    //    exit;

    echo "<div class='matrix-row' style='visibility: hidden;'>X</div>";
    foreach ($minions as $minion_top) {
        echo "<div class='matrix-column'><a class='hoverimage' href='" . $minion_top->websites->bgknowhow . "' target='_blank'>$minion_top->nameShort</a></div>";
    }
    if ($minionsCount > 0) {
        if ($minionsCount <= $maxColumns) {
            echo "<div class='matrix-column' style='background-color: white !important;'>Losses</div>";
            echo "<div class='matrix-column' style='background-color: white !important;'>Avg Dmg</div>";
        }
        echo "<div class='column_divider cf' style='width: " . $dividerWidth . "px;'>&nbsp;</div>";
    }
    foreach ($minions as $minion_left) {
        $minion_left->combatLosses     = 0;
        $GLOBALS['player1TotalDamage'] = 0;
        echo "<div class='matrix-row'><a class='hoverimage' href='" . $minion_left->websites->bgknowhow . "' target='_blank'>$minion_left->name</a></div>";
        foreach ($minions as $minion_top) {
            $combatResult              = getCombatResult($minion_left->id, $minion_top->id);
            $minion_left->combatLosses = ($combatResult < 0) ? $minion_left->combatLosses + 1 : $minion_left->combatLosses + 0;
            echo "<div class='" . getCellColor($combatResult) . "'>" . $combatResult . "</div>";
        }
        if ($minionsCount <= $maxColumns) {
            echo "<div style='font-size: 14px; line-height: 15px;'>" . str_pad($minion_left->combatLosses, 2, '0', STR_PAD_LEFT) . "/" . $minionsCount . "</div>";
            echo "<div>" . number_format($GLOBALS['player1TotalDamage'] / $minionsCount, 2) . "</div>";
        }
        echo "<div class='row_divider cf' style='width: " . $dividerWidth . "px;'>&nbsp;</div>";
        echo "<br><br>";
    }
    echo "<br><br>";
    if ($minionsCount > 0) {
        echo "<span style='font-style: italic; font-size: 12px;'>Simulated in: " . number_format(StopWatch::elapsed(), 4) . " seconds.</span>";
    }
    ?>
</div>

<?php
function getLink($type, $currentValue): string
{
    // first-load handling (so a call to index.php is valid)
    if (strstr($_SERVER["REQUEST_URI"], '?') === false) {
        $newLink = $_SERVER["REQUEST_URI"] . '?be=1&de=1&dr=0&el=1&me=1&mu=0&na=0&pi=1&qu=1&ud=1';
    } else {
        $newLink = $_SERVER["REQUEST_URI"];
    }
    $newValue = ($currentValue === 0 ? '1' : '0');
    $newLink  = str_ireplace($type . '=' . $currentValue, $type . '=' . $newValue, $newLink);

    return $newLink;
}

function getCombatResult($id1, $id2): int
{
    $battlefield = new Battlefield();
    $battlefield->spawnMinion(1, 3, new Minion($id1));
    $battlefield->spawnMinion(2, 3, new Minion($id2));
    $battlefield->runFight();

    $GLOBALS['player1TotalDamage'] += $battlefield->getTotalMinionDamageDoneP1();
    return $battlefield->getLoserDamage();
}

function getCellColor($combatResult): string
{
    if ($combatResult > 0) {
        return 'win';
    } else if ($combatResult < 0) {
        return 'loss';
    } else {
        return 'draw';
    }
}

?>

<?php
include_once('../footer.php');
?>
