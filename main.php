<!-- BODY DELL'HOMEPAGE DI DEFAULT -->

<!-- ALERT(IN REALTA MODAL) DI FEEDBACK -->

<!-- ALERT INSERIMENTO NEL CARRELLO -->
<div class="modal cartFB" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style='background-color: orange; color: white; border-color: orange;'>
      <div class="modal-header">
        <h5 class="modal-title"> Hai inserito un elemento nel carrello!</h5>
        <button type="button" class="close rounded-circle" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&#10006;</span>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ALERT ACQUISTO EFFETTUATO -->

    <div class="modal buyFB" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style='background-color: #198754; color:white; border-color: #198754;'>
        <div class="modal-header">
            <h5 class="modal-title"> Acquisto effettuato! </h5>
            <button type="button" class="close rounded-circle" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&#10006;</span>
            </button>
        </div>
        </div>
    </div>
    </div>

<!-- ---------------------------------------- -->


<!-- CUSTOM SECTION -->
<div class="custom-section">
    <div class="cstm_container">
        <div name="cstm_A">
            <h1 style="font-weight: bold;"> Personalizza il tuo abito su StyleWear!</h1>
            <br>
            Scegli se cambiare un vestito già in tuo possesso o di crearne uno da capo,
            scegli la decorazione che desideri e commissiona il tuo prodotto!
        </div>
        <div name="cstm_B">
            <a href="?page=chooseCstm">
            <button class='logC' id="cstmButton"> Customize!</button>
            </a> 
        </div>
    </div>       
</div>
<!-- SHOP SECTION -->
<div class="shop-section">

            <h1> Shop </h1>

        
        <?php
            $c1 = 'Maglietta LOL';
            $c2 = 'Monnalishirt';
            $c3 = 'Shapeshirt';

            $name = '';
        ?>
        <div class="item1">
                <img src="risorse\shopClothes\magliettaLOL.png">

                <div class='shop_info'>
                    <a name="item_name" style="text-decoration: underline;"> Maglietta LOL </a>
                </div>
                
                <?php
                echo "<a id='$c1' class='buy_btn_link'> <button class='buy_btn'> Acquista </button></a>";
                echo "<a id='$c1' class='cart_btn'><button> Metti nel carrello </button></a>"; 
                 ?>
        </div>
        <div class="item2">
                <img src="risorse/shopClothes/monnalishirt.png">

                <div class='shop_info'>
                    <a name="item_name" style="text-decoration: underline;"> Monnalishirt </a>
                </div>  

                <?php
                echo "<a id='$c2' class='buy_btn_link'> <button class='buy_btn'> Acquista </button></a>";
                 echo "<a id='$c2' class='cart_btn'><button> Metti nel carrello </button></a>"; 
                ?>
        </div>
        <div class="item3">
                <img src="risorse/shopClothes/Shapeshirt.png">

                <div class='shop_info'>
                    <a name="item_name" style="text-decoration: underline;"> Shapeshirt </a>
                </div>

                <?php
                echo "<a id='$c3' class='buy_btn_link'> <button class='buy_btn'> Acquista </button></a>";
                echo "<a id='$c3' class='cart_btn'><button> Metti nel carrello </button></a>"; 
                ?>
        </div>
</div>