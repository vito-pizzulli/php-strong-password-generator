<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Created Strong Password</title>
</head>
<body>
    <p>La password generata per te è: <?php echo $_SESSION['generatedPassword'] ?></p>
</body>
</html>