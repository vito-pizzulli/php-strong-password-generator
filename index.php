<?php
    $passwordLength = $_GET['passwordLength'];

    function passwordGenerator($passwordLength) {

        $characters = [
            'lowercaseLetters' => "abcdefghijklmnopqrstuvwxyz",
            'uppercaseLetters' => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
            'numbers' => "1234567890",
            'symbols' => "!@#$%^&*"
        ];

        var_dump($characters);

        $randomCharacterType = [];
        for($i = 1; $i <= $passwordLength; $i++) {
            $randomCharacterType = array_rand($characters);
            var_dump($randomCharacterType);
            $randomCharacterString = $characters[$randomCharacterType];
            var_dump($randomCharacterString);
            $randomCharacter = $randomCharacterString[rand(0, strlen($randomCharacterString)-1)];
            var_dump($randomCharacter);
        }
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
        <?php passwordGenerator($passwordLength)?>
    </p>
</body>
</html>