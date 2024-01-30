<?php

$mysqli = new mysqli("localhost", "root", null, "esempioCompito", 3306)
    or die("Connessione non riuscita" . $mysqli->connect_error . " " . $mysqli->connect_errno);
$query = "SELECT NomeAutore FROM Autori";
$response = mysqli_query($mysqli, $query)
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
            <form action="pages/romanziAutore.php" method="get">
                <h5 class="text-center">Seleziona un\'autore per visualizzarne i romanzi</h5>
                <select class="form-select" name="NomeAutore">
';
while ($row = mysqli_fetch_array($response, MYSQLI_ASSOC)) {
    echo '<option value="' . $row['NomeAutore'] . '">' . $row['NomeAutore'] . '</option>';
}
echo '
                </select>
                <button type="submit" class="btn btn-primary mt-1 float-end">Ricerca</button>
            </form>
        </div>
    </div>

    <div class="card w-50 mx-auto mt-5">
        <div class="card-body">
            <form action="pages/ricercaRomanzo.php" method="get">
                <h5 class="text-center">Ricerca romanzo per CodiceR</h5>
                    <input type="text" class="form-control" placeholder="CodiceR" name="CodiceR">
                <button type="submit" class="btn btn-primary mt-1 float-end">Ricerca</button>
            </form>
        </div>
    </div>

    <div class="card w-50 mx-auto mt-5">
        <div class="card-body">
            <a href="pages/elencoAutori.php">Elenco autori in vita</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
';