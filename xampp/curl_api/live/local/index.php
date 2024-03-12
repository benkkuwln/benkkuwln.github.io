<?php
session_start();
$url = "http://localhost/curl_api/live/index.php?token=ABDSC144DSD";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$result = json_encode($result, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP API CRUD operation - bootstrapfriendly</title>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissable fade show" role="alert">
                                <?php if (isset($_SESSION['success_mg'])) {
                                    echo $_SESSION['success_mg'];
                                } ?>
                                <button type="button" class="close" data-dimiss="alert" aria-label="Close">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                        </div>
                    <div class="col-sm-8">
                        <h2>Employee <b>Details</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="add.php" class="btn btn-primary add-new float-end"><i class="fa fa-plus"></i> Add new</a>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($result['status']) && isset($result['code']) && isset($result['code']) == 5) {
                    ?>

                    <form action="" method="POST" id="myform">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        <tbody>

                            <?php foreach ($result['data'] as $list) {
                                
                            ?>
                                <tr>
                                    <td><?php echo $list['name'] ?></td>
                                    <td><?php echo $list['email'] ?></td>
                                    <td><?php echo $list['phone'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $list['id'] ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">W</i></a>
                                        <a href="delete.php?id=<?php echo $list['id'] ?>" class="delete" title="delete" data-toggle="tooltip"><i class="material-icons">L</i></a>
                                    </td>   
                                </tr>
                            <?php

                            } ?>

                        </tbody>
                        </table>
                        </form>

                        <?php
                } else {
                    //echo $result['data'];
                }

                ?>
                
            </div>
            </div>
            </div>
            </body>

            </html>