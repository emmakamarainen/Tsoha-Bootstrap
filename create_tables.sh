source config/environment.sh

echo "Luodaan tietokantaulut..."

ssh $USERNAME@users.cs.helsinki.fi "
cd htdocs/$PROJECT_FOLDER/sql
cat drop_tables.sql create_tables.sql | psql -1 -f -
exit"

echo "Valmis!"

create table Kayttaja(
id serial primary key,
nimi varchar(50) not null,
salasana varchar(50) not null
});

create table Nimi(
id serial primary key,
kayttaja_id integer references Kayttaja(id),
nimi varchar(50) not null,
kuvaus varchar(400),
pvm DATE,
added DATE
);


