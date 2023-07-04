<?php
    session_start();
    include_once __DIR__ . '/utilities/functions.php';
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
        <input type="text" name="passwordLength" id="passwordLength"><br>

        <span>Consenti ripetizioni di uno o più caratteri:</span>
        <input type="radio" id="characterRepeatTrue" name="characterRepeat" value="true"/>
        <label for="characterRepeatTrue">Si</label>
        <input type="radio" id="characterRepeatFalse" name="characterRepeat" value="false"/>
        <label for="characterRepeatFalse">No</label><br>

        <input type="checkbox" id="lettersIncluded" name="lettersIncluded">
        <label for="lettersIncluded" value="true">Lettere</label><br>

        <input type="checkbox" id="numbersIncluded" name="numbersIncluded">
        <label for="numbersIncluded" value="true">Numeri</label><br>

        <input type="checkbox" id="symbolsIncluded" name="symbolsIncluded">
        <label for="symbolsIncluded" value="true">Simboli</label><br>

        <button type="submit">Invia</button>
    </form>

    <?php
        if (isset($_GET['passwordLength']) && !is_numeric($_GET['passwordLength'])) {
    ?>
        <p>E' necessario inserire un valore numerico per definire la lunghezza della password generata.</p>
    <?php
        }

        if (isset($_GET['passwordLength']) && ($noCharacters)) {
    ?>
        <p>E' necessario selezionare almeno un tipo di carattere per generare la password.</p>
    <?php
        }
    ?>
</body>
</html>