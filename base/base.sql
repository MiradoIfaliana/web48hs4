create database s4_project ;
use s4_project;
create table genre(
    idgenre int primary key auto_increment,
    genre varchar(55),
    codegenre int
);

create table users(
    idusers int primary key auto_increment  ,
    nom varchar(55),
    mail varchar(55),
    nee date,
    idgenre int references genre(idgenre),
    taillecm float,
    poids float,
    passwords varchar(55)
);

create table objectif(
    idobjectif int primary key auto_increment  ,
    objectif varchar(55)
);

create table regime (
    idregime int primary key auto_increment  ,
    idusers int references users(idusers),
    idobjectif int references objectif(idobjectif),
    valeurobjectif float,
    datechoix date,
    prixregime float
);

create table repas(
    idrepas int primary key auto_increment  ,
    nomrepas varchar(55),
    descriptions text,
    unit float,
    prixunit float
);
create table regimealiment(
    idregimealiment int primary key auto_increment  ,
    idregime int references regime(idregime),
    jours int, unique(idregime,jours),
    idrepasmatin int references repas(idrepas), 
    idrepasmidi int references repas(idrepas), 
    idrepassoir int references repas(idrepas), 
    quantitematin float ,
    quantitemidi float ,
    quantitesoir float  
);
create table sport(
    idsport int primary key auto_increment,
    nomsport varchar(20),
    descriptions text,
    agemin int,
    agemax int
);

create table regimesport(
    idregimesport int primary key auto_increment  ,
    idregime int references regime(idregime),
    jours int,
    idsport int references sport(idsport), unique(jours,idsport),
    dureeminut float
);
--parametre du regime pour le calcul
create table regimeparam(
    idregimeparam int primary key auto_increment  ,
    idobjectif int references objectif(idobjectif),
    idrepas int references repas(idrepas), 
    quantiteparjour float,
    idsport int references sport(idsport),
    dureeparjour float,
    objectifobtenu float
);
create table codemoney(
    idcodemoney int primary key auto_increment  ,
    code varchar(30),
    valeur float,
    etat int
);
 --1:dispo --11:non dispo --21:plus dispo 
create table ajoutmoney(
    idajoutmoney int primary key auto_increment  ,
    idusers int references users(idusers),
    montant float,
    dateajout date,
    etat int 
);
--1:non valider 11:valider 
create table retiremoney(
    idretiremoney int primary key auto_increment  ,
    idusers int references users(idusers),
    montant float,
    dateretire date,
    etat int 
);
--1:non valider 11:valider 
create table admins(
    idadmins int primary key auto_increment  ,
    nomadmins varchar(30),
    mail varchar(30),
    passwords varchar(30)
);