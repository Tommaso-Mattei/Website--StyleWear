<?php
    // INSERIMENTO DENTRO L'ARRAY CART DI COSA SI AGGIUNGE AL CARRELLO
    session_start();
    if ($_SESSION['cart'] == '') { $_SESSION['cart'] = array(); }
    
    $_SESSION['cart'][] = array('nome' => $_GET['nome']);
?>