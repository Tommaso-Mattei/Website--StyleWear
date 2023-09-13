CREATE TABLE utente ( --TABELLA CHE RAPPRESENTA LO USER
    email varchar(30) not null,
    pswd varchar(30) not null,
    indirizzo varchar(30) not null,
    telefono Integer,
    UNIQUE(email,pswd),
    PRIMARY KEY(email,pswd)
)