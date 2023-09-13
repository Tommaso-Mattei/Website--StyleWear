CREATE TABLE prodotto ( --PRODOTTI INSERITI DALL'INIZIO NEL SITO
    nome varchar(30) unique not null,
    prezzo Integer not null,
    immagine varchar(100) not null,
    PRIMARY KEY(nome)
)