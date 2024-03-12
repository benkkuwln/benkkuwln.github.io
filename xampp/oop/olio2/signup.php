<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple registration form</title>
</head>
<body>
    <h3>Fill out the information</h3>
        <div>
            <form action="signupProcess.php" method="post">
                <label for="fname">First name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Your name">

                <label for="lname">Last name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Your last name">

                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Your address">

                <input type="submit" value="Save" name="save">
            </form>
        </div>
</body>
</html>