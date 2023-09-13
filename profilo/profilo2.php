    <!-- STYLE DEL PROFILO -->
    <style>
        .body {
            display:flex;
            font-family: Geneva;
        }



        .profileBox {
            display: flexbox;
            flex-direction: column; 
            border: 5px solid #274e81;  
            background-color:rgb(88, 134, 221);
            margin:auto; 
            width: 100%;
            height: 100%;   
            border-radius: 1rem;
        }

        .btn{
            color: #fff;
            background-color:crimson;
            border-color:black;
            font-family: Verdana;
            position:absolute;
            top:85%;
            left:50%;
            transform: translate(-50%,-50%);
            
        }

        .btn:hover {
            background-color:rgb(255, 36, 80);
            border-color:black;
        }

        .top {
            text-align: center;
            margin-top: 20px;
        }
    </style>


    <?php
        // CONNESSIONE DATABASE; OTTENIMENTO INFORMAZIONI TRAMUTANDO RESULT IN ARRAY
        $dbconn = pg_connect("host=localhost user=postgres password=asd675 port=5432 dbname=StyleWear") or die('Non si è potuto connettere: ' .pg_last_error());
        $query = "SELECT * FROM utente WHERE email = $1";
        $email = $_SESSION['username'];
        $result = pg_query_params($dbconn,$query,array($email));
        $tuple = pg_fetch_array($result,null,PGSQL_ASSOC);
        $pswd = $tuple['pswd'];
        $indirizzo = $tuple['indirizzo'];
        $telefono = $tuple['telefono'];
        pg_close($dbconn);
    ?> 
    <!-- UTILIZZO DELLE INFO PRESE -->
    <div class = "profileBox">
        <h1 class = "top"> IL MIO PROFILO</h1>
        <hr style = "border: 2px solid black">
            <h4><strong>Email: </strong><?php echo $email; ?> </h4>
            <h4><strong>Password:</strong> <?php echo $pswd; ?> </h4>
            <h4><strong>Indirizzo: </strong><?php echo $indirizzo; ?> </h4>
            <h4><strong>Numero di telefono:</strong> <?php echo $telefono; ?> </h4>
        <!-- CANCELLAZIONE ACCOUNT DAL DATABASE -->
        <?php echo "<a class = btn href = './profilo/DelAcc.php?mail=$email'>Cancella Account</a>";?>
    </div>

