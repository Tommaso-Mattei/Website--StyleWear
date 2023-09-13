<!-- GESTIONE ACQUISTO DAL CARRELLO, INSERISCE TUPLA IN Ordine, TOGLIE ITEM DAL CARRELLO -->
<?php
    session_start();
    $dbconn = pg_connect("host =localhost user = postgres password=asd675 port =5432 dbname =StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
    $prodotto = $_GET['ordina'];
    $user = $_SESSION['username'];
    $query = "INSERT INTO ordine(utente,prodotto) VALUES ($1,$2)";
    $result = pg_query_params($dbconn,$query,array($user,$prodotto));
    if ($result) {
        foreach ($_SESSION['cart'] as $key => $item){
            if($item['nome'] == $prodotto) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
    pg_close($dbconn);
    header('Location:../home2.php?page=cart');
?>