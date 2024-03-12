<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Jura">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="starbox">
        <style>
            body {
                font-family: 'Jura', sans-serif;             
            }

            .starbox {
                padding-top: 20px;
                padding-left: 15px;
                padding-bottom: 1px;
                color: white;
                background-color: #0085fc;
            }
        </style>
    <h1 class="mb-3">Tähtien sota elokuvat</h1>
</div>
<br>
    <table class="table table-bordered border border-dark text-center">
        <thead>
        <tr>
            <th>Title</th>
            <th>Opening Crawl</th>
            <th>Director</th>
            <th>Release Date</th>
            <th>Starships</th>
            <th>Characters</th>
            <th>Planets</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once 'common.php';

        $moviesUrl = 'https://swapi.dev/api/films/';
        $moviesData = getCurlData($moviesUrl);

        if (isset($moviesData['results']) && is_array($moviesData['results'])) {
            foreach ($moviesData['results'] as $movie) {
                echo '<tr>';
                echo '<td>' . $movie['title'] . '</td>';
                echo '<td><button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#openingCrawlModal' . $movie['episode_id'] . '">View Opening Crawl</button></td>';
                echo '<td>' . $movie['director'] . '</td>';
                echo '<td>' . $movie['release_date'] . '</td>';
                echo '<td><a href="starships.php?movie_id=' . $movie['episode_id'] . '">Starships</a></td>';
                echo '<td><a href="characters.php?movie_id=' . $movie['episode_id'] . '">Characters</a></td>';
                echo '<td><a href="planets.php?movie_id=' . $movie['episode_id'] . '">Planets</a></td>';
                echo '</tr>';
                echo createOpeningCrawlModal($movie['episode_id'], $movie['title'], $movie['opening_crawl']);
            }
        } else {
            echo '<tr><td colspan="7" class="text-center">Failed to fetch movie data from SWAPI.</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
