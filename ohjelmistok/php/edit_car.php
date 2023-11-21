<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-primary">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Selaa autoja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Lisää uusi auto</a>
                </li>
            </ul>
        </div>
    </nav>
<?php
echo '
    <table class="table border border-3">
            <tr>
                <th>AutoID</th>
                <th>Auto</th>
                <th>Varastossa</th>
                <th>Myyty</th>
                <th>Muokkaa</th>
                <th>Poista</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Volvo</td>
                <td>22</td>
                <td>18</td>
                <td><a href="?id=1" class="bi bi-pencil-square"></i></td>
                <td><a href="?id=1" class="bi bi-trash"></i></td>
            </tr>
            <tr>
                <td>2</td>
                <td>BMW</td>
                <td>15</td>
                <td>13</td>
                <td><a href="?id=2" class="bi bi-pencil-square"></i></td>
                <td><a href="?id=2" class="bi bi-trash"></i></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Saab</td>
                <td>5</td>
                <td>2</td>
                <td><a href="?id=3" class="bi bi-pencil-square"></i></td>
                <td><a href="?id=3" class="bi bi-trash"></i></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Land Rover</td>
                <td>17</td>
                <td>15</td>
                <td><a href="?id=4" class="bi bi-pencil-square"></i></td>
                <td><a href="?id=4" class="bi bi-trash"></i></td>
            </tr>
    </table>
';
?>
</div>
</body>
</html>
