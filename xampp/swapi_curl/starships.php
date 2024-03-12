<?php
include_once 'common.php';

$starshipsUrl = 'https://swapi.dev/api/starships/';
$starshipsData = getCurlData($starshipsUrl);
?>

<ul class="list-group">
    <?php
    if (isset($starshipsData['results']) && is_array($starshipsData['results'])) {
        foreach ($starshipsData['results'] as $starship) {
            echo '<li class="list-group-item"><a href="starship_details.php?url=' . urlencode($starship['url']) . '">' . $starship['name'] . '</a></li>';
        }
    } else {
        echo '<p class="mt-3 alert alert-danger">Failed to fetch starships data from SWAPI.</p>';
    }
    ?>
</ul>
