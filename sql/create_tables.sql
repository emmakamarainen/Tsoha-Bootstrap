-- Lisää CREATE TABLE lauseet tähän tiedostoon

create table Kayttaja(
id serial primary key,
nimimerkki varchar(50) not null,
salasana varchar(50) not null,
yllapitaja boolean
);

create table Juoma(
id serial primary key,
nimi varchar(50) not null,
lisayspvm DATE not null,
juomalaji varchar(50) not null,
kuvaus varchar(400)
);

create table Ainesosat(
id serial primary key,
ainesosa varchar(20)
);

create table juomaaineyhteys(
id serial primary key,
juoma_id integer references Juoma(id) ON DELETE CASCADE,
ainesosa_id integer references Ainesosat(id)
);
