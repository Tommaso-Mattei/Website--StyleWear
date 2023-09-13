CREATE TABLE ordine ( --ORDINE RELATIVO AI PRODOTTI PREDEFINITI DEL SITO CON UN NUMERO SERIALE
    utente varchar(30) not null,
    prodotto varchar(30) not null,
    unique(utente,prodotto),
    PRIMARY KEY(utente,prodotto)
)