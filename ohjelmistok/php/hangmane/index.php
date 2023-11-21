<?php

session_start();

$letters = ("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
$WON = false;

$guess = "HANGMAN";
$maxLetters = strlen($guess) - 1;
$responses = ["H","G","A"];

// body parts
$bodyParts = ["nohead","head","body","hand","hands","leg","legs"];


// game words
$words = [
   "APPLE", "BANANA", "CARROT", "PEAR", "STRAWBERRY",
    "CABBAGE", "POTATO", "POTATO", "ONION", "ORANGE"
];


function getCurrentPicture($part){
    return "./images/hangman_". $part. ".png";
}


function startGame(){
   
}

// game restart
function restartGame(){
    session_destroy();
    session_start();

}

// hangman parts
function getParts(){
    global $bodyParts;
    return isset($_SESSION["parts"]) ? $_SESSION["parts"] : $bodyParts;
}

// add part
function addPart(){
    $parts = getParts();
    array_shift($parts);
    $_SESSION["parts"] = $parts;
}

// get part
function getCurrentPart(){
    $parts = getParts();
    return $parts[0];
}

// get current words
function getCurrentWord(){
    global $words;
    if(!isset($_SESSION["word"]) && empty($_SESSION["word"])){
        $key = array_rand($words);
        $_SESSION["word"] = $words[$key];
    }
    return $_SESSION["word"];
}

// get user response
function getCurrentResponses(){
    return isset($_SESSION["responses"]) ? $_SESSION["responses"] : [];
}

function addResponse($letter){
    $responses = getCurrentResponses();
    array_push($responses, $letter);
    $_SESSION["responses"] = $responses;
}

// is letter correct
function isLetterCorrect($letter){
    $word = getCurrentWord();
    $max = strlen($word) - 1;
    for($i=0; $i<= $max; $i++){
        if($letter == $word[$i]){
            return true;
        }
    }
    return false;
}

// is word correct
function isWordCorrect(){
    $guess = getCurrentWord();
    $responses = getCurrentResponses();
    $max = strlen($guess) - 1;
    for($i=0; $i<= $max; $i++){
        if(!in_array($guess[$i],  $responses)){
            return false;
        }
    }
    return true;
}

// check body ready

function isBodyFinished(){
    $parts = getParts();
    if(count($parts) <= 1){
        return true;
    }
    return false;
}

// manage game session

// game finished
function gameFinished(){
    return isset($_SESSION["gamefinished"]) ? $_SESSION["gamefinished"] :false;
}


// mark game as finished
function markGameAsFinished(){
    $_SESSION["gamefinished"] = true;
}

// new game
function markGameAsNew(){
    $_SESSION["gamefinished"] = false;
}



/* restart detection */
if(isset($_GET['start'])){
    restartGame();
}


/* key press*/
if(isset($_GET['kp'])){
    $currentPressedKey = isset($_GET['kp']) ? $_GET['kp'] : null;
    // if the key press is correct
    if($currentPressedKey 
    && isLetterCorrect($currentPressedKey)
    && !isBodyFinished()
    && !gameFinished()){
        
        addResponse($currentPressedKey);
        if(isWordCorrect()){
            $WON = true; // game complete
            markGameAsFinished();
        }
    }else{
        // start hanging the man :)
        if(!isBodyFinished()){
           addPart(); 
           if(isBodyFinished()){
               markGameAsFinished();
           }
        }else{
            markGameAsFinished();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hangman</title>
</head>
    <body style="background: deepskyblue">
        
        <!-- app display -->
        <div style="margin: 0 auto; background: #dddddd; width:900px; height:900px; padding:5px; border-radius:3px;">
            <div style="display:inline-block; width: 500px; background:#fff;">
                 <img style="width:80%; display:inline-block;" src="<?php echo getCurrentPicture(getCurrentPart());?>"/>
          
                <!-- game status -->
               <?Php if(gameFinished()):?>
                    <h1>GAME FINISHED</h1>
                <?php endif;?>
                <?php if($WON  && gameFinished()):?>
                    <p style="color: darkgreen; font-size: 25px;">You Won! HURRAY! :)</p>
                <?php elseif(!$WON  && gameFinished()): ?>
                    <p style="color: darkred; font-size: 25px;">You LOST! OH NO! :(</p>
                <?php endif;?>
            </div>
            
            <div style="float:right; display:inline; vertical-align:top;">
                <h1>Hangman the Game</h1>
                <div style="display:inline-block;">
                    <form method="get">
                    <?php
                        $max = strlen($letters) - 1;
                        for($i=0; $i<= $max; $i++){
                            echo "<button type='submit' name='kp' value='". $letters[$i] . "'>".
                            $letters[$i] . "</button>";
                            if ($i % 7 == 0 && $i>0) {
                               echo '<br>';
                            }
                            
                        }
                    ?>
                    <br><br>
                    <!-- restart -->
                    <button type="submit" name="start">Restart Game</button>
                    </form>
                </div>
            </div>
            
            <div style="margin-top:20px; padding:15px; background: lightseagreen; color: #fcf8e3">
                <!-- currrent guesses -->
                <?php 
                 $guess = getCurrentWord();
                 $maxLetters = strlen($guess) - 1;
                for($j=0; $j<= $maxLetters; $j++): $l = getCurrentWord()[$j]; ?>
                    <?php if(in_array($l, getCurrentResponses())):?>
                        <span style="font-size: 35px; border-bottom: 3px solid #000; margin-right: 5px;"><?php echo $l;?></span>
                    <?php else: ?>
                        <span style="font-size: 35px; border-bottom: 3px solid #000; margin-right: 5px;">&nbsp;&nbsp;&nbsp;</span>
                    <?php endif;?>
                <?php endfor;?>
            </div>
        </div>
    </body>
</html>