<?php
    /* Variable that is false by default and becomes true if no character type is selected by the user */
    $noCharacters = false;
    
    /* Variables with values taken by get from the form inputs, they are false if not selected */
    if (isset($_GET['lettersIncluded'])) {
        $lettersIncluded = $_GET['lettersIncluded'];
    } else {
        $lettersIncluded = false;
    }

    if (isset($_GET['numbersIncluded'])) {
        $numbersIncluded = $_GET['numbersIncluded'];
    } else {
        $numbersIncluded = false;
    }

    if (isset($_GET['symbolsIncluded'])) {
        $symbolsIncluded = $_GET['symbolsIncluded'];
    } else {
        $symbolsIncluded = false;
    }

    if (isset($_GET['characterRepeat'])) {
        $characterRepeat = $_GET['characterRepeat'];
    } else {
        $characterRepeat = false;
    }

    /* If statements that check if all the requirements for the password generation are fullfilled (selected at least one character type, entered desired password length, numeric and higher than zero). If it's all ok, then the passwordLength value is taken by get, the function passwordGenerator is called passing all the necessary parameters, and the returning value is stored for the current session and displayed into the result.php page */
    if (isset($_GET['passwordLength'])) {
        if ($lettersIncluded || $numbersIncluded || $symbolsIncluded) {
            if (is_numeric($_GET['passwordLength']) && ($_GET['passwordLength'] > 0)) {
                $passwordLength = $_GET['passwordLength'];
                $_SESSION['generatedPassword'] = passwordGenerator($passwordLength, $lettersIncluded, $numbersIncluded, $symbolsIncluded, $characterRepeat);
                header("Location: result.php");
            }
        } else {
            $noCharacters = true;
        }
    } else {
        $passwordLength = 0;
    }

    function passwordGenerator($passwordLength, $lettersIncluded, $numbersIncluded, $symbolsIncluded, $characterRepeat) {

        /* Characters array, it's empty by default, but it's filled by the different characters strings based of what the user selected */
        $characters = [];
        $lowercaseLetters = "abcdefghijklmnopqrstuvwxyz";
        $uppercaseLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numbers = "1234567890";
        $symbols = "!@#$%^&*";

        if ($lettersIncluded) {
            array_push($characters, $lowercaseLetters, $uppercaseLetters);
        }

        if ($numbersIncluded) {
            array_push($characters, $numbers);
        }

        if ($symbolsIncluded) {
            array_push($characters, $symbols);
        }

        /* In this section, if no same character repetition is selected, all the characters strings are merged into one array to check if there are enough characters to generate a password with the parameters chosen by the user. If it's impossible, an error message is returned instead of the password */
        if ($characterRepeat == "false") {
            $uniqueCharacters = implode("", $characters);
            if ($passwordLength > strlen($uniqueCharacters)) {
                return "Impossibile generare la password con i parametri inseriti, non ci sono abbastanza caratteri disponibili.";
            }
        }

        /* generatedPassword variable (string), initially empty but each random generated character will be added to it */
        $generatedPassword = "";

        /* For loop that creates as many random characters as the user's desired password length */
        for($i = 1; $i <= $passwordLength; $i++) {

            /* This randomly picks the key (character type name) of one of the strings contained into the characters array*/
            $randomCharacterType = array_rand($characters);

            /* This picks one of the strings of the character array, corresponding to the key randomly picked before*/
            $randomCharacterString = $characters[$randomCharacterType];
            
            /* This randomly picks one of the characters of the chosen string, it doesn't pick a character that is already into the password if the user has selected so */
            $randomCharacter = $randomCharacterString[rand(0, strlen($randomCharacterString)-1)];
            if ($characterRepeat == "false") {
                while (str_contains($generatedPassword, $randomCharacter)) {
                    $randomCharacter = $randomCharacterString[rand(0, strlen($randomCharacterString)-1)];
                }
            }
            
            /* This adds the picked character to the generatedPassword variable that will be returned by the function */
            $generatedPassword .= $randomCharacter;
        }

        /* This returns the generatedPassword string once the for loop has finished */
        return "La password generata per te è: " . $generatedPassword;
    }
?>