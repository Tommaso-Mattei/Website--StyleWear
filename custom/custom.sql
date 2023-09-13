CREATE TABLE commissione( --TABELLA RELATIVA ALLA COMMISSIONE DI MAGLIETTE PERSONALIZZATE
    immagine varchar(100) not null,
    decorazione varchar(100) not null,
    utente varchar(30) not null,
    indirizzo varchar(30),
    telefono Integer,
    descrizione varchar(297) not null,
    unique(immagine,decorazione,descrizione),
    PRIMARY KEY(immagine,decorazione,descrizione)
)