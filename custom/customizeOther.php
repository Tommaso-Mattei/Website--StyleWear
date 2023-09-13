<!-- CSS -->
<style>
  .body{

    display: grid;
    grid-template-rows: 2fr 2fr;
    grid-template-columns: repeat(3, 1fr);
    grid-template-areas: 
        "crsl crsl crsl"
        "form form form";
    
    position: relative;
    font-family:  Verdana, Tahoma, sans-serif;
  }

  /* CSS FORM */
  .form-container {
    box-sizing: border-box;
    grid-row: 2;
    grid-column: span 2;
    padding: 40px;
    border: 10px groove var(--theme-color);
    border-right: none;
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
  #submit {
    float: right;
  }

  /* CSS CAROSELLO */
  .crsl-container {
    box-sizing: border-box;
    grid-area: crsl / 1;

    position: absolute;
    left:50%;
    top: 0%;
    transform: translate(-50%,0);
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;

    border-top: 15px groove var(--theme-color);
  }
  .carosello {
    
    width: 50%;
    height: 100%;
  
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    overflow: hidden;

  }

  div[class*='img'] {
    grid-area: crsl / 2;
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    position: relative;
    overflow: hidden;
    
  }
  div[class*='img'] > img {
    
    display: block;
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%,-50%);
    height: 100%;
    z-index: 0;

    background-color: var(--background-color); 
    border: 15px groove var(--theme-color);
    
  }

  div[class*='img'] > button {
    background-color: gray;
    color: rgb(39, 39, 39);
    font-size: large;
    opacity: 0.7;
    position: absolute;
    width: 13%;
    height: 30%;
    padding: 15px;
    z-index: 1;
  }
  div[class*='img'] > button:hover {
    opacity: 0.5;
  }

  button.sx {
    left: 0;
    border-top-left-radius: 1rem;
    border-bottom-left-radius: 1rem;
    
  }
  button.sx:active { box-shadow: 10px 0px 2px -5px black; }
  button.dx {
    right: 0;
    border-top-right-radius: 1rem;
    border-bottom-right-radius: 1rem;
 
  }
  button.dx:active { box-shadow: -10px 0px 2px -5px black; }
  #imgLabel {
    position: absolute;
    bottom: 0;
    left: 10%;
    padding: 5px;

    z-index: 1;
    opacity: 0.9;
    background-color: tan;
    border: 3px double blueviolet;
  }
  .radio-container {
    position: absolute;
    bottom: 1em;
    left: 50%;
    transform: translate(-50%,0);
    z-index: 1;
  }

  .changeSide {
    box-sizing: border-box;
    position:absolute;
    grid-area: crsl / 1;
    top: 0;
    left: 0;
    display:flex;

    height: 30%;
    flex-direction: column;
    flex-wrap: wrap;

  }
  .changeSide > button {
    flex: 1;
    background-color: var(--theme-color);
    border: 5px inset var(--theme-color);
    border-top: none;
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;

    padding: 16px;
    color: white;
    font-size: large;
  }
  #front {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  #back {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  .changeSide > button:hover {
    background-color: rgb(78, 78, 176);
  } 
  /* CONTAINER DECORAZIONE */

  .decor-container {
    grid-area: form / 3;
    width: 100%;
    height: 100%;
    position: relative;
    border: 10px groove var(--theme-color);
    border-left: none;

    display: flex;
    align-items: center;
    overflow: hidden;
    width: 100%;
    height: 100%;

  }
  .decor-container > img {
    flex:1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 100%;
    height: 100%;

    z-index: 0;
  }
  /* CLASSE HIDDEN PER NASCONDERE GLI ALERT */
  .hidden {
    visibility: hidden;
  }
  /* CSS ALERT */
  .alert{
    grid-area: crsl;
    grid-column: span 3;
    top: 10%;
    height: 20%;
    z-index: 999;
  }
  #closeAlert {
    width: 50px;
    height: 40px;
  }


</style>

<!-- HTML -->

<!-- Alert se viene caricato il formato sbagliato -->
<div class="alert alert-danger alert-dismissible fade show d-flex align-items-center w-100 hidden" role="alert">
  <span id='text' style='flex-grow:1;'> <!-- QUI VA IL TESTO DELL'ALERT --></span> 
  <button id='closeAlert' type="button" class="close rounded-circle" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&#10006;</span>
  </button>
</div>

    <!-- CONTAINER CAROSELLO -->
    <div class="crsl-container">

      <script>
        var img_number = 1;
        var side = 'F';
        const minIndex= 1; 
        const maxIndex = 4;
        var img = document.getElementB

        $(document).ready(function() {

          document.getElementById('vestito1').checked = true;

          $('#front').click(function() {
            side = 'F';
            changeSlide();
          });
          $('#back').click(function() {
            side = 'B';
            changeSlide();
          });
          $('button.dx').click(function() {
            if(img_number==maxIndex) img_number = minIndex;
            else img_number++;
            changeSlide();
          });
          $('button.sx').click(function() {
            if(img_number==minIndex) img_number = maxIndex;
            else img_number--;
            changeSlide();
          });

          $('input[name="index"]').click(function() {
              img_number = parseInt(this.value, 10);
              changeSlide();
          })
        });

        // SCORRE IMMAGINI CAROSELLO, INSERISCE QUELLA ATTIVA NELL'INPUT APPOSITO DELLA FORM,
        // CAMBIA LABEL E RADIO BUTTON
        function changeSlide() {
            var string_number = img_number.toString();
            document.getElementById('v1').src = "../risorse/catalogo/img"+string_number+side+"-m.png";
            document.getElementById('activeCloth').value = "../risorse/catalogo/img"+string_number+side+"-m.png";
            var lato = side=='F'?'Davanti':'Dietro';
            document.getElementById('imgLabel').innerHTML = 'Vestito ' + string_number + " - " + lato;
            document.getElementById('vestito'+string_number).checked = true;
            // inserisco la slide corrente come input della form
        }

      </script>

      <!-- CAROSELLO DEI TEMPLATE (DAVANTI E DIETRO) -->
      <div class="carosello" id="carousel">

        <!-- PULSANTI PER CAMBIARE LATO VESTITI -->
        <div class="changeSide d-flex flex-row">
          <button id="front" style="flex:1; margin-right: 0;"> DAVANTI</button>
          <button id="back" style="flex:1; margin-left: 0;"> DIETRO</button>
        </div>

        <div class="radio-container">   
          <input type="radio" name='index' value="1" id="vestito1">
          <input type="radio" name='index' value="2" id="vestito2">
          <input type="radio" name='index' value="3" id="vestito3">
          <input type="radio" name='index' value="4" id="vestito4">
        </div>
 
        <div class="img-container">
            <div class="img1">
                <label id='imgLabel' for='v1'> Vestito 1 - Davanti </label>
                <button class="vestito sx"> &LT;</button>
                    <img src="../risorse/catalogo/img1F-m.png" alt="v1" id="v1" class="vestito">
                <button class="vestito dx"> &GT;</button>
            </div>  
        </div>
       
      
      </div>
    </div>

    <!-- FORM PER customizeDB -->
    <div class="form-container">
        <form class="custom-form form-group w-100 h-100" method="POST" action="./custom/customizeDB.php">
            <div class="custom-file"> 
                <div class="row d-flex float-sm-left">
                    <div class="col" style="margin-bottom: 5px">
                        <label class="custom-file-label" for="decoration-imgFile">Carica decorazione</label>
                    </div>
                    <div class="row d-flex float-sm-left flex-nowrap">
                        <div class="col">
                            <input name="decorazione" type="file" class="custom-file-input" id="decoration-imgFile" required>    <!-- FILE DECORAZIONE -->
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
                <textarea name="descrizione" class="form-control" id="descrizione" rows="4" cols="50" maxlength="297" style="resize:none;" placeholder="Aggiungi dettagli per meglio chiarire la tua personalizzazione" required></textarea>
            </div>
            <input type="text" name="vestito" class='hidden' id='activeCloth'>    <!-- CONTIENE LA MAGLIETTA SCELTA -->
    
            <div> 
                <input class="btn btn-primary" id="submit" type="submit" value="Invia">
            </div>
        </form>
    </div>

    <!-- CONTENITORE DOVE STAMPARE LA DECORAZIONE CARICATA -->
    <div class="decor-container text-center">
      <div name="divider" style="flex:0; height:100%; border-left: 8px dashed var(--theme-color); float:left;"></div>
      <img src="..." alt="La tua decorazione apparirà qui" id="img-decorazione">
    </div>


<!-- ---------------- SCRIPTS ----------------- -->
<script>

    $(document).ready(function() {

    // CARICAMENTO DECORAZIONE
    //- controlla che sia stato caricato qualcosa nell'input file
    //- verifica con la funione checkLoad che il file caricato sia un'immagine
    //- predispone i dovuti parametri per aggiornare la barra di progresso e poter caricare l'img
    //- crea un fileReader che legge e rielabora il file per poterne estrarre l'url dell'immagine
    var img = document.getElementById('img-decorazione');
    document.getElementById('decoration-imgFile').onchange = loadDecoration;
    function loadDecoration(e) {
        var id = '';    
        if(e.target.files.length == 0) {return false;}
        if(!checkLoad(e)) {return false;}
              
        var file = e.target.files[0];
        
        var fileReader = new FileReader();
        fileReader.readAsDataURL(file);
        
        var fileInput = e;
        fileReader.onload = (e) => {
          img.src = e.target.result;
        }    
      }
      // GESTIONE TASTO X PER RIMUOVERE IL FILE DECORAZIONE
      $('.reset-decor').click((e) => {
          e.preventDefault();
          document.getElementById('decoration-imgFile').value = '';
          document.getElementById('img-decorazione').src = '';
      });

    // ------------------<<<<<<<<<<<<<<<<< GESTIONE ALERT >>>>>>>>>>>>>>>>>>>>-------------------------
    const badLoadMsg = 'Formato caricato non valido. Sono ammessi solo file <strong>.jpg, .jpeg e .png</strong>';
    // CONTROLLA CHE I FILE CARICATI SIANO VALIDI
    function checkLoad(e){
        var file = e.target.files[0];
        const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!validImageTypes.includes(file['type'])) {
            $('.alert > #text').html(badLoadMsg);
            $('.alert').removeClass('hidden');
            window.scrollTo({top:0, behaviour:'smooth'});
            e.target.value = '';
            return false;
        }
        return true;
    }

    // GESTIONE TASTO PER CHIUDERE L'ALERT 
    $('#closeAlert').click(function() {
        $('.alert').addClass('hidden');
        $('.alert>#text').html('');
    });
  }); 
</script>