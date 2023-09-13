<!-- gestione logout: rimuove le variabili di sessione,
 distrugge la sessione e reindirizza alla home -->
<?php 
    session_start();
    unset($_SESSION['logged_in']);
    session_destroy();     
    header('Location: home2.php');
    exit();
?>