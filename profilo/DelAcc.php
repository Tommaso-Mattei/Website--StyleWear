<?php //CONNESSIONE DATABASE;ESTRAPOLAL'EMAIL E CANCELLA LA TABELLA COSI' COME LA SESSIONE DI LOGIN
    $dbconn = pg_connect("host=localhost user=postgres password=asd675 port=5432 dbname=StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
    $mail = $_GET['mail'];
    $final = array("email" => $mail);
    $result = pg_delete($dbconn,'utente',$final);
    if ($result) {
        session_start();
        unset($_SESSION['logged_in']);
        session_destroy();
        header('Location: ../home2.php'); //REDIRECT HOME
        exit();
    }
    else {
        echo "Qualcosa non è andato a buon fine! <a href = 'home2.php'>RIPROVA!</a>";
    }
    pg_close($dbconn);
?>
