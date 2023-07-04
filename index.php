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
        <input type="text" name="passwordLength" id="passwordLength">
        <button type="submit">Invia</button>
    </form>
    <?php
        if ($passwordLength > 0) {
            $_SESSION['generatedPassword'] = passwordGenerator($passwordLength);
            header("Location: result.php");
        }
    ?>
</body>
</html>