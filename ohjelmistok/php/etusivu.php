
<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  Käyttäjätunnus: <input type="text" name="kayttajatunnus"><br>
  Salasana: <input type="password" name="salasana"><br>
  <input type="submit" value="Kirjaudu">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kayttajatunnus = $_POST['kayttajatunnus'];
  $salasana = $_POST['salasana'];
  
  if ($kayttajatunnus == "Mikko" && $salasana == "Miekkakala") {
    header('Location: correct.html');
  } else {
    header('Location: wrong.html');
  }
}
?>