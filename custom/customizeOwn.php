<!-- CSS -->
<style>

    .body {
        display: flex;
        border: 20px solid black;
    }

    .custom-own-container {
        /* background-color: orangered; */
        height: 100%;
        width: 100%;
        display: flex; 
        flex-direction: row;
        justify-content:space-between;
        flex: 1;
        border: 20px solid brown;
    }
    .custom-own-container > div {
        flex: 1;
        font-family:  Verdana, Tahoma, sans-serif;
    }

    .custom-form-container {
        padding: 40px;
        flex-shrink: 1;
        border: 3px solid black;
    }

    .custom-form > * {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .custom-form:first-child {
        margin-top: 0;
    }
    .custom-form:last-child {
        margin-bottom: 0;
    }

    .custom-img-container {
        position:relative;
        width: 100%;
        height: 100%;
        flex-shrink: 2;

        border: 3px solid aqua;
    }
    /* ------------------------------------------------ */

    .progress {
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%,-50%);
        width: 75%;
        height: 20px;
    }
    .progress .label {
        position: absolute;
        top: 55%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
    .progress-bar {
        transition: width 0.5s ease-in-out;
    }

    /* ------------------------------------------------ */
    .crsl-container {
        box-sizing: border-box;
        position: absolute;
        top:50%;
        left:50%;
        transform: translate(-50%,-50%);
        height: 100%;
        width: 100%;

        font-family: Verdana, Geneva, Tahoma, sans-serif;
        overflow: hidden;
    }

    div[class*='img'] {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    div[class*='img'] > img {
        flex: 1;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%,-50%);
        width: 100%;
        height: 100%;
        z-index: 0;
    }

    div[class*='img'] > button {
        background-color: gray;
        color: rgb(39, 39, 39);
        font-size: large;
        opacity: 0.7;
        position: absolute;
        height: 50%;
        padding: 15px;
        z-index: 1;
    }
    div[class*='img'] > button:hover {
        opacity: 0.5;
    }
    .img1 > button {
        border-top-left-radius: 1rem;
        border-bottom-left-radius: 1rem;
        right: 0;
    }
    .img2 > button {
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
        left: 0;
    }
    div[class*='img'] > label {
        position: absolute;
        top: 0;
        left: 0;
        background-color: tan;
        border: 3px dashed black;
        color: black;
        padding: 5px;
        z-index: 1;
    }
    .radio-container {
        position: absolute;
        bottom: 1em;
        left: 50%;
        transform: translate(-50%,0);
        z-index: 1;
    }

    /* ----------------------------------------------------- */
    .alert {
        position: absolute;
        flex: 0;
        top:0;
        left: 0;
    }
    #closeAlert {
        width: 50px;
        height: 40px;
    }
    .hidden {
        visibility: hidden;
    }

</style>
<!-- ------------------------------------------ -->
<!-- HTML -->
<!-- ------------------------------------------ -->
<!-- Alert se viene caricato il formato sbagliato -->
<div id='badInputAlert' class="alert alert-danger alert-dismissible fade show d-flex align-item-center w-100 hidden" role="alert">
    <span id="text" style='flex-grow:1;'>Formato caricato non valido. Sono ammessi solo file <strong>.jpg, .jpeg e .png</strong></span> 
    <button id='closeAlert' type="button" class="close rounded-circle" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&#10006;</span>
    </button>
</div>


<!-- FORM PER INVIARE I DATI -->
<div class="custom-own-container">

    <div class="custom-form-container">
        <form class="custom-form form-group w-100 h-100" method="POST" action="./custom/customizeDB.php">
            <div class="custom-file">
                <div class="row d-flex float-sm-left" style="margin-bottom: 10px">
                    <div class="col" style="margin-bottom: 5px">
                        <label class="custom-file-label" for="cloth-imgFile">
                            Carica una foto del vestito  (solo il lato che vuoi decorare)
                        </label>
                    </div>
                    <div class="row d-flex float-sm-left">
                        <div class="col ">
                            <input name="vestito" type="file" class="custom-file-input" id="cloth-imgFile" required> <!-- FILE VESTITO -->
                            <button class='reset-cloth'> &#10006; </button>
                        </div>
                    </div>
                </div>  
                <div class="row d-flex float-sm-left">
                    <div class="col" style="margin-bottom: 5px">
                        <label class="custom-file-label" for="decoration-imgFile">Carica decorazione</label>
                    </div>
                    <div class="row d-flex float-sm-left flex-nowrap">
                        <div class="col">
                            <input name='decorazione' type="file" class="custom-file-input" id="decoration-imgFile" required>    <!-- FILE DECORAZIONE -->
                            <button class='reset-decor'> &#10006; </button>
                        </div>
                    </div>
                </div>  
            </div>
        
            <div class="form-group">
                <label for="utente">Utente</label>
                <input name="utente" type="text" style='background-color:rgb(187, 185, 185)' class="form-control" id="utente" maxlength="50" value="<?php echo $_SESSION['username']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="indirizzo">Indirizzo</label>
                <input name="indirizzo" type="text" class="form-control" id="indirizzo" maxlength="50" placeholder="Indirizzo a cui recapitare la consegna">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input name="telefono" type="text" class="form-control" id="telefono" maxlength="50" placeholder="Telefono a cui fare riferimento(opzionale)">
            </div>
        
            <div class="form-group">
                <label for="descrizione"> Descrizione </label>
                <textarea name="descrizione" class="form-control" id="descrizione" rows="4" cols="50" maxlength="297" style="resize:none;" placeholder="Aggiungi dettagli per spiegare la personalizzazione che desideri" required></textarea>
            </div>
    
            <div> 
                <input class="btn btn-primary" id="submit" type="submit" value="Invia">
            </div>
        </form>
    </div>

    <div class='divider' style="border-left: 3px solid brown; height:100%; flex:0;"></div> 
<!-- SEZIONE DEL CAROSELLO E BARRA DI CARICAMENTO PER LE IMMAGINI INSERITE -->
    <div class="custom-img-container">
        <!-- BARRA DI CARICAMENTO IMM-->
        <div id='progress' class="progress">
            <div id='progressBar' class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="label text-center"> 0 di 2</div>
        </div>
        <!-- CAROSELLO  -->
        <div class="crsl-container" id="carousel">

            <div class="radio-container">   
              <input type="radio" name='index' value="vestito" class="vestito">
              <input type="radio" name='index' value="decorazione" class="decorazione">	
            </div>
            
            <div class="img1">
              <img src="..." alt="Vestito" id="vestito" class="vestito">
              <button class="vestito"> &GT;</button>   <!-- A DESTRA -->
              <label for="vestito"> Vestito </label>
            </div>
            
            <div class="img2">
              <button class="decorazione"> &LT; </button>      <!-- A SINISTRA -->
              <img src="..." alt="Decorazione" id="decorazione" class="decorazione"> 
              <label for="decorazione"> Decorazione</label>
            </div>
          
        </div>
 
    </div>
</div>

<!-- ----------------- SCRIPTS ----------------- -->
<script>
    
    $(document).ready(function() {

        window.onload = function() {
            $('button[class^="reset"]').click();
            document.getElementsByTagName('img').src = '';
        };

        // GESTIONE SLIDE CAROSELLO
        $('.img2').hide();
        $('.img1').show();
        $('input.vestito').prop('checked',true);

        $('button.vestito, input.decorazione').click(function() {
            $('.img1').hide();
            $('.img2').show();
            $('input.decorazione').prop('checked',true);
        });
        $('button.decorazione, input.vestito').click(function() {
            $('.img2').hide();
            $('.img1').show();
            $('input.vestito').prop('checked',true);
        });
       
        
        var carousel = $('.crsl-container');
        var progressBar = $('#progress');
        document.getElementById("cloth-imgFile").onchange = prepareImage;
        document.getElementById("decoration-imgFile").onchange = prepareImage;
        //L'oggetto Files permette l'aggiornamento della barra di caricamento quando le immagini del carosello non 
        //sono state tutte caricate
        const Files = {V:false, D:false};
        
        //GESTIONE TASTI X PER RIMUOVERE IL FILE CARICATO E L'ALERT
        document.getElementsByClassName('reset-cloth')[0].addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('cloth-imgFile').value = '';
            Files.V = false;
            updateBar();
        });
        document.getElementsByClassName('reset-decor')[0].addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('decoration-imgFile').value = '';
            Files.D = false;
            updateBar();
        });
        $('#closeAlert').click(function() {
            $('.alert').addClass('hidden');
        });
        
        
        //INIZIALIZZAZIONE PER custom-img-container
        progressBar.show();
        carousel.hide(); 
        
        //GESTIONE BARRA DI CARICAMENTO
        function updateBar(){
            progressBar.show();
            carousel.hide();
            if (Files.V && Files.D){
                document.getElementById('progressBar').style.width = '100%';
                $('.progress>.label').text('2 of 2');
                $('.progress>.label').css('color','white');

                progressBar.hide();
                carousel.show();
            }
            else if(Files.V || Files.D){
                document.getElementById('progressBar').style.width = '50%';
                $('.progress>.label').text('1 of 2');
                $('.progress>.label').css('color','black');
            }
            else{
                document.getElementById('progressBar').style.width = '0%';
                $('.progress>.label').text('0 of 2');
                $('.progress>.label').css('color','black');
            }
        }




        // GESTIONE IMMAGINI CARICATE DALL'UTENTE
        //- controlla che sia stato caricato qualcosa nell'input file
        //- verifica con la funione checkLoad che il file caricato sia un'immagine
        //- a seconda di quale input file sia abbia scatenato l'evento change, predispone i dovuti parametri per 
        // aggiornare la barra di progresso e poter caricare l'img
        //- crea un fileReader che legge e rielabora il file per poterne estrarre l'url dell'immagine
        function prepareImage(e) {
            var id = '';    
            var val = '';
            if(e.target.files.length == 0) { return false;}
            if(e.target.files.value == '') {val = '';}
            if(!checkLoad(e)) {return false;}
            switch(e.target.id){
                case 'cloth-imgFile':
                    id = 'vestito';
                    val = 'V';
                    break;
                case 'decoration-imgFile':
                    id = 'decorazione';
                    val = 'D';
                    break;
                default:
                    return false;
            }
            Files[val] = true;
            updateBar();

            var file = e.target.files[0]; 
            var fileReader = new FileReader();
            fileReader.readAsDataURL(file);
            
            var img = document.getElementById(id);

            fileReader.onload = (ev) => {
                img.src = ev.target.result;    
            } 
        };




        // ------------------ GESTION ALERT -------------------------
        const badLoadMsg = 'Formato caricato non valido. Sono ammessi solo file <strong>.jpg, .jpeg e .png</strong>';

        // CONTROLLA CHE I FILE CARICATI SIANO VALIDI
        function checkLoad(e){
            var file = e.target.files[0];
            const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!validImageTypes.includes(file['type'])) {
                $('#badInputAlert > #text').html(badLoadMsg);
                $('#badInputAlert').removeClass('hidden');
                window.scrollTo({top:0, behaviour:'smooth'});
                e.target.value = '';
                return false;
            }
            return true;
        }
    });
</script>