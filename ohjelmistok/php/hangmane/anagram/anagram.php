<!DOCTYPE html>
<html>
<body>
    <form method="post" action="">
        Enter your answer: <input type="text" name="answer" required>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php

$words = array("dog", "cat", "hat", "car", "apple", "banana", "book", "bird", "tree");

$word = $words[array_rand($words)];

$anagram = str_shuffle($word);

echo "Welcome to the Anagram Game!
";
echo "Guess the word for the given anagram: $anagram
";

if (isset($_POST['submit'])) {
    $answer = $_POST['answer'];

    if ($answer === $word) {
        echo "Congratulations! You guessed the word correctly!";
    } else {
        echo "Sorry, wrong answer. The correct word was: $word";
    }
}
?>