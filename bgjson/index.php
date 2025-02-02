<?php
include_once('../header.php');
?>
    <!--    <script>-->
    <!--        async function readJSON() {-->
    <!--            const requestURL = 'https://bgknowhow.com/bgjson/output/bg_minions_all.json';-->
    <!--            const request = new Request(requestURL);-->
    <!---->
    <!--            const response = await fetch(request);-->
    <!--            const minions = await response.json();-->
    <!---->
    <!--            // check the result-->
    <!--            console.table(minions.data);-->
    <!--        }-->
    <!---->
    <!--        let minions = readJSON();-->
    <!--    </script>-->

    <h2 class="page_title">BG JSON</h2>

    <br>
    <p class="bgjson_introduction">
        This page is providing curated and condensed Hearthstone Battleground data in different data collections and file types.<br>
        Feel free to use this as a starting point for your own projects and content creation (code examples below).<br>
        <br>
        These datasets have several advantages over the data available from the Blizzard API or the Hearthstone JSON files:<br>
        For example <em>nameShort</em> attaches the short name the community uses to reference the entity (e.g. '<a class="hoverimage" href='https://bgknowhow.com/bgstrategy/hero/?id=131'>Eliza</a>' instead of '<a class="hoverimage" href='https://bgknowhow.com/bgstrategy/hero/?id=131'>Dread Admiral Eliza</a>'), <em>pictureSmall</em> references a webp version up to ten times smaller than the original image, while <em>websites</em> includes an array of links to the entity representation on the biggest HS community hubs.
        For minions, <em>abilities</em> includes an array of boolean key/value pairs, indicating keywords like Battlecry or Taunt, and for heroes the <em>armorTier</em> as well as the <em>picturePortrait</em> are part of the data collection.<br>
        <br>
        At least every 4 hours fresh files will be generated from the database.<br>
        Official updates and hotfixes will be integrated as soon as possible.<br>
        If you have any suggestion for additional properties that could/should be implemented, just drop me a message.
    </p>

    <br><br>

    <table class="format-table">
        <thead>
        <tr>
            <th colspan="5">JSON format (active only)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="5"><a href="//bgknowhow.com/bgjson/output/bg_entities_active.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Entities</a></td>
        </tr>
        <tr>
            <td><a href="//bgknowhow.com/bgjson/output/bg_heroes_active.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Heroes</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_minions_active.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Minions</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_buddies_active.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Buddies</a></td>
            <!--            <td>&nbsp;</td>-->
            <!--            <td><a href="//bgknowhow.com/bgjson/output/bg_quests_active.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Quests</a></td>-->
            <!--            <td><a href="//bgknowhow.com/bgjson/output/bg_rewards_active.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Rewards</a></td>-->
        </tr>
        </tbody>
    </table>
    <span class="bgjson_last_update">Last update: <?= date("F d, Y H:i:s", filemtime('output/bg_heroes_active.json')); ?></span>

    <br><br>

    <table class="format-table">
        <thead>
        <tr>
            <th colspan="5">JSON format (all)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="5"><a href="//bgknowhow.com/bgjson/output/bg_entities_all.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Entities</a></td>
        </tr>
        <tr>
            <td><a href="//bgknowhow.com/bgjson/output/bg_heroes_all.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Heroes</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_minions_all.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Minions</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_buddies_all.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Buddies</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_quests_all.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Quests</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_rewards_all.json"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Rewards</a></td>
        </tr>
        </tbody>
    </table>
    <span class="bgjson_last_update">Last update: <?= date("F d, Y H:i:s", filemtime('output/bg_heroes_all.json')); ?></span>

    <br><br>

    <table class="format-table">
        <thead>
        <tr>
            <th colspan="5">CSV format (active only)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="//bgknowhow.com/bgjson/output/bg_heroes_active.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Heroes</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_minions_active.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Minions</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_buddies_active.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Buddies</a></td>
            <!--            <td>&nbsp;</td>-->
            <!--            <td><a href="//bgknowhow.com/bgjson/output/bg_quests_active.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Quests</a></td>-->
            <!--            <td><a href="//bgknowhow.com/bgjson/output/bg_rewards_active.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> Active BG Rewards</a></td>-->
        </tr>
        </tbody>
    </table>
    <span class="bgjson_last_update">Last update: <?= date("F d, Y H:i:s", filemtime('output/bg_heroes_active.csv')); ?></span>

    <br><br>

    <table class="format-table">
        <thead>
        <tr>
            <th colspan="5">CSV format (all)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="//bgknowhow.com/bgjson/output/bg_heroes_all.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Heroes</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_minions_all.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Minions</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_buddies_all.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Buddies</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_quests_all.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Quests</a></td>
            <td><a href="//bgknowhow.com/bgjson/output/bg_rewards_all.csv"><img src="//bgknowhow.com/images/icons/download_icon.png" alt="Download File"> All BG Rewards</a></td>
        </tr>
        </tbody>
    </table>
    <span class="bgjson_last_update">Last update: <?= date("F d, Y H:i:s", filemtime('output/bg_heroes_all.csv')); ?></span>

    <br><br>

    <p class="caption"><u>Latest Changes:</u></p>
    <br>
    <ul id="latest_changes">
        <li>29.02.2023 - Added armor changes from the <a href="https://us.forums.blizzard.com/en/hearthstone/t/2563-patch-notes/104774" target="_blank">25.6.3</a> patch notes.</li>
        <li>23.03.2023 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23921500/25-6-2-patch-notes" target="_blank">25.6.2</a> patch notes.</li>
        <li>18.03.2023 - Added armor changes from the <a href="https://us.forums.blizzard.com/en/hearthstone/t/2561-patch-notes/104261" target="_blank">25.6.1</a> patch notes.</li>
        <li>17.03.2023 - Added "armor" and "armorHighMMR" fields to, and removed "armorTier" field from the hero dataset.</li>
        <li>15.03.2023 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23921496/25-6-patch-notes" target="_blank">25.6.0</a> patch notes.</li>
        <li>02.03.2023 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23921492/25-4-3-patch-notes" target="_blank">25.4.3</a> patch notes.</li>
        <li>17.02.2023 - Added armor changes from the <a href="https://us.forums.blizzard.com/en/hearthstone/t/2541-patch-notes/102926" target="_blank">25.4.1</a> patch notes.</li>
        <li>13.02.2023 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23913671/25-4-patch-notes" target="_blank">25.4.0</a> patch notes.</li>
        <li>03.02.2023 - Added "types" and "pools" fields to the JSON format in order to support dual type minions.</li>
        <li>26.01.2023 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23892228/25-2-2-patch-notes" target="_blank">25.2.2</a> patch notes.</li>
        <li>22.01.2023 - Added BG changes from the <a href="https://us.forums.blizzard.com/en/hearthstone/t/2521-patch-notes/101487" target="_blank">25.2.1</a> patch notes.</li>
        <li>18.01.2023 - Temporarily deactivated Scabbs, Tess, Tamsin, Illidan and the minion Murozond (will be bugfixed by Blizzard).</li>
        <li>18.01.2023 - Added dual minion types/pool (Type2 and Pool2 for CSV format).</li>
        <li>17.01.2023 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23892225/25-2-patch-notes" target="_blank">25.2.0</a> patch notes.</li>
        <li>15.01.2023 - Added new hero and new minions of the upcoming BG season 3 release (isActive = false, until patchday).</li>
        <li>19.12.2022 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23892223/25-0-4-patch-notes" target="_blank">25.0.4</a> patch notes.</li>
        <li>29.11.2022 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23882860/25-0-patch-notes" target="_blank">25.0.0</a> patch notes.</li>
        <li>19.11.2022 - Added quest and reward datasets (finally).</li>
        <li>14.11.2022 - Added pictureWhole to the hero dataset (a link to the complete hero picture, without cropping of the borders).</li>
        <li>11.11.2022 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23874319/24-6-2-patch-notes" target="_blank">24.6.2</a> patch notes.</li>
        <li>03.11.2022 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23852694/24-6-patch-notes" target="_blank">24.6.0</a> patch notes.</li>
        <li>14.10.2022 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23852692/24-4-3-patch-notes" target="_blank">24.4.3</a> patch notes.</li>
        <li>15.09.2022 - Added BG changes from the <a href="https://us.forums.blizzard.com/en/hearthstone/t/patch-2423-patch-notes/94885" target="_blank">24.2.3</a> patch notes.</li>
        <li>09.09.2022 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23852686/24-2-2-patch-notes" target="_blank">24.2.2</a> patch notes.</li>
        <li>03.09.2022 - Added BG hotfix changes (armor tier adjustments)</li>
        <li>30.08.2022 - Added BG changes from the <a href="https://hearthstone.blizzard.com/en-us/news/23831411/24-2-patch-notes" target="_blank">24.2.0</a> patch notes.</li>
        <li>16.08.2022 - Added BG changes from the 24.0.3 patch notes.</li>
        <li>26.07.2022 - Added BG changes from the 24.0.0 patch notes.</li>
        <li>21.07.2022 - Added pool (i.e. "Naga" for "Queen Azshara") to the hero dataset.</li>
        <li>30.06.2022 - Added BG changes from the 23.6.1 patch notes.</li>
        <li>27.06.2022 - Added BG changes from the 23.6.0 patch notes.</li>
        <li>16.06.2022 - Added BG changes from the 23.4.3 patch notes.</li>
        <li>06.06.2022 - Added picturePortrait to the hero dataset.</li>
        <li>01.06.2022 - Added BG changes from the 23.4.0 patch notes.</li>
        <li>26.05.2022 - Added BG hotfix changes (Warden of Old in, Stormscale Siren out)</li>
        <li>19.05.2022 - Added BG changes from the 23.2.2 patch notes.</li>
        <li>15.05.2022 - Renamed/added pictureSmall property to all datasets (converted all images to 80% webp format).</li>
        <li>10.05.2022 - Added BG changes from the 23.2.0 patch notes.</li>
        <li>09.05.2022 - Added new hero and all new minions of the upcoming patch (isActive = false, until patchday).</li>
        <li>08.05.2022 - Changed blizzardId property name to id for all datasets.</li>
        <li>06.05.2022 - Updated the hearthpwn website links (correct IDs now) for the buddies json dataset.</li>
        <li>06.05.2022 - Updated the playhearthstone and hearthpwn website links (correct IDs now) for the heroes json dataset.</li>
        <li>03.05.2022 - Updated the playhearthstone and hearthpwn website links (correct IDs now) for the minion json dataset.</li>
        <li>02.05.2022 - Added nameShort property (i.e. "Faelin" for "Ambassador Faelin") to the hero datasets.</li>
        <li>02.05.2022 - Added summonId property (i.e. "CFM_315t" for Alleycat) to the minion datasets (1:1 relation to non-random tokens).</li>
        <li>26.04.2022 - Added BG changes from the 23.0.3 patch notes.</li>
        <li>24.04.2022 - Fixed the Hp-Blizzard-IDs for the newer heroes (a 'p' was missing at the end).</li>
        <li>22.04.2022 - Added the blizzardId as a separate property to the heroes/buddies/minions datasets.</li>
        <li>21.04.2022 - Switched the picture links for minions/buddies/heropowers to the correct BG images (whoopsie!).</li>
        <li>20.04.2022 - Fixed the Blizzard-IDs for Selfless, Spawn and Felfin Navigator.</li>
        <li>18.04.2022 - Added nameShort property (i.e. "Baron" for "Baron Rivendare") to the minion datasets.</li>
    </ul>

    <br><br>

    <p class="caption">Code Example (PHP):</p>
    <pre class="code_example"><code>
        // read the file and convert
        $tempMinions = json_decode(file_get_contents('https://bgknowhow.com/bgjson/output/bg_minions_all.json'));

        // build final array
        foreach ($tempMinions->data as $key => $object) {
            // only get non-token tier1 minions (optional)
            if ($object->tier === 1 && $object->isToken === false) {
            $minions[] = $object;
        }

        // check the result
        var_dump($minions);
    </code></pre>
    <br>
    <p class="caption">Code Example (Python via URL with requests module):</p>
    <pre class="code_example"><code>
        import requests, json

        # read the file and convert
        response = requests.get('https://bgknowhow.com/bgjson/output/bg_minions_all.json').text
        tempMinions = json.loads(response)['data']

        # build final array
        minions = []
        for minion in tempMinions:
          # only get non-token tier1 minions (optional)
          if minion['tier'] == 1 and minion['isToken'] == False:
            minions.append(minion);

        # check the result
        print(json.dumps(minions, indent=4))
    </code></pre>
    <br>
    <p class="caption">Code Example (JS via URL):</p>
    <pre class="code_example"><code>
        async function readJSON() {
            const requestURL = 'https://bgknowhow.com/bgjson/output/bg_minions_all.json';
            const request = new Request(requestURL);

            const response = await fetch(request);
            const minions = await response.json();

            // check the result
            console.table(minions.data);

            return minions.data;
        }

        // usage
        let minions = readJSON();
    </code></pre>
    <br>
    <p class="caption">Code Example (JS via local file):</p>
    <pre class="code_example"><code>
        function readTextFile(file, callback) {
            let rawFile = new XMLHttpRequest();
            rawFile.overrideMimeType("application/json");
            rawFile.open('GET', file, true);
            rawFile.onreadystatechange = function() {
                if (rawFile.readyState === 4 && rawFile.status === 200) {
                    callback(rawFile.responseText);
                }
            }
            rawFile.send(null);
        }

        // usage
        readTextFile('bg_minions_all.json', function(text) {
            let minions = JSON.parse(text.data);

            // check the result
            console.table(minions);
        });
    </code></pre>
    <br><br>

<?php
include_once('../footer.php');
?>