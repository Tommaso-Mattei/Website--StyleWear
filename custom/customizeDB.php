<?php
    // CONNESSIONE DB E INSERIMENTO DI TUTTE LE INFO DELLA FORM
    $dbconn = pg_connect("host =localhost user = postgres password = asd675 port =5432 dbname =StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
    $vestito = $_POST["vestito"];
    $decorazione = $_POST["decorazione"];
    $user = $_POST['utente'];
    $indirizzo = $_POST["indirizzo"];
    $telefono = $_POST["telefono"];
    $descrizione = $_POST["descrizione"];
    $query = "INSERT INTO commissione(immagine,decorazione,utente,indirizzo,telefono,descrizione) VALUES ($1,$2,$3,$4,$5,$6)";
    $result = pg_query_params($dbconn,$query,array($vestito,$decorazione,$user,$indirizzo,$telefono,$descrizione));
    if ($result) {
        include 'completato.php'; //REDIRECT PAGINA INTERMEDIA
    }
    else {echo "E' avvenuto un errore, riprova!";}
    pg_close($dbconn);
?>
