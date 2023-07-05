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
    <link rel="stylesheet" href="./css/style.css">

    <!-- Bootstrap 5.2.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="d-flex flex-column justify-content-center align-items-center vh-100 fs-4">
        <div class="container">
            <h1 class="text-center mb-1 display-3">Strong Password Generator</h1>
            <h2 class="text-light text-center mb-3 display-5">Genera una password sicura</h2>

            <?php
                if (isset($_GET['passwordLength']) && !is_numeric($_GET['passwordLength']) && ($noCharacters)) {
            ?>
                <p class="rounded w-75 m-auto mb-3 p-3">Nessun parametro valido inserito.</p>

            <?php
                } else {

                    if (isset($_GET['passwordLength']) && !is_numeric($_GET['passwordLength'])) {
            ?>
                        <p class="rounded w-75 m-auto mb-3 p-3">E' necessario inserire la lunghezza della password da generare.</p>
            <?php
                    }
                
                    if (isset($_GET['passwordLength']) && ($noCharacters)) {
            ?>
                        <p class="rounded w-75 m-auto mb-3 p-3">E' necessario selezionare almeno un tipo di carattere.</p>
            <?php
                    }
                }
            ?>

            <form action="./index.php" method="get" class="rounded w-75 m-auto p-3">
                <label for="passwordLength">Lunghezza password:</label>
                <input type="text" name="passwordLength" id="passwordLength"><br>

                <span>Consenti ripetizioni di uno o più caratteri:</span>
                <input type="radio" id="characterRepeatTrue" name="characterRepeat" value="true" checked="checked">
                <label for="characterRepeatTrue">Si</label>
                <input type="radio" id="characterRepeatFalse" name="characterRepeat" value="false">
                <label for="characterRepeatFalse">No</label><br>

                <input type="checkbox" id="lettersIncluded" name="lettersIncluded">
                <label for="lettersIncluded" value="true">Lettere</label><br>

                <input type="checkbox" id="numbersIncluded" name="numbersIncluded">
                <label for="numbersIncluded" value="true">Numeri</label><br>

                <input type="checkbox" id="symbolsIncluded" name="symbolsIncluded">
                <label for="symbolsIncluded" value="true">Simboli</label><br>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>
    </main>
</body>
</html>