-- Lisää CREATE TABLE lauseet tähän tiedostoon
create table Kayttaja(
id serial primary key,
nimimerkki varchar(50) not null,
salasana varchar(50) not null
);

create table Juoma(
id serial primary key,
kayttaja_id integer references Kayttaja(id),
nimi varchar(50) not null,
lisayspvm DATE not null,
juomalaji varchar(50) not null,
/*ainesosat foreign key TSEKKAA*/
kuvaus varchar(400)
);

create table Ainesosat(
id serial primary key,
juoma_id integer references Juoma(id),
ainesosa varchar(20)
);