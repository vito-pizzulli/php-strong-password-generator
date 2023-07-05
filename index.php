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
    <main class="d-flex flex-column align-items-center vh-100 fs-5">
        <div class="container mt-5">
            <h1 class="text-center mb-1 display-3 fw-semibold">Strong Password Generator</h1>
            <h2 class="text-light text-center mb-4 display-5 fw-semibold">Genera una password sicura</h2>

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

                <div class="row mb-3">
                    <div class="col-6">
                        <label for="passwordLength" class="form-check-label">Lunghezza password:</label>
                    </div>
                    <div class="col-6">
                    <input type="text" name="passwordLength" id="passwordLength" class="form-control w-50">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="characterRepeat" class="form-check-label">Consenti ripetizioni di uno o più caratteri:</label>
                    </div>
                    <div class="col-6">
                        <input type="radio" id="characterRepeatTrue" name="characterRepeat" value="true" checked="checked" class="form-check-input">
                        <label for="characterRepeatTrue" class="form-check-label">Si</label><br>
                        <input type="radio" id="characterRepeatFalse" name="characterRepeat" value="false" class="form-check-input">
                        <label for="characterRepeatFalse" class="form-check-label mb-3">No</label><br>

                        <input type="checkbox" id="lettersIncluded" name="lettersIncluded" class="form-check-input">
                        <label for="lettersIncluded" value="true" class="form-check-label">Lettere</label><br>

                        <input type="checkbox" id="numbersIncluded" name="numbersIncluded" class="form-check-input">
                        <label for="numbersIncluded" value="true" class="form-check-label">Numeri</label><br>

                        <input type="checkbox" id="symbolsIncluded" name="symbolsIncluded" class="form-check-input">
                        <label for="symbolsIncluded" value="true" class="form-check-label">Simboli</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary fs-5">Invia</button>
                <input type="reset" value="Annulla" name="cancel" class="btn btn-secondary fs-5">
            </form>
        </div>
    </main>
</body>
</html>