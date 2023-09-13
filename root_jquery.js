var theme_color = 'var(--theme-color);'
var tab_color = "rgb(50, 50, 116)";  
var hovered_color = "rgb(78, 78, 176)";
var clicked_color = "#4E4EB0";
var tab_selectors = "[name*='TAB'] > button , #accesso, #cart";
var tab_text_color = "white";

// LE FUNZIONI DI CONTROLLO NON SONO NEL DOCUMENT .READY PERCHE' QUESTI SONO GIA' INCLUSI NELLA LORO CHIAMATA DA home2.php

    // FUNZIONE CHE CREA DEL BLUR SULLO SFONDO MOSTRANDO UNA FINESTRA CHE BLOCCA CHI NON E' LOGGATO
    function check_login() {
        $('.logC').click(function(e){
            $('#NoLoginModal').toggle(); //attiva alert
            $('#NoLoginModal').on('shown.bs.modal', function () {
                $('#closeModal').trigger('focus') //obbliga il focus
            });
            $('#page').addClass('blur'); //classe che sfoca lo sfondo
            const buttons = document.querySelectorAll('*:not(#closeModal, .close)');
            buttons.forEach((button) => {
                button.setAttribute('tabindex', '-1'); //prende tutti i bottono e li mette in secondo piano
            });
            e.preventDefault(); //annulla l'azione del click
            $('.close, #closeModal').click(function(){ //chiude alert
                $('#NoLoginModal').hide(); //
                $('#page').removeClass('blur'); //toglie il blur
                buttons.forEach((button) => {
                    button.removeAttribute('tabindex', '-1'); //rimette in primo piano
                });
            });
        });
    }

    function setBros() {
        // BUY BUTTONS -----------------------------
        $(".buy_btn").css("transition", "all 0.2s");
        $(".buy_btn").on({
            
            mouseover: function() {
                $(this).css({
                    "background-color": "#198754"
                })
            },
            mouseout: function() {
                $(this).css({
                    "background-color": "#773b9e"
                })
            }
        });
        $(".cart_btn > button").css("transition", "all 0.2s");
        $(".cart_btn > button").on({
            
            mouseover: function() {
                $(this).css({
                    "background-color": "rgb(217, 94, 49)"
                });
            },
            mouseout: function() {
                $(this).css({
                    "background-color": "white"
                })
            },
        });
    }

    // FUNZIONE PER INVIARE AD ADDCART L'INFO DI COSA SI STA COMPRANDO
    function setBuyBros() {

        $('.cart_btn').click(function() {
            var param = this.getAttribute('id'); //prende id cart (oggetto)
            var string = 'addCart.php?nome=' + param; //url funzione addcart passando il nome
            var objXMLHttpRequest = new XMLHttpRequest(); //per richieste ajax
                objXMLHttpRequest.onreadystatechange = function() {
                    if(objXMLHttpRequest.readyState === 4) {  //quando è pronto (livello 4)
                        if(objXMLHttpRequest.status === 200) { //risultato richiesta http = 200 positivo
                            $('.cartFB').toggle(); //attivazione notifica se successo
                        } else { 
                            alert('Error Code: ' +  objXMLHttpRequest.status);
                            alert('Error Message: ' + objXMLHttpRequest.statusText);
                        } //altrimenti errore
                    }
                }
                
                objXMLHttpRequest.open('GET', string); //prepara la get e pass l'url
                objXMLHttpRequest.send(); //invia
        });
        // ------------------------------------------------------------------------
        $('.cartFB button').click(function() {
            $('.cartFB').hide(); //chiusura
        });

    }

    // CHIAMATA AJAX, ALLA FUNZIONE (./acquisto/ordineImmediato.php) CHE INSERISCE PRODOTTO NELLA TABELLA ORDINE DEL DATABASE
    function setAcquistoImmediato() {

        $('.buy_btn_link').click(function() {
            var param = this.getAttribute('id');
            var string = 'acquisto/ordineImmediato.php?ordina=' + param; //URL CAMBIA DINAMICAMENTE CON L'ID
            var objXMLHttpRequest = new XMLHttpRequest();
                objXMLHttpRequest.onreadystatechange = function() {
                    if(objXMLHttpRequest.readyState === 4) {
                        if(objXMLHttpRequest.status === 200) {
                            $('.buyFB').toggle();
                        } else {
                            alert('Error Code: ' +  objXMLHttpRequest.status);
                            alert('Error Message: ' + objXMLHttpRequest.statusText);
                        }
                    }
                }

                objXMLHttpRequest.open('GET', string);
                objXMLHttpRequest.send();
        });
        // ------------------------------------------------------------------------
        // CHIUSURA NOTIFICA ACQUISTO
        $('.buyFB button').click(function() {
            $('.buyFB').hide();
        });

    }
// CSS E ANIMAZIONI TAB SELECTORS
$(document).ready(function() {

    $('.cart_btn, .buy_btn').addClass('logC');
    $('.logC:hover').css('transform: none');


    // TAB E SELECTORS -----------------------------------------

    $(tab_selectors).css({
        "background-color": tab_color,
        "border-color": tab_color,
        "color": tab_text_color
    });
    $(tab_selectors).on({
        mouseenter: function(){
            $(this).css({
            "background-color": hovered_color,
            "color": tab_text_color,
            "border-color": "white"
            } 
        )},
        click: function(){
            $(this).css("background-color", clicked_color);
            $(this).css("color", "white");
        },
        mouseleave: function(){
            $(this).css({
                "background-color": tab_color,
                "border-color": tab_color,
                "color": tab_text_color,
            })
        }
    });
    
})
