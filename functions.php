<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//ini_set('log_errors', 'On');

const IMG_PATH = '//bgknowhow.com/images/';

const PICTURE_LOCAL                  = 'https://bgknowhow.com/images/';
const PICTURE_LOCAL_HERO             = 'https://bgknowhow.com/images/heroes/';
const PICTURE_LOCAL_BUDDY            = 'https://bgknowhow.com/images/buddies/';
const PICTURE_LOCAL_MINION           = 'https://bgknowhow.com/images/minions/';
const PICTURE_LOCAL_HP               = 'https://bgknowhow.com/images/heropowers/';
const PICTURE_LOCAL_PORTRAIT_SUFFIX  = '_portrait.png';
const PICTURE_LOCAL_RENDER_SUFFIX    = '_render.png';
const PICTURE_LOCAL_RENDER_SUFFIX_80 = '_render_80.webp';
const PICTURE_LOCAL_TILE_SUFFIX      = '_tile.webp';
const PICTURE_LOCAL_BIG_SUFFIX       = '_big.webp';

const PICTURE_URL_RENDER       = 'https://art.hearthstonejson.com/v1/render/latest/enUS/512x/'; // 256or512 (png only)
const PICTURE_URL_RENDER_BG    = 'https://art.hearthstonejson.com/v1/bgs/latest/enUS/512x/'; // 256or512 (png only)
const PICTURE_URL_RENDER_DE    = 'https://art.hearthstonejson.com/v1/render/latest/deDE/512x/';
const PICTURE_URL_RENDER_BG_DE = 'https://art.hearthstonejson.com/v1/bgs/latest/deDE/512x/';
const PICTURE_URL_TILE         = 'https://art.hearthstonejson.com/v1/tiles/'; // png/webp/jpg
const PICTURE_URL_ORIGINAL     = 'https://art.hearthstonejson.com/v1/orig/'; // png
const PICTURE_URL_MEDIUM       = 'https://art.hearthstonejson.com/v1/256x/'; // webp/jpg
const PICTURE_URL_BIG          = 'https://art.hearthstonejson.com/v1/512x/'; // webp/jpg

$tempHeroes  = json_decode(file_get_contents('https://bgknowhow.com/bgjson/output/bg_heroes_all.json'));
$tempBuddies = json_decode(file_get_contents('https://bgknowhow.com/bgjson/output/bg_buddies_all.json'));
$tempMinions = json_decode(file_get_contents('https://bgknowhow.com/bgjson/output/bg_minions_all.json'));

// reference table for image tooltips on hover (provided to JS)
$hoverImages = '';
foreach ($tempMinions->data as $key => $object) {
    if ($object->isToken !== true) {
        $hoverImages = $hoverImages . "{name:'" . addslashes($object->name) . "',shortname:'" . addslashes($object->nameShort) . "',id:'$object->id',type:'M'},";
    }
}
foreach ($tempHeroes->data as $key => $object) {
    $hoverImages = $hoverImages . "{name:'" . addslashes($object->name) . "',shortname:'" . addslashes($object->nameShort) . "',id:'$object->heroPowerId',type:'H'},";
}
$hoverImages = rtrim($hoverImages, ',');

function getWebsiteName(): string
{
    $url  = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $page = parse_url($url, PHP_URL_PATH);

    if (strpos($page, '/bgjson/') !== false) {
        return 'bgjson';
    } else if (strpos($page, '/bgcomps/') !== false) {
        return 'bgcomps';
    } else if (strpos($page, '/bgcurves/') !== false) {
        return 'bgcurves';
    } else if (strpos($page, '/bgexternal/') !== false) {
        return 'bgexternal';
    } else if (strpos($page, '/bgguides/') !== false) {
        return 'bgguides';
    } else if (strpos($page, '/bglegends/') !== false) {
        return 'bglegends';
    } else if (strpos($page, '/bgsim/') !== false) {
        return 'bgsim';
    } else if (strpos($page, '/bgbasics/') !== false) {
        return 'bgbasics';
    } else if (strpos($page, '/bgstrategy/') !== false) {
        return 'bgstrategy';
    } else {
        return '';
    }
}

function getWebsiteTitle(): string
{
    $title = '';

    $url  = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    $page = parse_url($url, PHP_URL_PATH);

    if (strpos($page, '/bgjson/') !== false) {
        $title .= 'BG JSON';
    } else if (strpos($page, '/bgcomps/comp_beasts') !== false) {
        $title .= 'Comps (Beasts)';
    } else if (strpos($page, '/bgcomps/comp_demons') !== false) {
        $title .= 'Comps (Demons)';
    } else if (strpos($page, '/bgcomps/comp_dragons') !== false) {
        $title .= 'Comps (Dragons)';
    } else if (strpos($page, '/bgcomps/comp_elementals') !== false) {
        $title .= 'Comps (Elementals)';
    } else if (strpos($page, '/bgcomps/comp_mechs') !== false) {
        $title .= 'Comps (Mechs)';
    } else if (strpos($page, '/bgcomps/comp_murlocs') !== false) {
        $title .= 'Comps (Murlocs)';
    } else if (strpos($page, '/bgcomps/comp_nagas') !== false) {
        $title .= 'Comps (Nagas)';
    } else if (strpos($page, '/bgcomps/comp_pirates') !== false) {
        $title .= 'Comps (Pirates)';
    } else if (strpos($page, '/bgcomps/comp_quilboars') !== false) {
        $title .= 'Comps (Quilboars)';
    } else if (strpos($page, '/bgcomps/comp_undead') !== false) {
        $title .= 'Comps (Undeads)';
    } else if (strpos($page, '/bgcomps/comp_neutrals') !== false) {
        $title .= 'Comps (Neutrals)';
    } else if (strpos($page, '/bgcomps/') !== false) {
        $title .= 'Compositions';
    } else if (strpos($page, '/bgcurves/') !== false) {
        $title .= 'Curves';
    } else if (strpos($page, '/bgexternal/') !== false) {
        $title .= 'External Resources';
    } else if (strpos($page, '/bgguides/') !== false) {
        $title .= 'Guides';
    } else if (strpos($page, '/bglegends/') !== false) {
        $title .= 'Lobby Legends';
    } else if (strpos($page, '/bgsim/') !== false) {
        $title .= 'Simulator';
    } else if (strpos($page, '/bgbasics/armor') !== false) {
        $title .= 'BG Hero Armor Tiers';
    } else if (strpos($page, '/bgbasics/') !== false) {
        $title .= 'Battleground Basics';
    } else if (strpos($page, '/bgstrategy/?show=heroes') !== false) {
        $title .= 'Strategy Heroes';
    } else if (strpos($page, '/bgstrategy/?show=buddies') !== false) {
        $title .= 'Strategy Buddies';
    } else if (strpos($page, '/bgstrategy/?show=minions') !== false) {
        $title .= 'Strategy Minions';
    } else if (strpos($page, '/bgstrategy/hero/') !== false) {
        $title .= 'Strategy Hero';
    } else if (strpos($page, '/bgstrategy/buddy/') !== false) {
        $title .= 'Strategy Buddy';
    } else if (strpos($page, '/bgstrategy/minion/') !== false) {
        $title .= 'Strategy Minion';
    } else if (strpos($page, '/bgstrategy/') !== false) {
        $title .= 'Strategy All';
    }

    $title .= strlen($title) > 0 ? ' - ' : '';
    $title .= 'Battlegrounds Know-How';

    return $title;
}

function getEntityData($selectedId, $unitType)
{
    include('config/db.php');

    if ($unitType == 'hero') {
        if ($stmt = $mysqli->prepare("SELECT bgh.id,
                                     bgh.name,
                                     bgh.name_short,
                                     bgh.health,
                                     bgh.armor_tier,
                                     bgh.armor,
                                     bgh.armor_mmr,
                                     bgh.id_blizzard,
                                     bgh.hp_cost,
                                     bgh.hp_text,
                                     bgh.hp_id_blizzard,
                                     bgh.flag_active,   
                                     bgh.artist,
                                     bgh.flavor
                                FROM bg_heroes bgh
                               WHERE bgh.id = ?
                               LIMIT 1")) {
            $stmt->bind_param("i", $selectedId);
            $stmt->execute();
            $stmt->store_result();
        }
    } else if ($unitType == 'buddy') {
        if ($stmt = $mysqli->prepare("SELECT bgb.id,
                                     bgb.name,
                                     bgb.type,
                                     bgb.text,
                                     bgb.text_golden,
                                     bgb.tier,
                                     bgb.attack,
                                     bgb.health,
                                     bgb.id_blizzard,
                                     bgb.flag_active,
                                     bgb.artist
                                FROM bg_buddies bgb
                               WHERE bgb.id = ?
                               LIMIT 1")) {
            $stmt->bind_param("i", $selectedId);
            $stmt->execute();
            $stmt->store_result();
        }
    } else if ($unitType == 'minion') {
        if ($stmt = $mysqli->prepare("SELECT bgm.id,
                                     bgm.name,
                                     bgm.name_short,
                                     bgm.type,
                                     bgm.type2,
                                     bgm.pool,
                                     bgm.pool2,
                                     bgm.text,
                                     bgm.text_golden,
                                     bgm.tier,
                                     bgm.attack,
                                     bgm.health,
                                     bgm.flag_token,
                                     bgm.flag_active,
                                     bgm.flag_battlecry,
                                     bgm.flag_deathrattle,
                                     bgm.flag_taunt,                                     
                                     bgm.flag_shield,                                     
                                     bgm.flag_windfury,                                     
                                     bgm.flag_reborn,                                     
                                     bgm.flag_avenge,                                                                          
                                     bgm.id_blizzard,                                   
                                     bgm.flavor,                                                                        
                                     bgm.artist                                                                        
                                FROM bg_minions bgm
                               WHERE bgm.id = ?
                               LIMIT 1")) {
            $stmt->bind_param("i", $selectedId);
            $stmt->execute();
            $stmt->store_result();
        }
    }

    return $stmt;
}

function setVote($selectedStrat, $selectedVote)
{
    include('config/db.php');

    $blocklistIp = [
        '216.244.66.201',
        '85.25.185.138'
    ];

    if ($selectedVote == 1) {
        $voteColumn = 'votes_up';
    } else if ($selectedVote == 2) {
        $voteColumn = 'votes_down';
    } else {
        $voteColumn = 'votes_trash';
    }

    $userIp      = $_SERVER['REMOTE_ADDR'];
    $userProxyIp = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : null;

    if (in_array($userIp, $blocklistIp)) {
        return false;
    }

    if ($stmt = $mysqli->prepare("SELECT COALESCE(MAX(1), 0)
                                FROM log_strategy lgs
                               WHERE lgs.time_created >= NOW() - INTERVAL 7 DAY
                                 AND lgs.id_strategy = ?
                                 AND lgs.ip = ?
                                 LIMIT 1")) {
        $stmt->bind_param("is", $selectedStrat, $userIp);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($alreadyExists);
        $stmt->fetch();
    }

//    echo $userIp."|".$alreadyExists."|".$selectedStrat;

    if ($alreadyExists == 0) {
        if ($stmt = $mysqli->prepare("UPDATE bg_strategy
                                     SET " . $voteColumn . " = " . $voteColumn . "+ 1
                                   WHERE id = ?")) {
            $stmt->bind_param('i', $selectedStrat);
            $stmt->execute();
            $stmt->close();

            if ($stmt = $mysqli->prepare("INSERT INTO log_strategy (id_strategy, vote, ip, ip_proxy)
                                     VALUES (?
                                            ,?
                                            ,?
                                            ,?
                                            )")) {
                $stmt->bind_param('iiss', $selectedStrat, $selectedVote, $userIp, $userProxyIp);
                $stmt->execute();
                $stmt->close();
            } else {
                echo 'Insert error (' . $mysqli->errno . ') : ' . $mysqli->error;
                return false;
            }
        } else {
            echo 'Update error (' . $mysqli->errno . ') : ' . $mysqli->error;
            return false;
        }
    }
}

// fetch comp lineup from json
function getMinionsForBoard($board): array
{
    global $tempMinions;

    $i = 0;
    foreach ($board as $minionName) {
        foreach ($tempMinions->data as $key => $object) {
            // handle full name param (for minions where short name is the same)
            if (strpos($minionName, '*') !== false) {
                $minionNameNew = substr($minionName, strpos($minionName, '*') + 1);
                if ($object->name === $minionNameNew) {
//                    echo "* ";
                    $minions[$i]['name']    = $object->name;
                    $minions[$i]['picture'] = $object->pictureSmall;
                    $minions[$i]['url']     = $object->websites->bgknowhow;
                    continue 2;
                }
            } else {
                if ($object->name === $minionName) {
//                    echo "long ";
                    $minions[$i]['name']    = $object->name;
                    $minions[$i]['picture'] = $object->pictureSmall;
                    $minions[$i]['url']     = $object->websites->bgknowhow;
                    continue 2;
                } else if ($object->nameShort === $minionName) {
//                    echo "short ";
                    $minions[$i]['name']    = $object->name;
                    $minions[$i]['picture'] = $object->pictureSmall;
                    $minions[$i]['url']     = $object->websites->bgknowhow;
                    continue 2;
                }
            }
            $i++;
        }
    }

//echo "<pre>";
//var_dump($minions);
//echo "</pre>";

    return $minions;
}


// generate html for comps board
function drawBoard($minions)
{
    foreach ($minions as $minion) {
        echo '<a href="' . $minion['url'] . '"><img src="' . $minion['picture'] . '" alt="' . $minion['name'] . '" title=""></a>';
    }
}

function getCompositionText(): string
{
    return "These different compositions are meant to display proven setups to strive for, for the very end game (top 4 and above). In general one of the seven slots will be the 'flex' spot, used to cycle new minions during the tavern rounds. Therefore, your actual board will rarely be as perfect as these listed here. Of course as many minions as possible should be tripled and buffed with Reborn, Taunt, Poison or Divine Shield. Also primary support units like <a class='hoverimage' href='https://bgknowhow.com/bgstrategy/minion/?id=109'>Brann</a> and <a class='hoverimage' href='https://bgknowhow.com/bgstrategy/minion/?id=121'>Nomi</a> will usually be tossed for the very last fights, but are sometimes displayed here when being integral to the setup. If one of your units is lacking, it is also often beneficial to replace it with a <a class='hoverimage' href='https://bgknowhow.com/bgstrategy/minion/?id=208'>Leeroy</a> or a <a class='hoverimage' href='https://bgknowhow.com/bgstrategy/minion/?id=211'>Mantid Queen</a>, before a deciding fight.";
}

function convertStrategyText(string $text): string
{
    global $tempMinions;

    foreach ($tempMinions->data as $key => $object) {
        if (!$object->isToken) {
            $text = str_replace("" . $object->name, "<a class='hoverimage' href='" . $object->websites->bgknowhow . "'>" . $object->name . "</a>", $text);
//            if ($textNew !== $text) {
//                $text = $textNew;
//            } else {
//                $text = str_replace("" . $object->nameShort, "<a class='hoverimage' href='" . $object->websites->bgknowhow . "'>" . $object->name . "</a>", $text);
//            }
        }
    }

    return $text;
}

/**
 * Generate Webp image format
 *
 * Uses either Imagick or imagewebp to generate webp image
 *
 * @param string $file Path to image being converted.
 * @param int $compression_quality Quality ranges from 0 (worst quality, smaller file) to 100 (best quality, biggest file).
 *
 * @return false|string Returns path to generated webp image, otherwise returns false.
 * @throws ImagickException
 */
function generate_webp_image(string $file, int $compression_quality = 80)
{
    // check if file exists
    if (!file_exists($file)) {
        return false;
    }

    // If output file already exists return path
    $output_file = pathinfo($file, PATHINFO_FILENAME) . '_80.webp';
    if (file_exists($output_file)) {
        return $output_file;
    }

    $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if (function_exists('imagewebp')) {

        switch ($file_type) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($file);
                break;

            case 'png':
                $image = imagecreatefrompng($file);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;

            case 'gif':
                $image = imagecreatefromgif($file);
                break;
            default:
                return false;
        }

        // Save the image
        $result = imagewebp($image, $output_file, $compression_quality);
        if (false === $result) {
            return false;
        }

        // Free up memory
        imagedestroy($image);

        return $output_file;
    } elseif (class_exists('Imagick')) {
        $image = new Imagick();
        $image->readImage($file);

        if ($file_type === 'png') {
            $image->setImageFormat('webp');
            $image->setImageCompressionQuality($compression_quality);
            $image->setOption('webp:lossless', 'true');
        }

        $image->writeImage($output_file);
        return $output_file;
    }

    return false;
}

function getArmor($armorTier): string
{
    switch ($armorTier) {
        case 1:
            return "0";
        case 2:
            return "2-5";
        case 3:
            return "3-6";
        case 4:
            return "4-7";
        case 5:
            return "5-8";
        case 6:
            return "6-9";
        case 7:
            return "7-10";
        default:
            return "???";
    }
}