<?php

    function fetchWordArray($wordFile)
    {
        $file = fopen($wordFile,'r');
           if ($file)
        {
            $random_line = null;
            $line = null;
            $count = 0;
            while (($line = fgets($file)) !== false) 
            {
                $count++;
                if(rand() % $count == 0) 
                {
                      $random_line = trim($line);
                }
        }
        if (!feof($file)) 
        {
            fclose($file);
            return null;
        }else 
        {
            fclose($file);
        }
    }
        $answer = str_split($random_line);
        return $answer;
    }

    function hideCharacters($answer)
    {
        $noOfHiddenChars = floor((sizeof($answer)/2) + 1);
        $count = 0;
        $hidden = $answer;
        while ($count < $noOfHiddenChars )
        {
            $rand_element = rand(0,sizeof($answer)-2);
            if( $hidden[$rand_element] != '_' )
            {
                $hidden = str_replace($hidden[$rand_element],'_',$hidden,$replace_count);
                $count = $count + $replace_count;
            }
        }
        return $hidden;
    }

    function checkAndReplace($userInput, $hidden, $answer)
    {
        $i = 0;
        $wrongGuess = true;
        while($i < count($answer))
        {
            if ($answer[$i] == $userInput)
            {
                $hidden[$i] = $userInput;
                $wrongGuess = false;
            }
            $i = $i + 1;
        }
        if (!$wrongGuess) $_SESSION['attempts'] = $_SESSION['attempts'] - 1;
        return $hidden;
    }
    
    function checkGameOver($MAX_ATTEMPTS,$userAttempts, $answer, $hidden)
    {
        if ($userAttempts >= $MAX_ATTEMPTS)
            {
                echo "Game Over. The correct word was ";
                foreach ($answer as $letter) echo $letter;
                echo '<br><form action = "" method = "post"><input type = "submit" name' + 
                  ' = "newWord" value = "Try another Word"/></form><br>';
                die();
            }
            if ($hidden == $answer)
            {
                echo "Game Over. The correct word is indeed ";
                foreach ($answer as $letter) echo $letter;
                echo '<br><form action = "" method = "post"><input ' + 
                  'type = "submit" name = "newWord" value = "Try another Word"/></form><br>';
                die();
            }
    }
    
?>