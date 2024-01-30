<?php

$mysqli = new mysqli("localhost", "root", null, "esempioCompito", 3306)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);

//query 1
$query = "SELECT Titolo, NomeAutore FROM Romanzi WHERE CodiceR = '" . $_GET['CodiceR'] . "'";
$romanzo = mysqli_fetch_array(mysqli_query($mysqli, $query), MYSQLI_ASSOC)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);

//query 2
$query = "SELECT * FROM Autori WHERE NomeAutore = '" . $romanzo['NomeAutore'] . "'";
$autore = mysqli_fetch_array(mysqli_query($mysqli, $query), MYSQLI_ASSOC)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);

$mysqli->close() or die("Chiusura connessione fallita" . $mysqli->error . " " . $mysqli->errno);
echo '
    <!doctype html>
    <html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>esempioCompito</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body data-bs-theme="dark">
    <div class="card w-50 mx-auto mt-5">
        <div class="card-body">
        <h5 class="text-center mb-3">Dati relativi al romanzo: ' . $_GET['CodiceR'] . '</h5>
        <p>Titolo: ' . $romanzo['Titolo'] . ' <br>
        Autore: ' . $autore['NomeAutore'] . ' <br>
        - Nascita: ' . $autore['AnnoN'] . ' <br>
        - Morte: ' . $autore['AnnoM'] . ' <br>
        - Nazione: ' . $autore['Nazione'] . ' </p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
';