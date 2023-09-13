<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script src="jquery-3.6.4.js"></script>
    <script src="root_jquery.js" type="text/javascript"></script> 

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    
    <link rel="stylesheet" type="text/css" href="./root.css">


    
    <title> StyleWear - Homepage</title>

</head>
<body>
    
    <div id="page">


        <!-- HEADER --------------------------------------------->
        <div class="header"> 
            
                <a id="logo" name="LogoToHome" href='home2.php'>
                    <span style="color:orange">Style</span><span style='color:white'>Wear</span>
                </a>    
            
            <div id="profile-section">
            <!-- SEZIONE ACCEDI / PROFILO ------------------------------------------------------------------------------------------------------------>
                <?php 
                    if (isset($_SESSION['logged_in'])){
                        echo   "<div name='logged' class='dropdown'>
                                    <button class='dropdown-toggle' id = 'accesso' type='button' data-bs-toggle='dropdown'>"
                                       . $_SESSION['username'] . 
                                    "</button>
                                    <ul class='dropdown-menu'>
                                        <li><a id='profilo' class='dropdown-item' href='?page=profilo'>Profilo</a></li>
                                        <div class='dropdown-divider'></div>
                                        <li><a id='logout' class='dropdown-item' href='logout.php'>Logout</a></li>
                                    </ul>
                                </div>";
                    } else {
                        echo "<a name='not_logged' href = 'StyleWearLogin/login.html' tab-index='-1'>
                                <button id ='accesso'> ACCEDI </button> </a>";     
                    } 
                ?>          
                <!-- PULSANTE CARRELLO -->
                <a name="ToCart" href="?page=cart" tab-index='-1'>
                    <button id="cart" class="logC">
                        <img src="risorse/orange-shopping-cart-10907.png" width="35px" height="35px">
                    </button>
                </a>
            </div>
            <!-- TAB DELL'HEADER -->
            <div class="tab1">
                <a name="TAB1" href="home2.php" ><button>
                     HOME 
                </button></a>
            </div>
            <div class="tab2">
                <a name="TAB2" href = "?page=AboutUS"> <button>
                    CHI SIAMO 
                </button></a>
            </div>
            <div class="tab3">
                <a name="TAB3" href = "?page=Servizi"> <button>
                    SERVIZI
                </button></a>
            </div>
            <div class="tab4">
                <a name="TAB4" href = "?page=Assistenza"> <button>
                    ASSISTENZA
                </button></a>
            </div>
        </div>

        <!-- CASE/SWITCH PER CAMBIARE IL BODY IN BASE ALL'AZIONE ESEGUITA INCLUDENDO IL NUOVO FILE -->
        <div class="body">      
            <?php 
                if (isset($_SESSION['logged_in'])) {
                    echo "<script type='text/javascript'>
                         $(document).ready(function() {
                            setBros();
                            setBuyBros();
                            setAcquistoImmediato(); 
                         });
                            </script>";
                    $filename = 'main.php';
                    if (isset($_GET['page'])) {
                        $page = $_GET['page']; //Prendi tramite $_GET e in base all'origine si utilizza per scegliere il case
                        $filename = '';
                        switch ($page) {
                            case 'chooseCstm':
                                $filename = 'custom/prova.html';
                                break;
                            case 'profilo':
                                $filename = 'profilo/profilo2.php';
                                break;
                            case 'customizeOther':
                                $filename = 'custom/' .$page . '.php';
                                break;
                            case 'customizeOwn':
                                $filename = 'custom/' .$page . '.php';
                                break;
                            case 'cart':
                                $filename = 'acquisto/carrello.php';
                                break;
                            case 'Assistenza':
                                $filename = 'TABS/Assistenza.html';
                                break;
                            case 'Servizi':
                                $filename = 'TABS/Servizi.html';
                                break;
                            case 'AboutUS':
                                $filename = 'TABS/AboutUS.html';
                                break;
                            default:
                                $filename = 'main.php'; //parte dello shop inclusa di default
                                break;
                        }
                    }
                    include $filename; //inserito in filename il percorso si include nel body del file.
                } else { 
                    if(!isset($_SESSION['logged_in'])){
                        echo "<script type='text/javascript'>
                        $(document).ready(function() {
                           check_login();
                        });
                         </script> "; 

                       $filename = 'main.php';
                       if (isset($_GET['page'])) {
                           $page = $_GET['page'];

                       switch ($page) {
                           case 'Assistenza':
                               $filename = 'TABS/Assistenza.html';
                               break;
                           case 'Servizi':
                               $filename = 'TABS/Servizi.html';
                               break;
                           case 'AboutUS':
                               $filename = 'TABS/AboutUS.html';
                               break;
                           default:
                               $filename = 'main.php';
                               break;
                       }
                   }
                   include $filename;
               }
                }   
            ?>           
        </div>

        <!-- FOOT DEL SITO WEB ------------------------------->
        <div class="footer" style='color: inherit;'>
            FOOT
        </div>
        
    </div>
<!-- ---------------------------------------------------------------------------------------------------------------------- -->
      
   <!-- FINESTRA CHE APPARE NEL CASO L'UTENTE NON SIA LOGGATO -->
    <div id='NoLoginModal' class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><h2>Azione negata</h2></h5>
                <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><h2>&times;</h2></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Non puoi accedere a questa funzionalità senza un <a href = 'StyleWearLogin/login.html' title='Login'>account</a>   
                </p>
            </div>
            <div class="modal-footer">
                <button id='closeModal' type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
    </div>
   

</body>
</html>