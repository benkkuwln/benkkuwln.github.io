<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hangman</title>
</head>
<form name ="inputForm" action = "" method = "post">
Your Guess: <input name ="userInput" type ="text" size="1" maxlength="1"  />
<input type ="submit"  value ="Check" onclick="return validateInput()"/>
<input type ="submit" name ="newWord" value = "Try another Word"/>
</form>
<body>
<?php
    include ("config.php");
    include ("functions.php");
    if (isset($_POST['newWord'])) unset($_SESSION['answer']);
    if (!isset($_SESSION['answer']))
    {
        $_SESSION['attempts'] = 0;
        $answer = fetchWordArray($WORDLISTFILE);
        $_SESSION['answer'] = $answer;
        $_SESSION['hidden'] = hideCharacters($answer);
        echo 'Attempts remaining: '.($MAX_ATTEMPTS - $_SESSION['attempts']).'<br>';
    }else
    {
        if (isset ($_POST['userInput']))
        {
            $userInput = $_POST['userInput'];
            $_SESSION['hidden'] = checkAndReplace(strtolower($userInput), $_SESSION['hidden'], $_SESSION['answer']);
            checkGameOver($MAX_ATTEMPTS,$_SESSION['attempts'], $_SESSION['answer'],$_SESSION['hidden']);
        }
        $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
        echo 'Attempts remaining: '.($MAX_ATTEMPTS - $_SESSION['attempts'])."<br>";
    }
    $hidden = $_SESSION['hidden'];
    foreach ($hidden as $char) echo $char."  ";
?>
<script type="text/javascript" language="JavaScript">
document.forms["inputForm"].elements["userInput"].focus();
    function validateInput()
    {
    var x=document.forms["inputForm"]["userInput"].value;
    if (x=="" || x==" ")
      {
          alert("Please enter a character.");
          return false;
      }
    if (!isNaN(x))
    {
        alert("Please enter a character.");
        return false;
    }
}
    console.log("Edes AI ei osannut auttaa mua saamaan tätä toimimaan, tulen koittamaan myöhemmin uudestaan.")
</script>
</body>
</html>