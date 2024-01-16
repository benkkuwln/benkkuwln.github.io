SELECT AsiakasNimi FROM asiakkaat;

SELECT Maa FROM asiakkaat
WHERE Maa="Germany";

SELECT AsiakasNumero asiakkaat
WHERE AsiakasNumero=2;

SELECT Kaupunki FROM asiakkaat
WHERE Kaupunki="Berlin";

SELECT Maa FROM asiakkaat
WHERE Kaupunki="London"
AND Maa="UK";

SELECT Maa FROM asiakkaat
WHERE Kaupunki="Berlin"
OR Kaupunki="London";

INSERT INTO asiakkaat (Asiakasnimi, YhteyshenkiloNimi, Osoite, Kaupunki, Postikoodi, Maa)
VALUES ("Cardinal", "Tom B. Erichsen", "Skagen 21", "Stavanger", "4006", "Norway");

UPDATE asiakkaat
SET AsiakasNumero=1;
SET YhteyshenkiloNimi="Alfred Schmidt";
SET Kaupunki="Frankfurt";

DELETE FROM asiakkaat WHERE CustomerName='Alfreds Futterkiste';