source config/environment.sh

echo "Poistetaan tietokantataulut..."

ssh $USERNAME@users.cs.helsinki.fi "
cd htdocs/$PROJECT_FOLDER/sql
psql < drop_tables.sql
exit"

echo "Valmis!"

DROP TABLE IF EXISTS Nimi CASCADE;
DROP TABLE IF EXISTS Kayttaja CASCADE;
