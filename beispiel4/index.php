<?php
 /**
* Beispeil 4 - A Simple Hangman Game
*
* @author     Alin Nedelcu.
* @version    v1.0.0 / 27-08-2024
* History:
*/

############################################### CONSTANTS ##################################################################

// I use $_SESSTION to save my values befor each page reset. (I would put this in a header.pdf and not here)
session_start();
// My only variable that is constant is the word. (I would first prompt the user to set the word in $_SESSION first, but this is fine for exmaple).
$word = "alin";

############################################### END CONSTANTS ###############################################################


// ================================ DEFAULT - FUNCTIONS ================================

/**
 *  Check if all letters in string $guessedLetters is in string $word.  
 *
 *  @param  string      $word               string to be searched.
 *  @param  string      $guessedLetters     search in $word.
 *  @return string      return a new $word(string) with $guessedLetters(string) and any other not matching letters set to "_ "
 */
function matchLetters($word, $guessedLetters) {
    // Get the length of string $word.
    $len = strlen($word);
    // Set each letter from string $word to "_ "
    $guessedWord = str_repeat("_ ", $len);

    // Loop over each position of string $word. (Example: $word[0] = "a";$word[0] = "l" )
    for ($i = 0; $i < $len; $i++) {
        // Save each position of string $word in a new variable.
        $checkLetter = $word[$i];
        // If string in string (strstr()) - Check if in string $guessedLetters is any of the letters in string $checkLetter.
        if (strstr($guessedLetters, $checkLetter)) {
            // Position needs to be multiplyed by 2 to place letter in correct position because of the empty space i use.
            $pos = 2 * $i;
            // With the above variable we can now write the $checkLetter in the string $guessedWord in the correct position.
            $guessedWord[$pos] = $checkLetter;
        }
    }
    // Return the new word with the guessed letters.
    return $guessedWord;
}

/**
 *  Run the game.  
 * 
 *  @param string       $word           the word for The Hangman Game.        
 *  @return string      return a string with the new $word run threw The Hangman Game.
 */
function game($word) {
    // I need to define this variable to avoid trow error.
    $result = "";
    // If user submits form "checkletters" then check if letter is in $word
    if (isset($_POST['checkletter'])) {
        // This is a fix for a error when user sends first time $_POST. 
        if (!isset($_SESSION["guess"])) {
            $_SESSION["guess"] = "";
        }
        // Write in $_SESSION["guess"] the word with all its checked letters.
        $_SESSION["guess"] = $_SESSION["guess"] . strtolower($_POST["guess"]);

        // If player has not won yet then keep useing DEFAULT FUNCTION matchLetters() 
        $result = matchLetters($word, $_SESSION["guess"]);
    // Below replaces all letters in $word with "_ " befor any letter has been checked.
    } else {
        for ($i=0; $i < strlen($word) ; $i++) { 
            $result .= "_ ";
        }
    }
    // If $result matches the $word player has won.
    if(str_replace(' ', '', $result) == $word) {
        $result = "YOU WON!";
    }
    // Return a string with the $word run threw The Hangman Game.
    return $result;
}

// Simple check if user sends "resetgame" form then unset the guess and reset the game.
if(isset($_POST['resetgame'])) { 
    unset($_SESSION["guess"]); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>The Hangman</h1>
    <form action="index.php" method="POST">
        <input type="text" name="guess" id="guess" placeholder="Write your guess">
        <button type="submit" name="checkletter">Check Letter</button>
    </form>
    <h2><?php
    echo game($word);
    ?></h2>
    <form action="index.php" method="POST" name="button2">
        <button type="submit" name="resetgame">RESET GAME</button>
    </form>
</body>
</html>