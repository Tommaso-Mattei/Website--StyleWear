<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // CONNESSIONE CON IL DATABASE E CONTROLLO PER NON FAR REGISTRARE SE ESISTE GIA' UNA MAIL REGISTRATA
        $dbconn = pg_connect("host =localhost user = postgres password = asd675 port =5432 dbname =StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
        $email = $_POST["inputEmail"];
        $query = "SELECT * FROM utente WHERE email = $1";
        $result = pg_query_params($dbconn,$query,array($email));
        if ($riga = pg_fetch_array($result)){
            echo '<h1>La registrazione non è andata a buon fine poiché esiste già un account
                  con questa email. Se sei già registrato clicca <a href = "../StyleWearLogin/login.html">qui</a> per loggarti;
                  altrimenti <a href = "./registrazione.html">riprova</a> con un\'altra email.</h1>';
        }
        // INSERIMENTO EFFETTIVO DEI DATI NEL DATABASE 
        else {    
            $pswd = $_POST["inputPassword"];
            $indirizzo = $_POST["inputIndirizzo"];
            $telefono = $_POST["inputTelefono"];
            $query2 = "INSERT INTO utente(email,pswd,indirizzo,telefono) VALUES ($1,$2,$3,$4)";
            $result = pg_query_params($dbconn,$query2,array($email,$pswd,$indirizzo,$telefono));
            if ($result) {
                include 'Register&GoHome.php'; //SCHERMATA INTERMEDIA VERSO HOME E LOGIN
            }
            else {
                die("la registrazione non è andata a buon fine; prova di nuovo.");
            }
        }
        pg_close($dbconn);
    ?>
</body>
</html>