<?php

// Function to make a cURL request to SWAPI
function getCurlData($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    curl_close($ch);

    return json_decode($data, true);
}

// Function to create a Bootstrap modal for Opening Crawl
function createOpeningCrawlModal($episodeId, $title, $openingCrawl) {
    return '
    <div class="modal fade" id="openingCrawlModal' . $episodeId . '" tabindex="-1" aria-labelledby="openingCrawlModalLabel' . $episodeId . '" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="openingCrawlModalLabel' . $episodeId . '">' . $title . ' - Opening Crawl</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>' . $openingCrawl . '</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>';
}

?>
