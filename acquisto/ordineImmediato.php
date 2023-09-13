<!-- GESTIONE ACQUISTO DIRETTO DALL'HOMEPAGE -->
<?php
    session_start();
    $dbconn = pg_connect("host =localhost user = postgres password=asd675 port =5432 dbname =StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
    $prodotto = $_GET['ordina'];
    $user = $_SESSION['username'];
    $query = "INSERT INTO ordine(utente,prodotto) VALUES ($1,$2)";
    $result = pg_query_params($dbconn,$query,array($user,$prodotto));

    pg_close($dbconn);
?>