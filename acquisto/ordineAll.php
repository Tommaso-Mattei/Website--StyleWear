<!-- GESTIONE ACQUISTO DI TUTTI GLI ELEMENTI DEL CARRELLO, INSERISCE TUPLE IN Ordine, E SVUOTA IL CARRELLO -->
<?php
    session_start();
    foreach ($_SESSION['cart'] as $product) {
        $dbconn = pg_connect("host =localhost user = postgres password=asd675 port =5432 dbname =StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
        $nome = $product['nome'];
        $user = $_SESSION['username'];
        $query = "INSERT INTO ordine(utente,prodotto) VALUES ($1,$2)";
        $result = pg_query_params($dbconn,$query,array($user,$nome));
        if ($result) {
            foreach ($_SESSION['cart'] as $key => $item){
                if($item['nome'] == $nome) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        }
        pg_close($dbconn);
    }
    header('Location:../home2.php?page=cart');


?>