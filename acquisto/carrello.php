<!-- CSS -->
<style>
        .body {
        display:flex;
        font-family: Verdana, Geneva, Tahoma, sans-serif;;
    }
    .carrello {
    display: flex;
    position: relative;
    flex-direction: column; 
    border: 5px solid blue;  
    font-weight: bold;
    width: 100%;
    height: 100%;   
    }

    .AcqButton{
        width: 20%;
        height: 200px;
        position:absolute;
        background-color: #773b9e;
        color:white;
        font-size: x-large;
        font-weight: bold;
        border-radius: 1rem;
        flex: 0;
        right: 2%;
    }
    .AcqButton:hover {
        background-color: #198754;
    }



    .innerC {
        border: 8px solid rgb(99, 16, 30);
        height: 270px;
        width: 73%;
        margin-top: -10px;
        overflow-y:auto;
    }
    .innerC:first {flex:1}

    .SingleItem {
        box-sizing: border-box;
        width: 95%;
        height: 107px;
        font-family:Helvetica;
        border: 3px solid rgb(210, 15, 142);
        margin-left: 2px;
        margin-bottom: 3px;
        padding-right: 20px;
        padding-bottom: 10px;
        position:relative;
        display: grid;
        grid-template-columns: 7fr 10fr 10fr 3fr;
        grid-template-areas: 
        "img info price action"
        "img info price action";
        column-gap: 15px;
    }

    .Product_img{
        grid-area: img;
        height: 55%;
        width: 60%;
        margin-left: 8px;
        margin-top: 4px;
        border: 2px solid black;
    }

    .cart_info {
        grid-area: info;
        margin-top: 35px;
        color: black;
        font-size: large;
        font-weight: bold;
        text-decoration: underline;
    }

    .product_price{
        grid-area: price;
        margin-top: 35px;
        
    }

    .buy_btn {
        grid-row: 1;
        grid-column: 4;
        background-color: #773b9e;
        margin-top: 10px;
        width: 100px;
        height: 40px;  
        
        border-radius: 1rem;
        color: white;
    }

    .delete_btn{
        position:absolute;
        bottom: 10px;
        grid-row: 2;
        grid-column: 4;
        width: 100px;
        border-radius: 1rem;
    }
</style>
<!-- HTML -->
    <!-- CARRELLO -->
    <div class = "carrello" style = "margin-left:3px;"><h1> IL MIO CARRELLO</h1>
        <a href = './acquisto/ordineAll.php' ><button class='AcqButton' > Acquista tutto</button></a>
        <div class = "innerC"><h5 style = "margin-left:3px; margin-top:3px;"> I miei prodotti:</h5>
            <?php
                // SCORRIMENTO DELL'ARRAY CART PER MOSTRARE CIO' CHE SI E' AGGIUNTO, OTTENENDO INFO DAL DB
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $product) {
                        $dbconn = pg_connect("host =localhost user = postgres password = asd675 port =5432 dbname =StyleWear") or die('Non si è potuto connettere: ' .pg_last_error()); 
                        $nome = $product['nome'];
                        $query =  "SELECT * FROM prodotto WHERE nome = $1";
                        $result = pg_query_params($dbconn,$query,array($nome));
                        $tuple = pg_fetch_array($result,null,PGSQL_ASSOC);
                        $price = $tuple['prezzo'];
                        $immagine = $tuple['immagine'];
                        pg_close($dbconn);
                        ?>
                        <!-- INSERIMENTO BOTTONI PER CANCELLARE E ACQUISTARE -->
                        <div class = "SingleItem">
                        <?php echo "<img class = 'Product_img' src=$immagine>";
                        echo "<div class='cart_info'> $nome </div>";
                        echo "<div class='product_price'>Prezzo: $price $ </div>"; 
                        echo "<a href = './acquisto/ordine.php?ordina=$nome'> <button class='buy_btn'> Acquista </button></a>";  
                        echo "<a href = './acquisto/cancella.php?elimina=$nome'><button class='delete_btn'> Elimina </button></a>"; ?>
                        </div>
                   <?php } 
                }
                else {
                    echo 'Attualmente non è presente alcun prodotto';
            }
            ?> 
        </div>
        <!-- ZONA CHE CONTA IL NUMERO DI COMMISSIONI PERSONALIZZATE INSERITE NEL DATABASE -->
        <div class = "innerC"><h5> Le mie personalizzazioni:</h5>
        <?php $dbconn = pg_connect("host =localhost user = postgres password = asd675 port =5432 dbname =StyleWear") or die('Non si è potuto connettere: ' .pg_last_error()); 
                $username = $_SESSION['username'];
                $query =  "SELECT COUNT(*) FROM commissione WHERE utente = $1";
                $result = pg_query_params($dbconn,$query,array($username));
                $tuple = pg_fetch_array($result,null,PGSQL_ASSOC);
                $conto = $tuple['count'];
                pg_close($dbconn); ?>
        <?php echo "<strong>Il numero di commissioni presenti a tuo nome è: </strong>". $conto . "<br>" ?>
        <?php if ($conto > 1) {
            echo "<strong>Le richieste stanno attualmente venendo analizzate, attendi una chiamata dai nostri operatori.</strong>";
        }
        else if ($conto == 1) {
            echo "<strong>La richiesta sta attualmente venendo analizzata, attendi una chiamata dai nostri operatori.</strong>";
        }
        ?>
        </div>
    </div>