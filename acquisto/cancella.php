<?php 
    // ELIMINAZIONE DELL'OGGETTO DAL CARRELLO
    session_start();
    $elimina = $_GET['elimina'];
    foreach ($_SESSION['cart'] as $key => $item){
        if($item['nome'] == $elimina) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    
    header('Location:../home2.php?page=cart');
?>