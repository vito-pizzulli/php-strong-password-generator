<?php
    /* User's desired password length, obtained by user input*/
    $passwordLength = $_GET['passwordLength'];

    /* Function passwordGenerator start */
    function passwordGenerator($passwordLength) {

        /* Array made of strings, each string is a set of characters of a different type */
        $characters = [
            'lowercaseLetters' => "abcdefghijklmnopqrstuvwxyz",
            'uppercaseLetters' => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
            'numbers' => "1234567890",
            'symbols' => "!@#$%^&*"
        ];

        /* generatedPassword variable (string), initially empty but each random generated character will be added to it */
        $generatedPassword = "";

        /* For loop that creates as many random characters as the user's desired password length */
        for($i = 1; $i <= $passwordLength; $i++) {

            /* This randomly picks the key (character type name) of one of the strings contained into the characters array*/
            $randomCharacterType = array_rand($characters);

            /* This picks one of the strings of the character array, corresponding to the key randomly picked before*/
            $randomCharacterString = $characters[$randomCharacterType];
            
            /* This randomly picks one of the characters of the chosen string */
            $randomCharacter = $randomCharacterString[rand(0, strlen($randomCharacterString)-1)];
            
            /* This adds the picked character to the generatedPassword variable that will be returned by the function */
            $generatedPassword .= $randomCharacter;
        }

        /* This returns the generatedPassword string once the for loop has finished */
        return $generatedPassword;
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
</head>
<body>
    <h1>Strong Password Generator</h1>
    <h2>Genera una password sicura</h2>
    
    <form action="./index.php" method="get">
        <label for="passwordLength">Lunghezza password:</label>
        <input type="text" name="passwordLength" id="passwordLength">
        <button type="submit">Invia</button>
    </form>
    <p>
        La password generata per te è: <?php echo passwordGenerator($passwordLength)?>
    </p>
</body>
</html>