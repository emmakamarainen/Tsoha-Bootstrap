-- Lisää INSERT INTO lauseet tähän tiedostoon

INSERT INTO Kayttaja(nimimerkki,salasana, yllapitaja) VALUES ('kayttaja', 'kayttaja', '0');
INSERT INTO Kayttaja(nimimerkki,salasana, yllapitaja) VALUES ('tavis', 'tavis', '0');
INSERT INTO Kayttaja(nimimerkki,salasana, yllapitaja) VALUES ('admin', 'admin', '1');
INSERT INTO Kayttaja(nimimerkki,salasana, yllapitaja) VALUES ('testi', 'testi', '1');

INSERT INTO Juoma(nimi,lisayspvm,juomalaji,kuvaus) VALUES ('Coca-Cola', '27.03.2015','hiilihappojuoma','naminami');
INSERT INTO Juoma(nimi,lisayspvm,juomalaji,kuvaus) VALUES ('Drinksu', '27.03.2015','alkoholi','hidas kuolema');
INSERT INTO Juoma(nimi,lisayspvm,juomalaji,kuvaus) VALUES ('GinTonic', '27.03.2015','drinkki','Toiset tykkää, toiset ei');
INSERT INTO Juoma(nimi,lisayspvm,juomalaji,kuvaus) VALUES ('Viskikola', '27.03.2015','drinkki','Mahtava juoma, jos tykkää kolan mausta ja viskistä...');


INSERT INTO Ainesosat(ainesosa) VALUES ('Sitruuna');
INSERT INTO Ainesosat(ainesosa) VALUES ('Coca-Cola');
INSERT INTO Ainesosat(ainesosa) VALUES ('Viina');
INSERT INTO Ainesosat(ainesosa) VALUES ('Viski');
INSERT INTO Ainesosat(ainesosa) VALUES ('Tonic');
INSERT INTO Ainesosat(ainesosa) VALUES ('Drinksublandis');

INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('1','1');
INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('1','2');
INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('4','2');
INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('4','4');
INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('3','5');
INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('3','3');
INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('2','3');
INSERT INTO Juomaaineyhteys(juoma_id, ainesosa_id) VALUES ('2','6');


