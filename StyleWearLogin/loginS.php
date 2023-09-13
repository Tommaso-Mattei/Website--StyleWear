    <script> document.title = "Login"; </script>

    <?php
        // CONNESSIONE CON IL DATABASE; ESTRAZIONE DI DATI RELATIVI ALL'EMAIL
        session_start();

        $dbconn = pg_connect("host=localhost user=postgres password=asd675 port=5432 dbname=StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
        $email = $_POST["inputEmail"];
        $query = "SELECT * FROM utente WHERE email = $1";
        $result = pg_query_params($dbconn,$query,array($email));
        if ($riga = pg_fetch_array($result)) { // SE ESISTE UN UTENTE CON LA MAIL SI PROSEGUE
            $pswd = $_POST["inputPassword"];
            $query2 = "SELECT * FROM utente WHERE email = $1 AND pswd = $2";
            $result2 = pg_query_params($dbconn,$query2,array($email,$pswd));
            if ($riga2 = pg_fetch_array($result2)) {  //SE LA MAIL PRESA HA LA PASSWORD INSERITA ALLORA CI SI LOGGA
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $email;
                include 'Log&GoHome.php'; //PAGINA INTERMEDIA VERSO LA HOME
                
            }
            else {
                die("<h2>Il login non ha avuto successo, riprova.</a>");
            }
        }
        else { //MESSAGGIO IN CASO DI DUPLICATI NEL DATABASE
            echo "<h2>Non esiste nessun utente registrato con questa email. <br>
            Clicca <a href = './login.html'>qui</a> per provare di nuovo oppure
            clicca <a href = '../StyleWearRegistrazione/registrazione.html'>qui</a> per registrarti.</h2>";
        }

        pg_close($dbconn);
    ?>