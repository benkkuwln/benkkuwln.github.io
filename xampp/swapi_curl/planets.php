<?php
include_once 'common.php';

$planetsUrl = 'https://swapi.dev/api/planets/';
$planetsData = getCurlData($planetsUrl);
?>

<ul class="list-group">
    <?php
    if (isset($planetsData['results']) && is_array($planetsData['results'])) {
        foreach ($planetsData['results'] as $planet) {
            echo '<li class="list-group-item"><a href="planet_details.php?url=' . urlencode($planet['url']) . '">' . $planet['name'] . '</a></li>';
        }
    } else {
        echo '<p class="mt-3 alert alert-danger">Failed to fetch planets data from SWAPI.</p>';
    }
    ?>
</ul>
