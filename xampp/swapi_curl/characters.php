<?php
include_once 'common.php';

$charactersUrl = 'https://swapi.dev/api/people/';
$charactersData = getCurlData($charactersUrl);
?>

<ul class="list-group">
    <?php
    if (isset($charactersData['results']) && is_array($charactersData['results'])) {
        foreach ($charactersData['results'] as $character) {
            echo '<li class="list-group-item"><a href="character_details.php?url=' . urlencode($character['url']) . '">' . $character['name'] . '</a></li>';
        }
    } else {
        echo '<p class="mt-3 alert alert-danger">Failed to fetch characters data from SWAPI.</p>';
    }
    ?>
</ul>
