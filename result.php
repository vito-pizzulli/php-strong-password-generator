<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Created Strong Password</title>
    <link rel="stylesheet" href="./css/style.css">

    <!-- Bootstrap 5.2.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="vh-100 overflow-scroll">
        <div class="container">
            <h1 class="text-center mt-5 mb-1 display-3 fw-semibold">Strong Password Generator</h1>
            <h2 class="text-light text-center mb-5 display-5 fw-semibold">Genera una password sicura</h2>
            <p class="rounded p-3 fs-3 text-break"><?php echo $_SESSION['generatedPassword'] ?></p>
        </div>
    </main>
</body>
</html>