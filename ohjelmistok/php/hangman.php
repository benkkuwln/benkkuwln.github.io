<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman</title>
</head>
<body>
    
</body>
</html>
<?php
// List of words to choose from
$words = ["hangman", "php", "game", "programming"];

// Select a random word from the list
$randomIndex = array_rand($words);
$word = $words[$randomIndex];

// Initialize variables
$guessedLetters = [];
$attempts = 6;
$correctGuesses = 0;

// Check if a letter has been guessed
if (isset($_POST['guess'])) {
    $letter = $_POST['guess'];

    // Check if the letter is in the word
    if (strpos($word, $letter) !== false) {
        $correctGuesses++;
    } else {
        $attempts--;
    }

    $guessedLetters[] = $letter;
}

// Count how many letters are left to guess
$lettersLeft = strlen($word) - $correctGuesses;

// Display the hangman word game
echo "Word: ";
foreach (str_split($word) as $letter) {
    if (in_array($letter, $guessedLetters)) {
        echo $letter . ' ';
    } else {
        echo '_ ';
    }
}

echo "<br>Attempts left: $attempts<br>";

// Display the guessed letters
echo "Guessed Letters: ";
foreach ($guessedLetters as $letter) {
    echo $letter . ' ';
}

echo "<br>Guess a letter:<br>";
?>
<form method="post" action="">
    <input type="text" name="guess" maxlength="1" pattern="[a-zA-Z]" required>
    <input type="submit" value="Guess">
</form>